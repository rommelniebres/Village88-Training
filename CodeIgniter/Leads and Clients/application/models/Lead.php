<?php
class Lead extends CI_Model {
    /* 
    Get all the leads from the beginning.
    This is used when there is no date settings on the form (date from to date to)
    */
    function get_all_leads()
    {
        $query = "SELECT 
                    CONCAT(clients.first_name , ' ', clients.last_name) AS client_name,
                    COUNT(leads.leads_id) AS number_of_leads
                FROM clients
                LEFT JOIN sites 
                    ON clients.client_id = sites.client_id
                LEFT JOIN leads 
                    ON sites.site_id = leads.site_id 
                GROUP BY clients.client_id
                ORDER BY clients.client_id, sites.site_id";
        return $this->db->query($query)->result_array();
    }
    /* 
    Get all the leads based on the date form settings (date from to date to).
    */
    function get_all_leads_by_date($date)
    {
        $query = "SELECT 
                    CONCAT(clients.first_name , ' ', clients.last_name) AS client_name,
                    COUNT(leads.leads_id) AS number_of_leads
                FROM clients
                LEFT JOIN sites 
                    ON clients.client_id = sites.client_id
                LEFT JOIN leads 
                    ON sites.site_id = leads.site_id 
                WHERE
                    DATE(leads.registered_datetime) >= ?
                    AND 
                    DATE(leads.registered_datetime) <= ?  
                GROUP BY clients.client_id
                ORDER BY clients.client_id, sites.site_id";
        return $this->db->query($query, array($date['date_from'], $date['date_to']))->result_array();
    }
    /* 
    This validates the date settings from the form whether it is valid and filled in every field.
    */
    public function validate($date) {
        $this->load->library("form_validation");
        $this->form_validation->set_rules("date_from", "Date From", "required");
        $this->form_validation->set_rules("date_to", "Date To", "required");
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