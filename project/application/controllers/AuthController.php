<?php
defined('BASEPATH') or exit('No direct script access allowed');

class AuthController extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function register()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->form_validation->set_rules('fullname', 'Input Name' ,'required');
			$this->form_validation->set_rules('username', 'Input Username','required');
			$this->form_validation->set_rules('password', 'Input Password','required');
			$this->form_validation->set_rules('confirm-password', 'Input Confirm Password','required');
			$this->form_validation->set_rules('batch', 'Input Batch','required');

			$valid_password = true;

			if ($this->input->post('password') != $this->input->post('confirm-password')) {
				$valid_password = false;
				$this->session->set_flashdata('error', 'Validation password do not match');
				redirect('register');
			}

			if ($this->form_validation->run() == TRUE) {
				$name = $this->input->post('fullname');
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				// $batch = $this->input->post('batch');
				$batch = $this->db->get_where('batch', array('id' => $this->input->post('batch')));
				$role = $this->db->get_where('role', array('name' => 'ROLE_USER'));

				if (!$batch->row()->id) {
					$this->session->set_flashdata('error', 'Batch is required');
					redirect('register');
				}
				//Save Data

				$data = array(
					'name' => $name,
					'username' => $username,
					'password' => sha1($password),
					'batch_id' => $batch->row()->id,
					'role_id'  => $role->row()->id
				);

				$this->load->model('user_model');
				$save = $this->user_model->register_user($data);
				$this->session->set_flashdata('success', 'Successfully Register');
				
				redirect('login');
			}else{
				$this->session->set_flashdata('error', 'ga tau');
				redirect('register');
			}
		}else{
			redirect('register');
		}
	}

	public function login()
	{
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$this->form_validation->set_rules('username', 'Input Username', 'required');
			$this->form_validation->set_rules('password', 'Input Password', 'required');
			
			if ($this->form_validation->run() == TRUE) {
				$username = $this->input->post('username');
				$password = $this->input->post('password');
				$password = sha1($password);

				$this->load->model('user_model');
				$status = $this->user_model->login($username, $password);

				if ($status != false) {
					$username = $status->username;
					$batch = $status->batch_id;
					$role = $status->role_id;

					$session_data = array(
						'username' => $username,
						'batch_id' => $batch,
						'role_id' => $role
					);

					$this->session->set_userdata('UserLoginSession', $session_data);
					redirect('dashboard');
				}else{
					$this->session->set_flashdata('error', 'Username or Password is wrong');
					redirect('login');
				}
			}else{
				$this->session->set_flashdata('error', 'Fill all the reuired fill');
				redirect('login');
			}
		}
	}

	public function logout(){
		$this->session->sess_destroy();
		redirect('login');
	}

	public function page_login()
	{
		$sesssion_status = $this->check_session();
		if (!$sesssion_status) {
			$this->load->view('login');
		}else{
			redirect('dashboard');
		}
	}

	public function page_register()
	{
		$sesssion_status = $this->check_session();
		if (!$sesssion_status) {

			$this->load->model('Batch_model');
			$res = $this->Batch_model->get_batch();
			$result['data'] = $res;

			$this->load->view('register', $result);
		}else{
			redirect('dashboard');
		}
	}

	public function dashboard()
	{
		$sesssion_status = $this->check_session();
		if ($sesssion_status) {
			$session_data = $this->session->userdata('UserLoginSession');

			$role = $this->db->get_where('role', array('id' => $session_data['role_id']));
			if ($role->row()->name == "ROLE_USER") {
				$this->load->view('user/dashboard');
			}else if ($role->row()->name == "ROLE_ADMIN") {
				$this->load->view('admin/dashboard');
			}else if ($role->row()->name == "ROLE_CLIENT") {
				$this->load->view('admin/dashboard');
			}
		}else{
			redirect('login');
		}
	}

	public function check_session()
	{
		if ($this->session->userdata('UserLoginSession')) {
			return true;
		}else{
			return false;
		}
	}
}
