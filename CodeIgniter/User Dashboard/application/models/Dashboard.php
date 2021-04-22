<?php
class Dashboard extends CI_Model {
    /*  DOCU: This display all the user from the database
        then return it to the controller
        Owner: Rommel
    */
    public function display_all_user()
    {
        $query = "SELECT * FROM users";
        return $this->db->query($query)->result_array();
    }
    /*  DOCU: This validate the editing of a user profile
        then return it to the controller
        Owner: Rommel
    */
    public function validate_edit_profile($data) 
    {
        $this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
        $this->form_validation->set_rules("first_name", "First Name", "trim|required");
        $this->form_validation->set_rules("last_name", "Last Name", "trim|required");
        $email_change = $this->user->get_user_by_email($data['email']);
        if($email_change['email'] && $email_change['email'] != $data['email']) 
        {
            return 'Email already taken.';
        }
        else if(!$this->form_validation->run()) 
        {
            return validation_errors();
        }
    }
    /*  DOCU: This update the info of te user from the database
        then return it to the controller
        Owner: Rommel
    */
    public function update_info($data)
    {
        $query = "UPDATE users SET first_name = ?, last_name = ?, email = ?, updated_at = ? WHERE id = ?";
        $values = array(
            $this->security->xss_clean($data['first_name']), 
            $this->security->xss_clean($data['last_name']), 
            $this->security->xss_clean($data['email']),
            $this->security->xss_clean($data['updated_at']),
            $this->security->xss_clean($data['id']),
        );
        return $this->db->query($query, $values);
    }
    /*  DOCU: This validate the editing of the password
        then return it to the controller
        Owner: Rommel
    */
    public function validate_edit_password($data) 
    {
        $this->form_validation->set_rules("password", "Password", "required|min_length[8]");
        $this->form_validation->set_rules("confirm_password", "Confirm Password", "required|matches[password]");
        if(!$this->form_validation->run()) 
        {
            return validation_errors();
        }
    }
    /*  DOCU: This update the password from the database
        then return it to the controller
        Owner: Rommel
    */
    public function update_password($data)
    {
        $query = "UPDATE users SET password = ?, updated_at = ? WHERE id = ?";
        $values = array(
            md5($this->security->xss_clean($data['password'])), 
            $this->security->xss_clean($data['updated_at']),
            $this->security->xss_clean($data['id']),
        );
        return $this->db->query($query, $values);
    }
    /*  DOCU: This validate the description of the user
        then return it to the controller
        Owner: Rommel
    */
    public function validate_edit_description() 
    {
        $this->form_validation->set_rules("description", "Description", "required");
        if(!$this->form_validation->run()) 
        {
            return validation_errors();
        }
    }
    /*  DOCU: This update the description of the user from the database
        then return it to the controller
        Owner: Rommel
    */
    public function update_description($data)
    {
        $query = "UPDATE users SET description = ?, updated_at = ? WHERE id = ?";
        $values = array(
            $this->security->xss_clean($data['description']), 
            $this->security->xss_clean($data['updated_at']),
            $this->security->xss_clean($data['id']),
        );
        return $this->db->query($query, $values);
    }
}
?>