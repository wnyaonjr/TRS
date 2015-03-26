<?php

class TimeinRecordsController extends AppController {
	public $helper = array('Html', 'Form');

	public function index() {
        if ($this->request->is('post')) {
            $sha1_pass = sha1($this->request->data['TimeinRecord']['password']);
            $rows = $this->TimeinRecord->Employee->find('all', array(
                'conditions' => array('Employee.password' => $sha1_pass)
            ));

            $resultCount = count($rows);

            //$this->Session->setFlash(__('Count: '+$resultCount));

            if($resultCount == 1){
                $this->TimeinRecord->create();

                 $data = array(
                    'employee_id'=>$rows[0]['Employee']['id'],
                    'timestamp'=> DboSource::expression('NOW()')
                );

                if ($this->TimeinRecord->save($data))
                    return $this->redirect(array('action' => 'index'));
                else
                    $this->Session->setFlash(__('Please check password!'));

            }else
                $this->Session->setFlash(__('Please check password! '));
        }

        $this->set('timeinrecords', $this->TimeinRecord->find('all', array(
                'order' => array('TimeinRecord.timestamp DESC')
            )));
    }

    public function insertTimein()
    {
        $data = array(
                'employeeId'=>'1',
                'timestamp'=> Time::now(),
            );

        $this->TimeinRecord->create();
        if ($this->TimeinRecord->save($data)) {
            $this->Session->setFlash(__('Your post has been saved.'));
            return $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__('Unable to add your post.'));

    }
}