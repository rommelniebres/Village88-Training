<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
	public function index()
	{
		$this->load->model("product");
        $products = $this->product->get_all_products();
		$this->session->set_userdata('products', $products);
		$this->load->view('restful/index');
	}
	public function new()
	{
		$this->load->view('restful/new');
	}
	public function edit($id)
	{
		$this->load->model("product");
		$product = $this->product->get_product_by_id($id);
		$this->session->set_userdata('product', $product);
		$this->load->view('restful/edit');
	}
	public function show($id)
	{
		$this->load->model("product");
		$product = $this->product->get_product_by_id($id);
		$this->session->set_userdata('product', $product);
		$this->load->view('restful/show');
	}
	public function create()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("price", "Price", "required|numeric");
		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('/products/new');
		}
		else
		{
			$product['name'] = $this->input->post('name');
			$product['description'] = $this->input->post('description');
			$product['price'] = $this->input->post('price');
			$this->load->model("product");
			$add_product = $this->product->add_product($product);
			redirect('/products');
		}
	}
	public function destroy($id)
	{
		$this->load->model("product");
        $this->product->delete_product_by_id($id);
		redirect('/');
	}
	public function update($id)
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("price", "Price", "required|numeric");
		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata('error', validation_errors());
			redirect('/products/edit/'. $id);
		}
		else
		{
			$data = array(
				'table_name' => 'product',
				'id' => $id,
				'name' => $this->input->post('name'),
				'description' => $this->input->post('description'),
				'price' => $this->input->post('price'),
				'updated_at' => date("Y-m-d, H:i:s")
			);
			$this->load->model("product");
			$update_product = $this->product->update_product_by_id($data);
			redirect('/products');
		}
		
	}
}