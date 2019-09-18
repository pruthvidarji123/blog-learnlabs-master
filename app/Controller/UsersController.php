<?php
	App::uses('CakeEmail', 'Network/Email');
	class UsersController extends AppController{
		var $uses = array('User','Post');
		var $helpers = array('Html','Js');
		public function beforeFilter() {
	        parent::beforeFilter();
			$this->Auth->loginRedirect = array('controller' => 'posts', 'action' => 'index_user');
			$this->Auth->logoutRedirect = array('controller' => 'users', 'action' => 'login');
			$this->Auth->loginAction = array('controller' => 'users', 'action' => 'login');
			
			 // Basic setup
	        $this->Auth->authenticate = array('Form');
	
	        // Pass settings in
	       $this->Auth->authenticate = array(
            	'all' => array(
                	'userModel' => 'User',
                	'scope' => array('User.is_active' => 1)
	        	),
		        'Form',
		        'Basic'
	        );
	        $this->Auth->allow('login','forgot_password','subscribe','register','activate_user');
	    }
	
		
		public function login(){
			
			$this->layout='blog_layout';
			// $a=array();
			// $a['name']='Lakhan Samani';
			// $a['email']='lakhan.m.samani@gmail.com';
			// $a['username']='lakhan.m.samani@gmail.com';
			// $a['password']='123456';
			//$this->User->save($a);
			if($this->Session->check('Auth.User')){
				$this->redirect(array('action' => 'index'));		
			}
			
			// if we get the post information, try to authenticate
			if ($this->request->is('post')) {
				if ($this->Auth->login()) {
					//$this->Session->setFlash('Successfully logged in','default',array('class'=>'alert-box success radius'),'good');
					$this->redirect($this->Auth->redirectUrl());
					
				} else {
					$this->Session->setFlash('Invalid username or password','default',array('class'=>'alert-box alert radius'),'bad');
				}
			} 
		}
		 public function logout(){
	        if($this->Auth->logout()){
	        	$this->Session->setFlash('Successfully Logged out of the system','default',array('class'=>'alert-box success radius'),'success');
	            $this->redirect(array('controller'=>'users','action'=>'login'));
	        }
	        else{
	            die('Sorry incorrect.');
	        }
	    }

	    public function register(){
	    	$this->layout='blog_layout';
	    	if($this->request->is('post')){
	    		$data=$this->request->data;
	    		$data['User']['email']=$data['User']['username'];
	    		if($this->User->save($data)){
	    			$id= $this->User->getLastInsertId();
	    			

					$body="<h1>New User Registration</h1>";
					$body.="Your registration details<hr/>";
					$body.="<b> Name  </b>".$data['User']['name']."<br/>";
					$body.="<b> email  </b>".$data['User']['username']."<br/>";
					$body.="Thank you for becoming part of learn labs, you contribution is valuable to us. Please actiavate your account using following link";
					$body.="http://localhost/freelance/blog-learn-labs/users/activate_user/".$this->User->getLastInsertId();
					/*$Email = new CakeEmail();
					$Email->from(array('noreply@pruthvidarji.in' => 'Pruthvi Darji'))
						 ->to($data['User']['username'])//$data['Student']['email']
					     ->subject('New User Registration')
						 ->viewVars(array('value' => $data['User']))
					     ->emailFormat('html')
						 ->send($body);*/
	    			$this->Session->setFlash('Successfully registered','default',array('class'=>'alert-box success radius'),'success');
	            	$this->redirect(array('controller'=>'users','action'=>'login'));
	    		}
	    		else{
	    			$this->Session->setFlash('Sorry, there was error','default',array('class'=>'alert-box alert radius'),'error');
	    		}
	    	}
	    }
	   /* public function activate_user($id){
	    	$user['User']['id']=$id;
	    	$user['User']['is_active']=1;
	    	if($id==NULL){
	    		$this->Session->setFlash('ID, not found','default',array('class'=>'alert-box alert radius'),'error');
	    	}
	    	else{
	    		//add update query
	    		if($this->User->save($user)){
	    			$this->Session->setFlash('Approved Successfully','default',array('class'=>'alert-box success radius'),'success');
	            	$this->redirect(array('controller'=>'users','action'=>'login'));
	    		}
	    		else{
	    			$this->Session->setFlash('ID, not found','default',array('class'=>'alert-box alert radius'),'error');
	    		}
	    	}
	    }*/
	}
?>