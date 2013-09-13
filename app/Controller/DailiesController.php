<?php
App::uses('AppController', 'Controller');
class DailiesController extends AppController {
	public function admin_index() {
		$this->Daily->recursive = 0;
		$this->set('dailies', $this->paginate());
	}

	public function add() {
		if ($this->request->is('post')) {
			$this->Daily->create();
			if ($this->Daily->save($this->request->data)) {
				$this->Session->setFlash('The daily has been saved','success');
				$this->redirect('/dashboard');
			} else {
				$this->Session->setFlash('The daily could not be saved. Please, try again.','error');
			}
		}
		$projects = $this->Daily->Project->find('list');
		$contractors = $this->Daily->Contractor->find('list');
		$subcontractors = $this->Daily->Subcontractor->find('list');
		$this->set(compact('projects','comtractors','subcontractors'));
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
			if ($this->Daily->save($this->request->data)) {
				$this->Session->setFlash('The daily has been saved','success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The daily could not be saved. Please, try again.','error');
			}
		} else {
			$options = array('conditions' => array('Daily.' . $this->Daily->primaryKey => $id));
			$this->request->data = $this->Daily->find('first', $options);
		}
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
