<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Todo extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->helper(array('form', 'url'));
		$this->load->library(array('session'));

		if(!$this->session->userdata('user')) {
			$this->session->set_flashdata('error', 'Login first');
			redirect('login');
		}

	}

	public function index()
	{
		$this->load->database();
		$this->load->model('Project_model', '', true);
		$this->load->model('Todo_status_model', '', true);
		$this->load->model('Todo_model', '', true);

		if($_SERVER['REQUEST_METHOD'] === 'POST') {
			$this->load->library(array('form_validation'));

			$this->form_validation->set_rules('todo_sid', 'Todo Sid', 'intval');
			$this->form_validation->set_rules('priority', 'Priority', 'intval');
			$this->form_validation->set_rules('project_sid', 'Project Sid', 'intval|callback_validate_project_sid');
			$this->form_validation->set_rules('todo_status_sid', 'Todo Status Sid', 'intval|required|callback_validate_todo_status_sid');
			$this->form_validation->set_rules('text', 'Text', 'trim|required|min_length[1]|max_length[10000]');

			if ($this->form_validation->run()) {
				$data = $this->input->post();

				if(empty($data['todo_sid'])){
					$this->db->insert('todo', array(
						'priority' => (int)$data['priority'],
						'project_sid' => (empty($data['project_sid'])) ? null : (int)$data['project_sid'],
						'todo_status_sid' => (int)$data['todo_status_sid'],
						'text' => $data['text'],
						'date_created' => dateSql(),
					));
				} else {
					$this->db->where('todo_sid', (int)$data['todo_sid']);
					$this->db->update('todo', array(
						'priority' => (int)$data['priority'],
						'project_sid' => (empty($data['project_sid'])) ? null : (int)$data['project_sid'],
						'todo_status_sid' => (int)$data['todo_status_sid'],
						'text' => $data['text'],
						'date_updated' => dateSql(),
					));
				}
			}

			redirect('/');
		}

		$filter = isset($_GET['filter']) ? $_GET['filter'] : array();

		$this->load->view('layout/layout', array(
			'content' => $this->load->view('todo/index', array(
				'todos' => $this->Todo_model->fetch_filtered($filter),
				'projects' => $this->Project_model->get_list(),
				'todo_statuses' => $this->Todo_status_model->get_list(),
				'filter' => $filter,
			), true),
		));
	}

	public function validate_project_sid($project_sid)
	{
		if(empty($project_sid)) {
			return true;
		}
		return !!$this->db->get_where('project', array('project_sid' => (int)$project_sid), 1)->num_rows();
	}

	public function validate_todo_status_sid($todo_status_sid)
	{
		return !!$this->db->get_where('todo_status', array('todo_status_sid' => (int)$todo_status_sid), 1)->num_rows();
	}
}
