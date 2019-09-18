<?php
	class PostsController extends AppController{
		var $uses = array('User','Post');
		// main blog page
		public function beforeFilter() {
	        $this->Auth->allow('index');
	    }
		public function index(){
			$this->layout="blog_layout";
			$posts=$this->Post->find('all');
			$this->set('posts',$posts);
		}

		public function index_user(){
			$this->layout="blog_mgr";
			$posts=$this->Post->find('all',array('conditions'=>array('Post.user_id'=>$this->Auth->user('id'))));
			$this->set('posts',$posts);
			$this->set('user',$this->Session->read('Auth'));
		}
		public function write_post(){
			$this->layout="blog_mgr";
			$this->set('user',$this->Session->read('Auth'));
			if($this->request->is('post')){
				$data=$this->data;
				$data['Post']['body']=ereg_replace( "\n",'<br/>', $data['Post']['body']);
				$json_dt=$data['Post'];
				$data['Post']['dump']=json_encode($json_dt);
				if($this->Post->save($data)){
					$this->Session->setFlash('Post added successfully','default',array('class'=>'alert-box success radius'),'success');
	            	$this->redirect(array('controller'=>'posts','action'=>'index_user'));
				}
				else{
					$this->Session->setFlash('Sorry error occurred','default',array('class'=>'alert-box alert radius'),'error');
				}
			}
		}
		public function edit_post($id){
				$this->set('user',$this->Session->read('Auth'));
				$this->layout="blog_mgr";
				if(empty($this->data)){
					$dt=$this->Post->findById($id);
					$dt['Post']['body']=str_replace("<br/>", "\n", $dt['Post']['body']);
	                $this->data=$dt;
	            }
				else if(!$id){
					 $this->Session->setFlash("Invalid post",'default',array('class'=>'alert-box alert'),'error');
					 
				}
	            else{
	            	$data=$this->request->data;
	            	$data['Post']['body']=ereg_replace( "\n",'<br/>', $data['Post']['body']);
	            	$json_dt=$data['Post'];
					$data['Post']['dump']=json_encode($json_dt);
	                if($this->Post->save($data)){
	                    $this->Session->setFlash("Post Updated Successfully",'default',array('class'=>'alert-box success'),'success');
	                    $this->redirect(array('controller'=>'posts','action'=>'index_user'));
	                }
	                else{
	                    $this->Session->setFlash("Post not Updated",'default',array('class'=>'alert-box alert'),'error');
	                 
	                }
	            }
		}
		public function delete_post($id=null){
			$this->Post->delete($id);      
			$this->Session->setFlash("Post deleted successfully.",'default',array('class'=>'alert-box success'),'success');     				
            $this->redirect(array('controller'=>'posts','action'=>'index_user'));
		}
	}
?>