<?php

Configure::write('debug', 0);

class ScoreController extends AppController {

	public $components = array(
			'RequestHandler',
			'Session'
	);

	public function index() {
		$this->set('data', array('success'=> true));
		$this->set('_serialize', array('data'));
		$this->render(null, 'ajax','/ajax/ajax');
	}

	public function push() {
		$name=$this->request->data['name'];;
		$score=$this->request->data['score'];
		$appkey=$this->request->data['appkey'];
			
		if (($name!=null) AND ($score!=null) AND ($appkey!=null)) {
			$data=$this->Score->Application->findByappkey($appkey);
			if ($data) {
					
				$this->Score->read(null, 1);
				$this->Score->set(array('id' => null,
						'name' => $name,
						'score' => $score,
						'applications_id' =>  $data['Application']['id'],
						'appkey' => $appkey,
						'create' =>null
				));
				$result=$this->Score->save();
				$this->set('data', array('success'=> true,'data'=> $result));
			} else {
				$this->set('data', array('success'=> false,'data'=> "wrong request"));
			}
		} else {
			$this->set('data', array('success'=> false,'data'=> false));
		}

		$this->set('_serialize', array('data'));
		$this->render(null, 'ajax','/ajax/ajax');
	}

	public function leaderboard() {
		$appkey=$this->request->data['appkey'];
		if ($appkey!=null) {
				
			$condition=array(
					'fields' => array("Score.name , MAX(Score.score) score "),
					'Score.appkey' => $appkey,
					'group' => 'Score.name',
					'order'=> array('MAX(Score.score) DESC'),
					'limit' => 10
			);
				
			 $data=$this->Score->find('all',$condition);
			 
			$this->set('data', array('success'=> true,'data'=> $data));
		} else {
			$this->set('data', array('success'=> false,'data'=> false));
		}
		$this->set('_serialize', array('data'));
		$this->render(null, 'ajax','/ajax/ajax');
	}

	public function viewall() {
		$data=$this->Score->find("all");
		$this->set('data', array('success'=> true,'data'=>$data));
		$this->set('_serialize', array('data'));
		$this->render(null, 'ajax','/ajax/ajax');
	}


}