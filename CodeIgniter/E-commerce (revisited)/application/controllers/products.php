<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {
	public function index()
	{
		$products['products'] = $this->product->get_all_products();
		$count = $this->product->count_cart();
		$products['count'] = $count->num_rows();
		$products = $this->security->xss_clean($products);
		$this->load->view('index', $products);
	}
	public function cart()
	{
		$cart['cart'] = $this->product->get_cart();
		$cart = $this->security->xss_clean($cart);
		$this->load->view('cart', $cart);
	}
	public function add($id)
	{
		$result = $this->product->validate($this->input->post());
		if($result == "valid") 
		{
			$cart = array(
				'product_id' => $id,
				'quantity' => $this->input->post('quantity'),
				'created_at' => date("Y-m-d, H:i:s")
			);
			$this->security->xss_clean($cart);
			$this->product->add_to_cart($cart);
			$this->session->set_flashdata('status', "Added to Cart!");
		} 
		else 
		{
			$this->session->set_flashdata('status', validation_errors());
		}
		redirect('/products');
	}
	public function delete($id)
	{
		$this->product->delete_item_by_id($id);
		redirect('/products/cart');
	}
	public function billing()
	{
		$result = $this->product->validate($this->input->post());
		if($result == "valid") 
		{
			$bill = array(
				'name' => $this->input->post('name'),
				'address' => $this->input->post('address'),
				'card' => $this->input->post('card'),
				'amount' => $this->input->post('amount'),
				'created_at' => date("Y-m-d, H:i:s")
				);
			$this->security->xss_clean($bill);
			$this->product->cart_bill($bill);
			$this->product->delete_all_cart();
			echo "Bill Created! Redirecting to home...";
			header("Refresh:3; url=/products");
		}
		else
		{	
			$this->session->set_flashdata('status', validation_errors());
			redirect('/products/cart');
		}
	}
}