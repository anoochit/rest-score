<?php

Configure::write('debug', 0);

class UserController extends AppController {

	public $components = array(
			'RequestHandler',
			'Session'
	);

	public function index() {
		$this->set('data', array('success'=> true));
		$this->set('_serialize', array('data'));
		$this->render(null, 'ajax','/ajax/ajax');
	}

	public function findall() {
		$data=$this->User->find("all");
		$this->set('data', array('success'=> true,'data'=>$data));
		$this->set('_serialize', array('data'));
		$this->render(null, 'ajax','/ajax/ajax');
	}

	// sign in for webform
	public function signin() {
		$conditions=array("User.email LIKE" => $this->request->data["email"], "AND" => array("User.password" => $this->request->data["password"]));
		$data=$this->User->find('first', array('conditions' => $conditions));

		if ($data) {
			$sessionKey=md5(uniqid());
			$this->Session->write('Controller.sessKey', $sessionKey);
			$this->Session->write('Controller.pubKey', $data['User']['pubkey']);
			$this->Session->write('Controller.userKey', $data['User']['id']);
			$this->set('data', array('success'=> true,
					'data'=> array("sessKey"=> $this->Session->read('Controller.sessKey'),
							"pubKey"=> $this->Session->read('Controller.pubKey'),
							"userKry"=> $this->Session->read('Controller.userKey')
					)));
		} else {
			$this->set('data', array('success'=> false,'data'=>false));
		}
		$this->set('_serialize', array('data'));
		$this->render(null, 'ajax','/ajax/ajax');
	}

	// TODO should check for unique member
	public function signup() {
		if (($this->request->data["email"]==null) OR ($this->request->data["password"]==null)) {
			// no data return success false
			$this->set('data', array('success'=> false,'message'=>'nodata'));
		} else {
			// has data return success true and save database
			$pubkey=uniqid(null);
			$this->User->read(null, 1);
			$this->User->set(array( 'id' => null,
					'email' => $this->request->data["email"],
					'password' => $this->request->data["password"],
					'pubkey' => $pubkey,
					'create' => null));
			$result=$this->User->save();
				
			if ($result) {
				$this->set('data', array('success'=> true,
						'email'=> $this->request->data["email"],
						'password' => $this->request->data["password"],
						'pubkey' => $pubkey));
			} else {
				$this->set('data', array('success'=> false,'message'=>'notsave'));
			}
				
				
		}
		$this->set('_serialize', array('data'));
		$this->render(null, 'ajax','/ajax/ajax');
	}

}