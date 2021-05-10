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
        return $this->db->query($query)->result_array();
    }
    /* 
    Get all the leads from the beginning.
    This is used when there is no date settings on the form (date from to date to)
    With limit set 10
    */
    function get_all_leads_limit($limit)
    {
        $query = "SELECT
                    leads_id,
                    first_name,
                    last_name,
                    registered_datetime,
                    email
                FROM leads
                ORDER BY leads.leads_id
                LIMIT ?, 10";
        $limit = intval($limit-1);
        $values = array(10*$limit);
        return $this->db->query($query, $values)->result_array();
    }
    /* 
    Get the leads with search funtion, filtered with name and
    date from to date to.
    */
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
                ORDER BY leads_id";
        $values = array(
            $this->security->xss_clean($data['name'].'%'),
            $this->security->xss_clean($data['name'].'%'), 
            $this->security->xss_clean($data['date_from']), 
            $this->security->xss_clean($data['date_to'])
        );
        return $this->db->query($query, $values)->result_array();
    }
    /* 
    Get the leads with search funtion, filtered with name and
    date from to date to.
    With limit set to 10
    */
    function search_data_limit($data)
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
                LIMIT ?, 10";
        $limit = (intval($data['limit'])-1);
        $values = array(
            $this->security->xss_clean($data['name'].'%'),
            $this->security->xss_clean($data['name'].'%'), 
            $this->security->xss_clean($data['date_from']), 
            $this->security->xss_clean($data['date_to']),
            10*$limit
        );
        return $this->db->query($query, $values)->result_array();
    }
}



?>