<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library(array('session'));
	}

	public function login()
	{
        $this->load->database();
		$this->load->helper(array('form', 'url'));

		if($this->session->userdata('user')) {
			redirect('/');
		}

		$this->load->library(array('form_validation'));

		$this->form_validation->set_rules('email', 'Email', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		if($_SERVER['REQUEST_METHOD'] === 'POST') {
			if ($this->form_validation->run()) {
				$query = $this->db->get_where('user', array('email' => $this->input->post('email')), 1);
				if($query->num_rows()) {
					$user = $query->result()[0];
					if($user->password === md5($this->input->post('password'))) {
						$this->session->set_userdata(array('user' => $user));
						redirect('/');
					}
				}

				$this->session->set_flashdata('error', 'Invalid credentials');
			}
		}

		$this->load->view('layout/layout', array(
			'bodyClass' => 'login',
			'content' => $this->load->view('auth/login', array(
			), true),
		));
	}

	public function register()
	{
        $this->load->database();
		$this->load->helper(array('form', 'url'));

		if($this->session->userdata('user')) {
			redirect('/');
		}

		$this->load->library(array('form_validation'));

		$this->form_validation->set_rules('email', 'Email', 'strtolower|required|valid_email|is_unique[user.email]');
		$this->form_validation->set_rules('password', 'Password', 'required|min_length[6]|max_length[30]');
		$this->form_validation->set_rules('confirm_password', 'Password Confirmation', 'required|matches[password]');


		if($_SERVER['REQUEST_METHOD'] === 'POST') {
			if ($this->form_validation->run()) {
				$this->db->insert('user', array(
					'email' => $this->input->post('email'),
					'password' => md5($this->input->post('password')),
				));
				$this->session->set_flashdata('success', 'Registration successfull');
				redirect('login');
			}
		}

		$this->load->view('layout/layout', array(
			'bodyClass' => 'login',
			'content' => $this->load->view('auth/register', array(
			), true),
		));
	}

	public function logout()
	{
		$this->load->helper(array('url'));
		$this->session->unset_userdata('user');
		redirect('login');
	}
}
