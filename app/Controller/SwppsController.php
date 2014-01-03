<?php
App::uses('AppController', 'Controller');
class SwppsController extends AppController {
	public function admin_index() {
		$this->Swpp->recursive = 0;
		$this->set('swpps', $this->paginate());
	}
	
	
	public function choose(){
		$projects = $this->Swpp->Project->find('list');
		$this->set(compact('projects'));
	}
	
	
	public function add($project = null) {
		if(empty($project)) {
			$this->redirect('/swpps/choose');
		}
		
		$project = $this->Swpp->Project->find('first',array(
			'conditions' => array(
				'Project.id' => $project
			),
			'contain' => array()
		));
		
		if ($this->request->is('post')) {
			$this->Swpp->create();

			if ($this->Swpp->saveAll($this->request->data)) {
				if(!empty($project['Project']['emails'])) {
					$emails = explode(',', $project['Project']['emails']);
					Common::email(array(
						'to' => $emails,
						'subject' => 'Swpp Created',
						'template' => 'swpp',
						'variables' => array(
							'project' => $project,
							'last_id' => $this->Swpp->getLastInsertId()
						)
					),'');
				}
				$this->Session->setFlash('The SWPP has been saved','success');
				$this->redirect('/dashboard');
			} else {
				$this->Session->setFlash('The SWPP could not be saved. Please, try again.','error');
			}
		}

		$this->set(compact('project'));
	}
	
	
	public function admin_edit($id = null) {
		if (!$this->Swpp->exists($id)) {
			throw new NotFoundException(__('Invalid SWPP'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Swpp->saveAll($this->request->data)) {
				$this->Session->setFlash('The SWPP has been saved','success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The SWPP could not be saved. Please, try again.','error');
			}
		} else {
			$options = array('conditions' => array('Swpp.' . $this->Swpp->primaryKey => $id));
			$this->request->data = $this->Swpp->find('first', $options);
		}
		
		$project = $this->Swpp->Project->find('first',array(
			'conditions' => array(
				'Project.id' => $this->request->data['Project']['id']
			),
			'contain' => array()
		));
		
		$this->set(compact('project'));
	}
}
?>