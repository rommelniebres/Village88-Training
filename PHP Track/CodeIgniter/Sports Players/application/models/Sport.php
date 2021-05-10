<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Sport extends CI_Model {
    /* 
    Get all the athlete on the database.
    */
	public function get_all_athlete()
	{
        return $this->db->query("SELECT picture, name FROM sport;")->result_array();
	}
    /*
    Search athlete based on name, gender and sports. 
    */
    public function search_athlete($data)
	{
        if($data['gender'])
        {
            $data['gender'] = implode(", ", $data['gender']);
        }
        if($data['sport'])
        {
            $data['sport'] = implode(", ", $data['sport']);
        }
        $query = "SELECT * 
                    FROM sport 
                    WHERE name
                        LIKE ?
                        AND
                        gender IN (?)
                        AND
                        sport IN (?)";
        return $this->db->query($query, array($data['name'], $data['gender'], $data['sport']))->result_array();
	}
    /* 
    This validates the athletes settings from the form whether it is valid and filled in every field.
    */
    public function validate($data) {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("name", "Name", "required");
        $this->form_validation->set_rules("gender[]", "Gender", "required");
        $this->form_validation->set_rules("sport[]", "Sport", "required");
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