<?php
App::uses('AppController', 'Controller');
class DailiesController extends AppController {
	public function admin_index() {
		$this->Daily->recursive = 0;
		$this->set('dailies', $this->paginate());
	}

	public function add($project = null) {
		if(empty($project)) {
			$this->redirect('/dailies/choose');
		}
		
		$project = $this->Daily->Project->find('first',array(
			'conditions' => array(
				'Project.id' => $project
			),
			'contain' => array(
				'Daily' => array(
					'limit' => 1,
					'DailySubcontractor',
					'order' => array(
						'Daily.created' => 'desc'
					)
				),
			)
		));

		if ($this->request->is('post')) {
			$this->Daily->create();

			$pictures = array(
				'picture_1','picture_2','picture_3','picture_4'
			);
			
			foreach($pictures as $picture) {
				if(!empty($this->request->data['Daily'][$picture]['name'])) {
					$nameArray = explode('.', $this->request->data['Daily'][$picture]['name']);
					$extension = strtolower($nameArray[count($nameArray)-1]);
					$filename = Common::generateRandom().'.'.$extension;
					move_uploaded_file($this->request->data['Daily'][$picture]['tmp_name'],WWW_ROOT.'uploads/' . $filename);
					$this->request->data['Daily'][$picture] = $filename;
				} else {
					$this->request->data['Daily'][$picture] = '';
				}
			}

			if ($this->Daily->saveAll($this->request->data)) {
				if(!empty($project['Project']['emails'])) {
					$emails = explode(',', $project['Project']['emails']);
					Common::email(array(
						'to' => $emails,
						'subject' => 'Daily Report Created',
						'template' => 'daily',
						'variables' => array(
							'project' => $project,
							'last_id' => $this->Daily->getLastInsertId()
						)
					),'');
				}
				$this->Session->setFlash('The daily has been saved','success');
				$this->redirect('/dashboard');
			} else {
				$this->Session->setFlash('The daily could not be saved. Please, try again.','error');
			}
		} else {
			if((!empty($this->request->params['named']['replicate']))&&(!empty($project['Daily'][0]))) {
				$this->request->data = array(
					'Daily' => array(),
					'DailySubcontractor' => array(),
				);
				foreach($project['Daily'][0]['DailySubcontractor'] as $contractor) {
					$this->request->data['DailySubcontractor'][] = array(
						'subcontractor_id' => $contractor['subcontractor_id'],
						'crew_size' => $contractor['crew_size'],
						'equipment' => $contractor['equipment'],
					);
				}
			} else {
				$this->request->data = array(
					'Daily' => array(
						'testing' => 'None',
						'surveying' => 'None',
						'accidents' => 'None',
						'directives' => 'None',
						'progress_notes' => 'None',
					),
					'DailySubcontractor' => array(
						array(
							'crew_size' => 0
						),
					),
				);
			}
			
			//Weather
			App::uses('HttpSocket', 'Network/Http');
			$HttpSocket = new HttpSocket();
			
			$response = $HttpSocket->get('http://api.wunderground.com/api/c8c00638a4c0ea0f/history_'.date('YM').'/q/'.$project['Project']['zip'].'.json');
			$weather_averages = json_decode($response->body,true);
			$response = $HttpSocket->get('http://api.wunderground.com/api/c8c00638a4c0ea0f/conditions/q/'.$project['Project']['zip'].'.json');
			$weather = json_decode($response->body,true);

			if($weather) {
				$this->request->data['Daily']['conditions'] = $weather['current_observation']['weather'];
				$this->request->data['Daily']['precipitation_type'] = $weather['current_observation']['weather'];
				$this->request->data['Daily']['low'] = $weather_averages['history']['dailysummary'][0]['mintempi'];
				$this->request->data['Daily']['high'] = $weather_averages['history']['dailysummary'][0]['maxtempi'];
				$this->request->data['Daily']['wind'] = $weather_averages['history']['dailysummary'][0]['meanwindspdi'];
				$this->request->data['Daily']['precipitation_amt'] = $weather_averages['history']['dailysummary'][0]['precipi'];
			} else {
				$this->Session->setFlash('There was a problem gathering the weather information.','success');
			}
			
		}
		$subcontractors = $this->Daily->DailySubcontractor->Subcontractor->find('list');
		$this->set(compact('contractors','subcontractors','project'));
	}
	
	public function choose(){
		$projects = $this->Daily->Project->find('list');
		$this->set(compact('projects'));
	}

	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Daily->create();
			if ($this->Daily->save($this->request->data)) {
				$this->Session->setFlash('The daily has been saved','success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The daily could not be saved. Please, try again.','error');
			}
		}
	}


	public function admin_edit($id = null) {
		if (!$this->Daily->exists($id)) {
			throw new NotFoundException(__('Invalid daily'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Daily->saveAll($this->request->data)) {
				$this->Session->setFlash('The daily has been saved','success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The daily could not be saved. Please, try again.','error');
			}
		} else {
			$options = array('conditions' => array('Daily.' . $this->Daily->primaryKey => $id));
			$this->request->data = $this->Daily->find('first', $options);
		}
		$subcontractors = $this->Daily->DailySubcontractor->Subcontractor->find('list');
		$this->set(compact('subcontractors'));
	}


	public function admin_delete($id = null) {
		$this->Daily->id = $id;
		if (!$this->Daily->exists()) {
			throw new NotFoundException(__('Invalid daily'));
		}
		if ($this->Daily->delete()) {
			$this->Session->setFlash('Daily deleted','success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Daily was not deleted','error');
		$this->redirect(array('action' => 'index'));
	}
}
