<?php
class M_jemaat extends CI_Model
{
	public function get_all_jemaat()
	{
		return $this->db->get('tbl_jemaat')->result();
	}
	public function get_all_jemaatbaru()
	{
		$query = $this->db->get('tbl_jemaat');
		return $query->result_array();
	}
	function get_jemaat_by_kk($no_kk)
	{
		$this->db->where('no_kk', $no_kk);
		return $this->db->get('tbl_jemaat');
	}

	public function get_jemaat_by_no_kk()
	{
		$this->db->select('no_kk, nama_kepala_keluarga, COUNT(*) as jumlah_jemaat');
		$this->db->from('tbl_jemaat');
		$this->db->group_by('no_kk');
		return $this->db->get()->result();
	}
	public function get_gambar_by_no_kk($no_kk)
	{
		$this->db->select('photo'); // Sesuaikan dengan nama kolom gambar di database Anda
		$this->db->from('tbl_jemaat'); // Sesuaikan dengan nama tabel gambar di database Anda
		$this->db->where('no_kk', $no_kk);
		return $this->db->get()->result();
	}

	public function get_gambar_by_id($id)
	{
		$this->db->select('photo'); // Sesuaikan dengan nama kolom gambar di database Anda
		$this->db->from('tbl_jemaat'); // Sesuaikan dengan nama tabel gambar di database Anda
		$this->db->where('jemaat_id', $id);
		return $this->db->get()->result();
	}


	public function hapus_jemaat_by_no_kk($no_kk)
	{
		$this->db->where('no_kk', $no_kk);
		$this->db->delete('tbl_jemaat'); // Sesuaikan dengan nama tabel jemaat di database Anda
	}

	public function get_jemaat_by_no_kk_detail($no_kk)
	{
		return $this->db->get_where('tbl_jemaat', ['no_kk' => $no_kk])->result();
	}

	public function get_jemaat_by_id($id)
	{
		return $this->db->get_where('tbl_jemaat', ['jemaat_id' => $id])->row();
	}


	function insert_jemaat($data)
	{
		// Serialisasi array pelayanan menjadi string JSON tanpa escape slashes
		if (isset($data['pelayanan'])) {
			$data['pelayanan'] = json_encode($data['pelayanan'], JSON_UNESCAPED_SLASHES);
		}

		$this->db->insert('tbl_jemaat', $data);
		return $this->db->insert_id();
	}


	public function update_jemaat($id, $data)
	{
		$this->db->where('jemaat_id', $id);
		return $this->db->update('tbl_jemaat', $data);
	}

	public function delete_jemaat($id)
	{
		$this->db->where('jemaat_id', $id);
		return $this->db->delete('tbl_jemaat');
	}
	// versi lama

	function get_all_jemaat_lama()
	{
		$hsl = $this->db->query("SELECT * FROM tbl_jemaat");
		return $hsl;
	}

	function simpan_jemaat($nik, $nama, $jenkel, $tgl_lhr, $photo, $hp, $mail, $alamat, $password)
	{
		$hsl = $this->db->query("INSERT INTO tbl_jemaat (jemaat_nik,jemaat_nama,jemaat_jenkel, jemaat_tgllhr, jemaat_photo, jemaat_hp, jemaat_mail, jemaat_alamat, jemaat_password) VALUES ('$nik','$nama','$jenkel','$tgl_lhr','$photo','$hp','$mail','$alamat', '$password')");
		return $hsl;
	}
	function simpan_jemaat_tanpa_img($nik, $nama, $jenkel, $tgl_lhr, $hp, $mail, $alamat, $password)
	{
		$hsl = $this->db->query("INSERT INTO tbl_jemaat (jemaat_nik,jemaat_nama,jemaat_jenkel,jemaat_tgllhr,jemaat_hp, jemaat_mail, jemaat_alamat, jemaat_password) VALUES ('$nik','$nama','$jenkel','$tgl_lhr','$hp','$mail','$alamat', '$password')");
		return $hsl;
	}

	// function update_jemaat($kode, $nik, $nama, $jenkel, $tgl_lhr, $photo, $hp, $mail, $alamat, $password)
	// {
	// 	$hsl = $this->db->query("UPDATE tbl_jemaat SET jemaat_nik='$nik',jemaat_nama='$nama',jemaat_jenkel='$jenkel',jemaat_tgllhr='$tgl_lhr',jemaat_photo='$photo',jemaat_hp='$hp',jemaat_mail='$mail',jemaat_alamat='$alamat', jemaat_password ='$password'    WHERE jemaat_id='$kode'");
	// 	return $hsl;
	// }
	function update_jemaat_tanpa_img($kode, $nik, $nama, $jenkel, $tgl_lhr, $hp, $mail, $alamat, $password)
	{
		$hsl = $this->db->query("UPDATE tbl_jemaat SET jemaat_nik='$nik',jemaat_nama='$nama',jemaat_jenkel='$jenkel',jemaat_tgllhr='$tgl_lhr',jemaat_hp='$hp',jemaat_mail='$mail',jemaat_alamat='$alamat', jemaat_password ='$password'    WHERE jemaat_id='$kode'");
		return $hsl;
	}
	function hapus_jemaat($kode)
	{
		$hsl = $this->db->query("DELETE FROM tbl_jemaat WHERE jemaat_id='$kode'");
		return $hsl;
	}

	function jemaat()
	{
		$hsl = $this->db->query("SELECT * FROM tbl_jemaat");
		return $hsl;
	}
	function jemaat_perpage($offset, $limit)
	{
		$hsl = $this->db->query("SELECT * FROM tbl_jemaat limit $offset,$limit");
		return $hsl;
	}
	// testes
	public function get_total_jemaat()
	{
		return $this->db->count_all('tbl_jemaat');
	}

	public function get_jenis_kelamin()
	{
		$this->db->select('jenis_kelamin, COUNT(*) as jumlah');
		$this->db->from('tbl_jemaat');
		$this->db->group_by('jenis_kelamin');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_statistik_umur()
	{
		$this->db->select('umur, COUNT(*) as jumlah');
		$this->db->from('tbl_jemaat');
		$this->db->group_by('umur');
		$this->db->order_by('CASE 
            WHEN umur = \'>100\' THEN 1000
            ELSE CAST(SUBSTRING_INDEX(umur, \'-\', 1) AS UNSIGNED)
        END');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_statistik_pendidikan()
	{
		$this->db->select('pendidikan_terakhir, COUNT(*) as jumlah');
		$this->db->from('tbl_jemaat');
		$this->db->group_by('pendidikan_terakhir');
		$query = $this->db->get();
		return $query->result_array();
	}

	public function get_statistik_pekerjaan()
	{
		$this->db->select('pekerjaan, COUNT(*) as jumlah');
		$this->db->from('tbl_jemaat');
		$this->db->group_by('pekerjaan');
		$query = $this->db->get();
		return $query->result_array();
	}
}
