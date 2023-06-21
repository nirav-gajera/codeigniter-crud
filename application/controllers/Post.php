<?php
defined('BASEPATH') or exit('No direct script access allowed');
class Post extends CI_Controller
{

	function __construct() 
	{
		parent::__construct();
		$this->load->model('crud');
		$this->load->library('pagination');
	}

	public function index()
	{
		$this->load->library('pagination');
	
		$totalRows = $this->crud->count_records('posts');
	
		$config['base_url'] = base_url('post/index');
		$config['total_rows'] = $totalRows;
		$config['per_page'] = 5;
	
		$this->pagination->initialize($config);
	
		$currentPage = $this->uri->segment(3, 0);
	
		$data['data'] = $this->crud->get_records('posts', $config['per_page'], $currentPage);
		$data['pagination'] = $this->pagination->create_links();
	
		$this->load->view('post/list', $data);
		$this->output->enable_profiler(FALSE);
	}
	

	// public function index() 
	// {	
	// 	$data['data'] = $this->crud->get_records('posts');
	// 	$this->load->view('post/list', $data);
	// 	$this->output->enable_profiler(FALSE);
	// }

	public function create()
	{
		$this->load->view('post/create');
	}

	public function store() 
	{
		$data['title'] = $this->input->post('title');
		$data['description'] = $this->input->post('description');

		$this->crud->insert('posts', $data);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Record saved successfully.</div>');
		redirect(base_url());
	}

	public function edit($id) 
	{
		$data['data'] = $this->crud->find_record_by_id('posts', $id);
		$this->load->view('post/edit', $data);
	}

	public function update($id) 
	{
		$data['title'] = $this->input->post('title');
		$data['description'] = $this->input->post('description');

		$this->crud->update('posts', $data, $id);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Record updated successfully.</div>');
		redirect(base_url());
	}

	public function delete($id)
	{	
		// echo "ID: " . $id;
		$this->crud->delete('posts', $id);
		$this->session->set_flashdata('message', '<div class="alert alert-success">Record deleted successfully.</div>');
		redirect(base_url());
	}

	public function search()
	{
		$searchValue = $this->input->post('searchValue');
		$data['data'] = $this->crud->search_records('posts', $searchValue);
		$this->load->view('post/search_results', $data);
	}

			
	
	
}
