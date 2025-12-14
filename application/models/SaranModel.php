<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class SaranModel extends CI_Model {

    public function save($data) {
        return $this->db->insert('tb_saran', $data);
    }
    public function get_all() {
        return $this->db->get('tb_saran')->result();
    }
    public function delete($id) {
        $this->db->where('id', $id);
        return $this->db->delete('tb_saran');
    }
        
}
?>
