<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {
    /*  DOCU: This get the users based on the set limit, ordered by
        the users id
        OWNER: Rommel
    */
	function get_user($limit)
    {
        $query = "SELECT * FROM users ORDER BY users.id LIMIT ?";
        $values = array(intval($limit));
        return $this->db->query($query, $values)->result_array();
    }
}