<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Quote extends CI_Model {
    public function all()
    {
        return $this->db->query("SELECT * FROM quotes")->result_array();
    }
    public function create($new_quote)
    {
        $query = "INSERT INTO quotes (author, quote) VALUES (?, ?)";
        $values = array($new_quote['author'], $new_quote['quote']);
        return $this->db->query($query, $values);
    }
}
