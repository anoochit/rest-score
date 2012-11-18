<?php

class Application extends AppModel {
	  

	var $name = 'Application'; 
	var $belongsTo = array(
			'User' => array(
					'className'    => 'User',
					'foreignKey'    => 'users_id'
			)
	);

	var $hasMany = array(
			'Score' => array(
					'className'     => 'Score',
					'foreignKey'    => 'applications_id',
					'dependent'=> true
			)
	);
}