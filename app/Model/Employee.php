<?php
class Employee extends AppModel {

    public $hasMany = array(
        'TimeIn' => array(
                'className' => 'TimeinRecord'
        )
    );

	var $name = 'Employee';
	var $validate = array( 
        'password' => array( 
        'identicalFieldValues' => array( 
        'rule' => array('identicalFieldValues', 'confirm_password' ), 
        'message' => 'Please re-enter your password twice so that the values match' 
                ) 
            ) 
        );

	function identicalFieldValues( $field=array(), $compare_field=null )  
    { 
        foreach( $field as $key => $value ){ 
            $v1 = $value; 
            $v2 = $this->data[$this->name][ $compare_field ];                  
            if($v1 !== $v2) { 
                return FALSE; 
            } else { 
                continue; 
            } 
        } 
        return TRUE; 
    }

    public function beforeSave($options = array()) {
        parent::beforeSave();
        $this->data['Employee']['password'] = sha1($this->data['Employee']['password']);

         $match = $this->find('count', array(
                'conditions' => array('Employee.password' => $this->data['Employee']['password']))
        );

        if($match == 0)
            return true;


        return false;
    }
     


}