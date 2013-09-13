<?php
App::uses('AppController', 'Controller');
class ContractorsController extends AppController {
	public function admin_index() {
		$this->Contractor->recursive = 0;
		$this->set('contractors', $this->paginate());
	}


	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Contractor->create();
			if ($this->Contractor->save($this->request->data)) {
				$this->Session->setFlash('The contractor has been saved','success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The contractor could not be saved. Please, try again.','error');
			}
		}
	}


	public function admin_edit($id = null) {
		if (!$this->Contractor->exists($id)) {
			throw new NotFoundException(__('Invalid contractor'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Contractor->save($this->request->data)) {
				$this->Session->setFlash('The contractor has been saved','success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The contractor could not be saved. Please, try again.','error');
			}
		} else {
			$options = array('conditions' => array('Contractor.' . $this->Contractor->primaryKey => $id));
			$this->request->data = $this->Contractor->find('first', $options);
		}
	}


	public function admin_delete($id = null) {
		$this->Contractor->id = $id;
		if (!$this->Contractor->exists()) {
			throw new NotFoundException(__('Invalid contractor'));
		}
		if ($this->Contractor->delete()) {
			$this->Session->setFlash('Contractor deleted','success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Contractor was not deleted','error');
		$this->redirect(array('action' => 'index'));
	}
}
