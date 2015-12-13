<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Project extends CI_Controller
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

	public function projects()
	{
        $this->load->database();
		$this->load->helper(array('form', 'url'));

		$this->load->library(array('form_validation'));

		$this->form_validation->set_rules('name', 'Name', 'required|min_length[1]|max_length[100]');

		if($_SERVER['REQUEST_METHOD'] === 'POST') {
			if ($this->form_validation->run()) {
				$this->db->insert('project', array(
					'name' => $this->input->post('name'),
				));
				$this->session->set_flashdata('success', 'Project created');
				redirect('projects');
			}
		}

		$this->load->view('layout/layout', array(
			'content' => $this->load->view('project/projects', array(
				'projects' => $this->db->get('project')->result_array(),
			), true),
		));
	}

	public function edit($project_sid)
	{
		$project_sid = (int)$project_sid;

        $this->load->database();
		$this->load->helper(array('form', 'url'));

		$query = $this->db->get_where('project', array('project_sid' => $project_sid), 1);
		if($query->num_rows()) {
			$project = $query->result_array()[0];
		}

		if(empty($project)) {
			show_404();
		}

		$this->load->library(array('form_validation'));

		$this->form_validation->set_rules('project_sid', 'project_sid', 'intval|required');
		$this->form_validation->set_rules('name', 'Name', 'required|min_length[1]|max_length[100]');

		if($_SERVER['REQUEST_METHOD'] === 'POST') {
			$_POST['project_sid'] = $project_sid;
			if ($this->form_validation->run()) {
				$this->db->update('project', array(
					'project_sid' => $this->input->post('project_sid'),
					'name' => $this->input->post('name'),
				));
				$this->session->set_flashdata('success', 'Project updated');
				redirect('projects');
			}
		}

		$this->load->view('layout/layout', array(
			'content' => $this->load->view('project/edit', array(
				'project' => $project,
			), true),
		));
	}

	public function delete($project_sid)
	{
		if($_SERVER['REQUEST_METHOD'] !== 'POST') {
			show_error('Method Not Allowed', 405);
		}
		$project_sid = (int)$project_sid;

        $this->load->database();
		$this->load->helper(array('form', 'url'));

		$query = $this->db->get_where('project', array('project_sid' => $project_sid), 1);
		if($query->num_rows()) {
			$project = $query->result_array()[0];
		}

		if(empty($project)) {
			show_404();
		}

		$this->db->delete('project', array('project_sid' => $project_sid));
		$this->session->set_flashdata('success', 'Project deleted');
		redirect('projects');
	}
}
