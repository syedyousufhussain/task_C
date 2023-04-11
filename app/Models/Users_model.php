<?php

namespace App\Models;

class Users_model extends CI_Model {

    public function get_users() {
        $query = $this->db->get('users');
        return $query->result_array();
    }

    public function add_user() {
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email'),
            'created_at' => date('Y-m-d H:i:s')
        );
        $this->db->insert('users', $data);
    }

    public function edit_user() {
        $data = array(
            'name' => $this->input->post('name'),
            'email' => $this->input->post('email')
        );
        $this->db->where('id', $this->input->post('id'));
        $this->db->update('users', $data);
    }

    public function delete_user() {
        $this->db->where('id', $this->input->post('id'));
        $this->db->delete('users');
    }
}