<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_user extends CI_Model
{

    public function get_user_by_email($email, $password)
    {
        // Query untuk mencari user berdasarkan email dan password
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        $query = $this->db->get('tbl_jemaat');

        if ($query->num_rows() > 0) {
            return $query->row();
        } else {
            return false;
        }
    }


    public function get_all_users()
    {
        return $this->db->get('tbl_jemaat')->result();
    }

    public function get_user_by_id($id)
    {
        return $this->db->get_where('tbl_jemaat', ['jemaat_id' => $id])->row();
    }
    public function update_jemaat($kode, $no_kk, $nama, $jenkel, $tgl_lhr, $photo, $hp, $mail, $alamat, $password)
    {
        $data = [
            'no_kk' => $no_kk,
            'nama' => $nama,
            'jenis_kelamin' => $jenkel,
            'tempat_lahir' => $tgl_lhr,
            'photo' => $photo,
            'hp' => $hp,
            'email' => $mail,
            'alamat' => $alamat,
            'password' => $password
        ];

        $this->db->where('jemaat_id', $kode);
        return $this->db->update('tbl_jemaat', $data);
    }

    public function update_jemaat_tanpa_img($kode, $no_kk, $nama, $jenkel, $tgl_lhr, $hp, $mail, $alamat, $password)
    {
        $data = [
            'no_kk' => $no_kk,
            'nama' => $nama,
            'jenis_kelamin' => $jenkel,
            'tempat_lahir' => $tgl_lhr,
            'hp' => $hp,
            'email' => $mail,
            'alamat' => $alamat,
            'password' => $password
        ];

        $this->db->where('jemaat_id', $kode);
        return $this->db->update('tbl_jemaat', $data);
    }
    public function update_user($id, $data)
    {
        $this->db->where('jemaat_id', $id);
        return $this->db->update('tbl_jemaat', $data);
    }
}
