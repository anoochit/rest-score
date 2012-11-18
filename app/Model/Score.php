<?php

class Score extends AppModel {

	var $name = 'Score'; 
	var $belongsTo = array(
			'Application' => array(
					'className'    => 'Application',
					'foreignKey'    => 'applications_id'
			)
	);

}