<?php
class Product extends CI_Model {
    function get_all_products()
    {
        return $this->db->select("*")->from('products')->order_by('price', 'asc')->get()->result_array();
    }
    function add_to_cart($cart)
    {
        $query = "INSERT INTO cart (product_id, quantity,created_at) VALUES (?,?,?)";
        $values = array($cart['product_id'], $cart['quantity'], $cart['created_at']);
        return $this->db->query($query, $values);
    }
    function cart_bill($bill)
    {
        $query = "INSERT INTO billing (name, address, card, amount, created_at) VALUES (?,?,?,?,?)";
        $values = array($bill['name'], $bill['address'], $bill['card'], $bill['amount'], $bill['created_at']);
        return $this->db->query($query, $values);
    }
    function get_cart()
    {
        return $this->db->query(
                            "SELECT
                                cart.id,  
                                products.id AS product_id, 
                                cart.quantity, 
                                products.description, 
                                products.price 
                            FROM cart 
                            LEFT JOIN 
                                products 
                                ON 
                                products.id = cart.product_id"
                            )->result_array();
    }
    function delete_item_by_id($id)
    {
        return $this->db->query("DELETE FROM cart WHERE id = ?", array($id));
    }
    function delete_all_cart()
    {
        $this->db->query("DELETE FROM cart");
    }
    function count_cart()
    {
        return $this->db->query("SELECT * FROM cart;");
    }
    public function validate($post) {
        $this->load->library("form_validation");
        if($this->router->method == "add")
        {
            $this->form_validation->set_rules("quantity", "Quantity", "required|greater_than[0]");

        }
        else{
            $this->form_validation->set_rules("name", "Name", "required");
            $this->form_validation->set_rules("address", "Address", "required");
            $this->form_validation->set_rules("card", "Card", "required|numeric");
        }
        if($this->form_validation->run()) 
        {
            return "valid";
        } 
        else 
        {
            return (validation_errors());
        }
    }
}
?>