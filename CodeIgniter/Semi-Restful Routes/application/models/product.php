<?php
class Product extends CI_Model {
    function get_all_products()
    {
        return $this->db->select("*")->from('product')->order_by('id', 'desc')->get()->result_array();
    }
    function add_product($product)
    {
        $query = "INSERT INTO product (name, description, price, created_at) VALUES (?,?,?,?)";
        $values = array($product['name'], $product['description'], $product['price'], date("Y-m-d, H:i:s"));
        return $this->db->query($query, $values);
    }
    function get_product_by_id($product_id)
    {
        return $this->db->query("SELECT * FROM product WHERE id = ?", array($product_id))->row_array();
    }
    function update_product_by_id($data)
    {
        extract($data);
        $this->db->where('id', $id);
        return  $this->db->update($table_name, array('name' => $name, 'description' => $description, 'price' => $price, 'updated_at' => $updated_at));
    }
    function delete_product_by_id($id)
    {
        return $this->db->query("DELETE FROM product WHERE id = ?", array($id));
    }
}



?>