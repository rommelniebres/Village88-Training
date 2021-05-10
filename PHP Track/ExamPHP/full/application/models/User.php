<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Model {
    /*  DOCU: This function gets all the user from the database
        OWNER: Rommel
    */
	function get_all_user()
    {
        $query = "SELECT * FROM users ORDER BY users.id";
        return $this->db->query($query)->result_array();
    }
    /*  DOCU: This function gets the user from the database
        based on filtered search
        NOTE: I did it with gender being an array (M, F)
        but it seems the query make this one string('M, F')
        even tough i imploded it, will revised if I have 
        extra time
        OWNER: Rommel
    */
    public function search_user($data)
	{
        if($data['country'] == 'all')
        {
            $data['country'] = "";
        }
        $query = "SELECT * 
                    FROM users 
                    WHERE
                        gender IN (?, ?)
                        AND
                        country LIKE (?)";
        return $this->db->query($query, array(($data['male']), ($data['female']),
        "%".$data['country']))->result_array();
	}
}