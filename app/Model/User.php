<?php

class User extends AppModel {

	var $name = 'User';
	var $hasMany = array(
			'Application' => array(
					'className'     => 'Application',
					'foreignKey'    => 'users_id',
					'dependent'=> true
			)
	);

}