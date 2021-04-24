<?php
class Lead extends CI_Model {
    /* 
    Get all the leads from the beginning.
    This is used when there is no date settings on the form (date from to date to)
    */
    function get_all_leads()
    {
        $query = "SELECT
                    leads_id,
                    first_name,
                    last_name,
                    registered_datetime,
                    email
                FROM leads
                ORDER BY leads.leads_id";
        return $this->db->query($query)->num_rows();
    }
    function count_search_data($data)
    {
        $query = "SELECT *
                FROM leads
                WHERE (first_name LIKE ? OR last_name LIKE ?)
                    AND 
                    DATE(registered_datetime)
                    BETWEEN ? AND ?";
        $values = array(
            $this->security->xss_clean($data['name'].'%'),
            $this->security->xss_clean($data['name'].'%'), 
            $this->security->xss_clean($data['date_from']), 
            $this->security->xss_clean($data['date_to']),
            
        );
        return $this->db->query($query, $values)->result_array();
    }
    function search_data($data)
    {
        $query = "SELECT
                    leads_id,
                    first_name,
                    last_name,
                    registered_datetime,
                    email
                FROM leads
                WHERE (first_name LIKE ? OR last_name LIKE ?)
                    AND 
                    DATE(registered_datetime)
                    BETWEEN ? AND ?
                ORDER BY leads_id
                LIMIT 5, 10";
        $values = array(
            $this->security->xss_clean($data['name'].'%'),
            $this->security->xss_clean($data['name'].'%'), 
            $this->security->xss_clean($data['date_from']), 
            $this->security->xss_clean($data['date_to'])
        );
        return $this->db->query($query, $values)->result_array();
    }
}



?>