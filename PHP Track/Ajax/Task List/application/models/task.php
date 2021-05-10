<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Task extends CI_Model {
    public function all()
    {
        return $this->db->query("SELECT * FROM tasks")->result_array();
    }
    public function create($new_task)
    {
        $query = "INSERT INTO tasks (name, created_at) VALUES (?, now())";
        $values = array($new_task['name']);
        return $this->db->query($query, $values);
    }
    public function update($update_task)
    {
        $query = "UPDATE tasks SET name = ?, updated_at = NOW()
        WHERE id = ?";
        $values = array($update_task['name'], $update_task['id']);
        $this->db->query($query, $values);
    }
}
