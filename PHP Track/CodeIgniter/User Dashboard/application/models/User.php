<?php
class User extends CI_Model {
    /*  DOCU: This get all the user from the database then
        return it on the controller
        Owner: Rommel
    */
    public function get_all_user()
    {
        $query = "SELECT * FROM users";
        return $this->db->query($query)->result_array();
    }
    /*  DOCU: This get a single user by a given id from the database 
        then return it on the controller
        Owner: Rommel
    */
    public function get_user_by_id($id) 
    {
        $query = "SELECT * FROM users WHERE id=?";
        return $this->db->query($query, $this->security->xss_clean($id))->row_array();
    }
    /*  DOCU: This get a single user by a given email from the database 
        then return it on the controller
        Owner: Rommel
    */
    public function get_user_by_email($email) 
    {
        $query = "SELECT * FROM users WHERE email=?";
        return $this->db->query($query, $this->security->xss_clean($email))->row_array();
    }
    /*  DOCU: This validates the register data from the controller
        Owner: Rommel
    */
    public function validate_register($data) 
    {
        $this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
        $this->form_validation->set_rules("first_name", "First Name", "trim|required");
        $this->form_validation->set_rules("last_name", "Last Name", "trim|required");
        $this->form_validation->set_rules("password", "Password", "required|min_length[8]");
        $this->form_validation->set_rules("confirm_password", "Confirm Password", "required|matches[password]");
        if($this->get_user_by_email($data['email'])) 
        {
            return 'Email already taken.';
        }
        else if(!$this->form_validation->run()) 
        {
            return validation_errors();
        }
    }
    /*  DOCU: This validates the sign in data from the controller
        Owner: Rommel
    */
    public function validate_sign_in($data) {
        $this->form_validation->set_rules('email', 'Email', 'required');
        $this->form_validation->set_rules('password', 'Password', 'required');
    
        if(!$this->form_validation->run()) {
            return validation_errors();
        } 
        else {
            return "success";
        }
    }
    /*  DOCU: This validates the sign in data whether it is match from the
        database
        Owner: Rommel
    */
    public function validate_sign_in_match($user, $password) 
    {
        $encrypted_password = md5($this->security->xss_clean($password));
        if($user && $user['password'] == $encrypted_password) {
            return "success";
        }
        else {
            return "Incorrect email/password.";
        }
    }
    /*  DOCU: This add the user to the database, if this is the first user
        the admin level will be '9' otherwise '0'.
        Owner: Rommel
    */
    public function add_user($data) 
    {
        if($this->get_all_user())
        {
            $data['user_level'] = '0';
        }
        else
        {
            $data['user_level'] = '9';
        }
        $query = "INSERT INTO users (first_name, last_name, email, password, user_level, created_at) 
                    VALUES (?,?,?,?,?,?)";
        $values = array(
            $this->security->xss_clean($data['first_name']), 
            $this->security->xss_clean($data['last_name']), 
            $this->security->xss_clean($data['email']), 
            md5($this->security->xss_clean($data['password'])), 
            $this->security->xss_clean($data['user_level']), 
            $this->security->xss_clean($data['created_at'])
        ); 
        return $this->db->query($query, $values);
    }
    /*  DOCU: This validates the editing of info whether the email 
        is available or not
        Owner: Rommel
    */
    public function validate_edit_info($data, $id) 
    {
        $this->form_validation->set_rules("email", "Email", "trim|required|valid_email");
        $this->form_validation->set_rules("first_name", "First Name", "trim|required");
        $this->form_validation->set_rules("last_name", "Last Name", "trim|required");
        $this->form_validation->set_rules("user_level", "User Level", "trim|required");
        $email_change = $this->get_user_by_email($data['email']);
        $current_email = $this->get_user_by_id($id);
        if($email_change['email'] && $email_change['email'] == $data['email'] && 
            $data['email'] !=  $current_email['email']) 
        {
            return 'Email already taken.';
        }
        else if(!$this->form_validation->run()) 
        {
            return validation_errors();
        }
    }
    /*  DOCU: This edit the user information from the database
        Owner: Rommel
    */
    public function edit_user_info($data)
    {
        if($data['user_level'] == 'normal')
        {
            $data['user_level'] = '0';
        }
        else
        {
            $data['user_level'] = '9';
        }
        $query = "UPDATE users SET first_name = ?, last_name = ?, email = ?, user_level = ?, updated_at = ? 
                    WHERE id = ?";
        $values = array(
            $this->security->xss_clean($data['first_name']), 
            $this->security->xss_clean($data['last_name']), 
            $this->security->xss_clean($data['email']),
            $this->security->xss_clean($data['user_level']), 
            $this->security->xss_clean($data['updated_at']),
            $this->security->xss_clean($data['id']),
        );
        return $this->db->query($query, $values);
    }
    /*  DOCU: This validate the updating of password
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
    /*  DOCU: This update the user password
        Owner: Rommel
    */
    public function edit_user_password($data)
    {
        $query = "UPDATE users SET password = ?, updated_at = ? WHERE id = ?";
        $values = array(
            md5($this->security->xss_clean($data['password'])), 
            $this->security->xss_clean($data['updated_at']),
            $this->security->xss_clean($data['id']),
        );
        return $this->db->query($query, $values);
    }
    /*  DOCU: This delete the user by id
        Owner: Rommel
    */
    public function delete_user_by_id($id)
    {
        $query = "DELETE FROM users WHERE id = ?";
        $values = $this->security->xss_clean($id);
        return $this->db->query($query, $values);
    }
}
?>