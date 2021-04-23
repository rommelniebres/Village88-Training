<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Note extends CI_Model {
    /*
        DOCU: This gets all the notes from the db
        OWNER: Rommel
    */
    public function all()
    {
        return $this->db->query("SELECT * FROM note")->result_array();
    }
    /*
        DOCU: This inserts a new note to the db
        OWNER: Rommel
    */
    public function create($new_note)
    {
        $query = "INSERT INTO note (title, description, created_at) VALUES (?, ?, now())";
        $values = array($new_note['title'], $new_note['description']);
        return $this->db->query($query, $values);
    }
    /*
        DOCU: This deletes a note from the db
        OWNER: Rommel
    */
    public function delete($delete_note)
    {
        $query = "DELETE FROM note WHERE id = ?";
        $values = array($delete_note['id']);
        $this->db->query($query, $values);
    }
    /*
        DOCU: This updates a note from the db
        OWNER: Rommel
    */
    public function update($update_note)
    {
        $query = "UPDATE note SET description = ?, updated_at = NOW()
        WHERE id = ?";
        $values = array($update_note['description'], $update_note['id']);
        $this->db->query($query, $values);
    }
}
