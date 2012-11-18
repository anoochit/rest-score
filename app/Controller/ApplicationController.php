<?php

Configure::write('debug', 0);

class ApplicationController extends AppController {

	public $components = array(
			'RequestHandler',
			'Session'
	);

	public function index() {
		$this->set('data', array('success'=> true));
		$this->set('_serialize', array('data'));
		$this->render(null, 'ajax','/ajax/ajax');
	}
	
	public function viewall() {
		$data=$this->Application->find("all");
		$this->set('data', array('success'=> true,'data'=>$data));
		$this->set('_serialize', array('data'));
		$this->render(null, 'ajax','/ajax/ajax');
	}

	public function register() {
		
		$name=$this->request->data['name'];
		$package=$this->request->data['package'];
		$userPubKey=$this->request->data['pubkey'];
		$userSessKey=$this->request->data['sesskey'];
		$sessKey=$this->Session->read('Controller.sessKey');
		$userKey=$this->Session->read('Controller.userKey');
		$pubKey=$this->Session->read('Controller.pubKey');
		
		if (($name!=null) AND ($package!=null) AND ($userPubKey!=null) AND ($userSessKey!=null) AND ($sessKey==$userSessKey) AND ($pubKey==$userPubKey)) {
			$appkey=uniqid(null).uniqid(null);	 
			$data=$this->Application->User->findBypubkey($pubKey);
			if ($data) {
				$this->Application->read(null, 1);
				$this->Application->set(array( 'id' => null,
						'appname' => $name,
						'package' => $package,
						'appkey' => $appkey,
						'users_id' => $data['User']['id'],
						'create' => null));
				$result=$this->Application->save();
			}						
			$this->set('data', array('success'=> true, 'data' => $result));
		} else {
			$this->set('data', array('success'=> false, 'data' => "wrong request"));
		}
		
		$this->set('_serialize', array('data'));
		$this->render(null, 'ajax','/ajax/ajax');
		
	}
}