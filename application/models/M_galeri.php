<?php
class M_galeri extends CI_Model
{

	function get_all_galeri()
	{
		$hsl = $this->db->query("SELECT tbl_galeri.*,DATE_FORMAT(galeri_tanggal,'%d/%m/%Y') AS tanggal,album_nama FROM tbl_galeri join tbl_album on galeri_album_id=album_id ORDER BY galeri_id DESC");
		return $hsl;
	}

	public function get_all_galerialbum()
	{
		$this->db->select('g.*, a.album_nama');
		$this->db->from('tbl_galeri g');
		$this->db->join('tbl_album a', 'g.galeri_album_id = a.album_id');
		$query = $this->db->get();
		return $query->result();
	}

	public function get_all_album()
	{
		$query = $this->db->get('tbl_album');
		return $query->result();
	}

	public function get_galeri_by_album($album_id)
	{
		$this->db->select('g.*, a.album_nama');
		$this->db->from('galeri g');
		$this->db->join('album a', 'g.galeri_album_id = a.album_id');
		$this->db->where('g.galeri_album_id', $album_id);
		$query = $this->db->get();
		return $query->result();
	}

	public function get_galeri_by_name($galeri_nama)
	{
		$this->db->select('g.*, a.album_nama');
		$this->db->from('galeri g');
		$this->db->join('album a', 'g.galeri_album_id = a.album_id');
		$this->db->like('g.galeri_nama', $galeri_nama);
		$query = $this->db->get();
		return $query->result();
	}
	function simpan_galeri($judul, $album, $user_id, $user_nama, $gambar)
	{
		$this->db->trans_start();
		$this->db->query("insert into tbl_galeri(galeri_judul,galeri_album_id,galeri_pengguna_id,galeri_author,galeri_gambar) values ('$judul','$album','$user_id','$user_nama','$gambar')");
		$this->db->query("update tbl_album set album_count=album_count+1 where album_id='$album'");
		$this->db->trans_complete();
		if ($this->db->trans_status() == true)
			return true;
		else
			return false;
	}

	function update_galeri($galeri_id, $judul, $album, $user_id, $user_nama, $gambar)
	{
		$hsl = $this->db->query("update tbl_galeri set galeri_judul='$judul',galeri_album_id='$album',galeri_pengguna_id='$user_id',galeri_author='$user_nama',galeri_gambar='$gambar' where galeri_id='$galeri_id'");
		return $hsl;
	}
	function update_galeri_tanpa_img($galeri_id, $judul, $album, $user_id, $user_nama)
	{
		$hsl = $this->db->query("update tbl_galeri set galeri_judul='$judul',galeri_album_id='$album',galeri_pengguna_id='$user_id',galeri_author='$user_nama' where galeri_id='$galeri_id'");
		return $hsl;
	}
	function hapus_galeri($kode, $album)
	{
		$this->db->trans_start();
		$this->db->query("delete from tbl_galeri where galeri_id='$kode'");
		$this->db->query("update tbl_album set album_count=album_count-1 where album_id='$album'");
		$this->db->trans_complete();
		if ($this->db->trans_status() == true)
			return true;
		else
			return false;
	}

	//Front-End
	function get_galeri_home()
	{
		$hsl = $this->db->query("SELECT tbl_galeri.*,DATE_FORMAT(galeri_tanggal,'%d/%m/%Y') AS tanggal,album_nama FROM tbl_galeri join tbl_album on galeri_album_id=album_id ORDER BY galeri_id DESC limit 4");
		return $hsl;
	}

	function get_galeri_by_album_id($idalbum)
	{
		$hsl = $this->db->query("SELECT tbl_galeri.*,DATE_FORMAT(galeri_tanggal,'%d/%m/%Y') AS tanggal,album_nama FROM tbl_galeri join tbl_album on galeri_album_id=album_id where galeri_album_id='$idalbum' ORDER BY galeri_id DESC");
		return $hsl;
	}
}
