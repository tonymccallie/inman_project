<?php
App::uses('AppController', 'Controller');
class SubcontractorsController extends AppController {

	public function index() {
		$this->Subcontractor->recursive = 0;
		
		$paginate = array(
			'conditions' => array(),
			'order' => array(
				'Subcontractor.title' => 'asc'
			),
			'limit' => 20
		);
		
		if(!empty($this->request->data['Subcontractor']['search'])) {
			$paginate['conditions'][] = array('OR' => array(
				'Subcontractor.title LIKE' => '%'.$this->request->data['Subcontractor']['search'].'%',
				'Subcontractor.notes LIKE' => '%'.$this->request->data['Subcontractor']['search'].'%',
				'Subcontractor.contact LIKE' => '%'.$this->request->data['Subcontractor']['search'].'%',
				'Subcontractor.city LIKE' => '%'.$this->request->data['Subcontractor']['search'].'%',
			));
		}
		
		$this->paginate = $paginate;
		
		$this->set('subcontractors', $this->paginate());
	}

	public function view($id = null) {
		if (!$this->Subcontractor->exists($id)) {
			throw new NotFoundException(__('Invalid subcontractor'));
		}
		$options = array('conditions' => array('Subcontractor.' . $this->Subcontractor->primaryKey => $id));
		$subcontractor = $this->Subcontractor->find('first', $options);
		$this->set(compact('subcontractor'));
	}

	public function admin_index() {
		$this->Subcontractor->recursive = 0;
		
		$paginate = array(
			'conditions' => array(),
			'order' => array(
				'Subcontractor.title' => 'asc'
			),
			'limit' => 20
		);
		
		if(!empty($this->request->data['Subcontractor']['search'])) {
			$paginate['conditions'][] = array('OR' => array(
				'Subcontractor.title LIKE' => '%'.$this->request->data['Subcontractor']['search'].'%',
				'Subcontractor.notes LIKE' => '%'.$this->request->data['Subcontractor']['search'].'%',
				'Subcontractor.contact LIKE' => '%'.$this->request->data['Subcontractor']['search'].'%',
				'Subcontractor.city LIKE' => '%'.$this->request->data['Subcontractor']['search'].'%',
			));
		}
		
		$this->paginate = $paginate;
		
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
