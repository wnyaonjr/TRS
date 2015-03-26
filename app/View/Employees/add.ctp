<h1>Add Employee</h1>
<?php
echo $this->Form->create('Employee');
echo $this->Form->input('name');
echo $this->Form->input('company');
echo $this->Form->input('email');
echo $this->Form->input('password');
echo $this->Form->input('confirm_password', array('type' => 'password'));
echo $this->Form->end('Save');