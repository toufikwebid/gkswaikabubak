<?php
class M_tulisan extends CI_Model
{

	function get_all_tulisan()
	{
		$hsl = $this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan ORDER BY tulisan_id DESC");
		return $hsl;
	}
	function simpan_tulisan($judul, $isi, $kategori_id, $kategori_nama, $imgslider, $user_id, $user_nama, $gambar, $slug)
	{
		$hsl = $this->db->query("insert into tbl_tulisan(tulisan_judul,tulisan_isi,tulisan_kategori_id,tulisan_kategori_nama,tulisan_img_slider,tulisan_pengguna_id,tulisan_author,tulisan_gambar,tulisan_slug) values ('$judul','$isi','$kategori_id','$kategori_nama','$imgslider','$user_id','$user_nama','$gambar','$slug')");
		return $hsl;
	}
	function get_tulisan_by_kode($kode)
	{
		$hsl = $this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan where tulisan_id='$kode'");
		return $hsl;
	}
	function update_tulisan($tulisan_id, $judul, $isi, $kategori_id, $kategori_nama, $imgslider, $user_id, $user_nama, $gambar, $slug)
	{
		$hsl = $this->db->query("update tbl_tulisan set tulisan_judul='$judul',tulisan_isi='$isi',tulisan_kategori_id='$kategori_id',tulisan_kategori_nama='$kategori_nama',tulisan_img_slider='$imgslider',tulisan_pengguna_id='$user_id',tulisan_author='$user_nama',tulisan_gambar='$gambar',tulisan_slug='$slug' where tulisan_id='$tulisan_id'");
		return $hsl;
	}
	function update_tulisan_tanpa_img($tulisan_id, $judul, $isi, $kategori_id, $kategori_nama, $imgslider, $user_id, $user_nama, $slug)
	{
		$hsl = $this->db->query("update tbl_tulisan set tulisan_judul='$judul',tulisan_isi='$isi',tulisan_kategori_id='$kategori_id',tulisan_kategori_nama='$kategori_nama',tulisan_img_slider='$imgslider',tulisan_pengguna_id='$user_id',tulisan_author='$user_nama',tulisan_slug='$slug' where tulisan_id='$tulisan_id'");
		return $hsl;
	}
	function hapus_tulisan($kode)
	{
		$hsl = $this->db->query("delete from tbl_tulisan where tulisan_id='$kode'");
		return $hsl;
	}

	//Front-End
	function get_berita_slider()
	{
		$hsl = $this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan where tulisan_img_slider='1' ORDER BY tulisan_id DESC");
		return $hsl;
	}
	function get_berita_home()
	{
		$hsl = $this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan ORDER BY tulisan_id DESC limit 3");
		return $hsl;
	}

	function berita_perpage($offset, $limit)
	{
		$hsl = $this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan ORDER BY tulisan_id DESC limit $offset,$limit");
		return $hsl;
	}

	function berita()
	{
		$hsl = $this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan ORDER BY tulisan_id DESC");
		return $hsl;
	}
	function get_berita_by_kode($kode)
	{
		$hsl = $this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan where tulisan_id='$kode'");
		return $hsl;
	}

	// function cari_berita($keyword)
	// {
	// 	$hsl = $this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan WHERE tulisan_judul LIKE '%$keyword%' LIMIT 5");
	// 	return $hsl;
	// }


	// baru

	function get_recent_posts()
	{
		$this->db->select('*');
		$this->db->from('tbl_tulisan');
		$this->db->order_by('tulisan_tanggal', 'desc');
		$this->db->limit(5); // Jumlah berita terbaru yang ditampilkan
		return $this->db->get()->result();
	}

	function get_archive_posts_by_month_year($month_year)
	{
		// Gunakan query langsung
		$query = $this->db->query("SELECT * FROM `tbl_tulisan` WHERE DATE_FORMAT(tulisan_tanggal, '%M %Y') = ? ORDER BY `tulisan_tanggal` DESC", array($month_year));
		return $query->result();
	}

	function get_archive_posts()
	{
		$this->db->select("DATE_FORMAT(tulisan_tanggal, '%M %Y') as month_year, COUNT(*) as count");
		$this->db->from('tbl_tulisan');
		$this->db->group_by("DATE_FORMAT(tulisan_tanggal, '%Y-%m')");
		$this->db->order_by('tulisan_tanggal', 'desc');
		$this->db->limit(12); // Maksimal 12 bulan terakhir 
		return $this->db->get()->result();
	}


	function show_komentar_by_tulisan_id($kode)
	{
		$this->db->where('komentar_tulisan_id', $kode);
		$this->db->where('komentar_status', 1);
		return $this->db->get('tbl_komentar');
	}
	function cari_berita($keyword)
	{
		$this->db->like('tulisan_judul', $keyword);
		$this->db->or_like('tulisan_isi', $keyword);
		return $this->db->get('tbl_tulisan');
	}
}
