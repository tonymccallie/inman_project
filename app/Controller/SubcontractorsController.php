<?php
App::uses('AppController', 'Controller');
class SubcontractorsController extends AppController {
	public function admin_index() {
		$this->Subcontractor->recursive = 0;
		$this->set('subcontractors', $this->paginate());
	}


	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Subcontractor->create();
			if ($this->Subcontractor->save($this->request->data)) {
				$this->Session->setFlash('The subcontractor has been saved','success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The subcontractor could not be saved. Please, try again.','error');
			}
		}
	}


	public function admin_edit($id = null) {
		if (!$this->Subcontractor->exists($id)) {
			throw new NotFoundException(__('Invalid subcontractor'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Subcontractor->save($this->request->data)) {
				$this->Session->setFlash('The subcontractor has been saved','success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash('The subcontractor could not be saved. Please, try again.','error');
			}
		} else {
			$options = array('conditions' => array('Subcontractor.' . $this->Subcontractor->primaryKey => $id));
			$this->request->data = $this->Subcontractor->find('first', $options);
		}
	}


	public function admin_delete($id = null) {
		$this->Subcontractor->id = $id;
		if (!$this->Subcontractor->exists()) {
			throw new NotFoundException(__('Invalid subcontractor'));
		}
		if ($this->Subcontractor->delete()) {
			$this->Session->setFlash('Subcontractor deleted','success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash('Subcontractor was not deleted','error');
		$this->redirect(array('action' => 'index'));
	}
}
