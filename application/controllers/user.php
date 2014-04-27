<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends My_Controller {

	public function __construct() {
		parent::__construct();
		$this->load->model('user_model');
	}

	
	public function index($page="users") {
		$data['title'] = ucfirst($page); 
		$data['users']=$this->read();
		$this->render('user/list', $data);		
	}


	public function edit($id, $page = "edit") {
		$data['title'] = ucfirst($page);
		$data['user']=$this->read($id);
		$this->render('user/edit', $data);
	}


	public function newusr($page="new user") {
		$data['title'] = ucfirst($page);
		$this->render('user/new', $data);		
	}
	

	public function create(){
		$this->user_model->create_user();
		redirect(URL.'user');
	}

	

	public function read($id = NULL) {
		if($id==NULL){
			$res=$this->user_model->load_users();
		}else {
			$res=$this->user_model->load_one_user($id);
		}

		return $res;
	}


	public function update($id) {
		$this->user_model->update_user($id);
		redirect(URL.'user');
	}

	
	public function delete($id) {
		$this->user_model->delete_user($id);
	}
}

