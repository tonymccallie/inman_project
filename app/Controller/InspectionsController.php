<?php
App::uses('AppController', 'Controller');
class InspectionsController extends AppController {
	public function admin_index() {
		$this->Inspection->recursive = 0;
		$this->set('inspections', $this->paginate());
	}
	
	public function choose(){
		$projects = $this->Inspection->Project->find('list');
		$this->set(compact('projects'));
	}

	public function add($project = null) {
		if(empty($project)) {
			$this->redirect('/inspections/choose');
		}
		
		$project = $this->Inspection->Project->find('first',array(
			'conditions' => array(
				'Project.id' => $project
			),
			'contain' => array(
				'Inspection' => array(
					'limit' => 1,
					'InspectionSubcontractor',
					'order' => array(
						'Inspection.created' => 'desc'
					)
				),
			)
		));

		if ($this->request->is('post')) {
			$this->Inspection->create();

			$pictures = array(
				'picture_1','picture_2','picture_3','picture_4'
			);
			
			foreach($pictures as $picture) {
				if(!empty($this->request->data['Inspection'][$picture]['name'])) {
					$nameArray = explode('.', $this->request->data['Inspection'][$picture]['name']);
					$extension = strtolower($nameArray[count($nameArray)-1]);
					$filename = Common::generateRandom().'.'.$extension;
					move_uploaded_file($this->request->data['Inspection'][$picture]['tmp_name'],WWW_ROOT.'uploads/' . $filename);
					$this->request->data['Inspection'][$picture] = $filename;
				} else {
					$this->request->data['Inspection'][$picture] = '';
				}
			}
			if ($this->Inspection->saveAll($this->request->data)) {
				if(!empty($project['Project']['emails'])) {
					$emails = explode(',', $project['Project']['emails']);
					Common::email(array(
						'to' => $emails,
						'subject' => 'Inspection Created',
						'template' => 'inspection',
						'variables' => array(
							'project' => $project,
							'last_id' => $this->Inspection->getLastInsertId()
						)
					),'');
				}
				$this->Session->setFlash('The inspection has been saved','success');
				$this->redirect('/dashboard');
			} else {
				$this->Session->setFlash('The inspection could not be saved. Please, try again.','error');
			}
		} else {
			$this->request->data = array(
				'Inspection' => array(
					'testing' => 'None',
					'surveying' => 'None',
					'accidents' => 'None',
					'directives' => 'None',
					'progress_notes' => 'None',
				),
				'InspectionSubcontractor' => array(
					array(
						'crew_size' => 0
					),
				),
			);
			
			//Weather
			App::uses('HttpSocket', 'Network/Http');
			$HttpSocket = new HttpSocket();
			
			$response = $HttpSocket->get('http://api.wunderground.com/api/c8c00638a4c0ea0f/history_'.date('YM').'/q/'.$project['Project']['zip'].'.json');
			$weather_averages = json_decode($response->body,true);
			$response = $HttpSocket->get('http://api.wunderground.com/api/c8c00638a4c0ea0f/conditions/q/'.$project['Project']['zip'].'.json');
			$weather = json_decode($response->body,true);

			if($weather) {
				$this->request->data['Inspection']['conditions'] = $weather['current_observation']['weather'];
				$this->request->data['Inspection']['precipitation_type'] = $weather['current_observation']['weather'];
				$this->request->data['Inspection']['low'] = $weather_averages['history']['dailysummary'][0]['mintempi'];
				$this->request->data['Inspection']['high'] = $weather_averages['history']['dailysummary'][0]['maxtempi'];
				$this->request->data['Inspection']['wind'] = $weather_averages['history']['dailysummary'][0]['meanwindspdi'];
				$this->request->data['Inspection']['precipitation_amt'] = $weather_averages['history']['dailysummary'][0]['precipi'];
			} else {
				$this->Session->setFlash('There was a problem gathering the weather information.','success');
			}
			
		}
		$subcontractors = $this->Inspection->InspectionSubcontractor->Subcontractor->find('list');
		$this->set(compact('contractors','subcontractors','project'));
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Inspection->create();
			if ($this->Inspection->save($this->request->data)) {
				$this->Session->setFlash('The inspection has been saved','success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The inspection could not be saved. Please, try again.','error');
			}
		}
	}


	public function admin_edit($id = null) {
		if (!$this->Inspection->exists($id)) {
			throw new NotFoundException(__('Invalid inspection'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Inspection->saveAll($this->request->data)) {
				$this->Session->setFlash('The inspection has been saved','success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The inspection could not be saved. Please, try again.','error');
			}
		} else {
			$options = array('conditions' => array('Inspection.' . $this->Inspection->primaryKey => $id));
			$this->request->data = $this->Inspection->find('first', $options);
		}
		$subcontractors = $this->Inspection->InspectionSubcontractor->Subcontractor->find('list');
		$this->set(compact('subcontractors'));
	}


	public function admin_delete($id = null) {
		$this->Inspection->id = $id;
		if (!$this->Inspection->exists()) {
			throw new NotFoundException(__('Invalid inspection'));
		}
		if ($this->Inspection->delete()) {
			$this->Session->setFlash('Inspection deleted','success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Inspection was not deleted','error');
		$this->redirect(array('action' => 'index'));
	}
}
?>