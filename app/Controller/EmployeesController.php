<?php
class EmployeesController extends AppController {
	public $helper = array('Html', 'Form');

	public function index() {
        $this->set('employees', $this->Employee->find('all'));

    }

    public function add() {
		if ($this->request->is('post')) {

            $this->Employee->create();
            if ($this->Employee->save($this->request->data)) {
                $this->Session->setFlash(__('Your new employee has been saved.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Session->setFlash(__('Unable to add new employee.'));
        }

    }

}