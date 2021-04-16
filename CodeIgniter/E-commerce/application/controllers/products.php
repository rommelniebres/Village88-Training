<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
	public function index()
	{
		$this->load->model("product");
		$products['products'] = $this->product->get_all_products();
		$count = $this->product->count_cart();
		$products['count'] = $count->num_rows();
		// var_dump($products['count']);
		$this->load->view('index', $products);
	}
	public function cart()
	{
		$this->load->model("product");
		$cart['cart'] = $this->product->get_cart();
		$this->load->view('cart', $cart);
	}
	public function add($id)
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("quantity", "Quantity", "required|greater_than[0]");
		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata('status', validation_errors());
		}
		else
		{	
			$cart = array(
			'product_id' => $id,
			'quantity' => $this->input->post('quantity'),
			'created_at' => date("Y-m-d, H:i:s")
			);
			$this->load->model("product");
			$this->product->add_to_cart($cart);
			$this->session->set_flashdata('status', "Added to Cart!");
		}
		redirect('/products');
	}
	public function delete($id)
	{
		
		$this->load->model("product");
		$this->product->delete_item_by_id($id);
		redirect('/products/cart');
	}
	public function billing()
	{
		$this->load->library("form_validation");
		$this->form_validation->set_rules("name", "Name", "required");
		$this->form_validation->set_rules("address", "Address", "required");
		$this->form_validation->set_rules("card", "Card", "required|numeric");
		if($this->form_validation->run() === FALSE)
		{
			$this->session->set_flashdata('status', validation_errors());
			redirect('/products/cart');
		}
		else
		{	
			$bill = array(
				'name' => $this->input->post('name'),
				'address' => $this->input->post('address'),
				'card' => $this->input->post('card'),
				'amount' => $this->input->post('amount'),
				'created_at' => $this->input->post('created_at')
				);
			$this->load->model("product");
			$this->product->cart_bill($bill);
			$this->product->delete_all_cart();
			echo "Bill Created! Redirecting to home...";
			header("Refresh:3; url=/products");
		}
	}
}