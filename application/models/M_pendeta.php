<?php
class M_pendeta extends CI_Model
{

	function get_all_pendeta()
	{
		$hsl = $this->db->query("SELECT * FROM tbl_guru");
		return $hsl;
	}

	function simpan_pendeta($nip, $nama, $jenkel, $tmp_lahir, $tgl_lahir, $mapel, $photo)
	{
		$hsl = $this->db->query("INSERT INTO tbl_guru (guru_nip,guru_nama,guru_jenkel,guru_tmp_lahir,guru_tgl_lahir,guru_mapel,guru_photo) VALUES ('$nip','$nama','$jenkel','$tmp_lahir','$tgl_lahir','$mapel','$photo')");
		return $hsl;
	}
	function simpan_pendeta_tanpa_img($nip, $nama, $jenkel, $tmp_lahir, $tgl_lahir, $mapel)
	{
		$hsl = $this->db->query("INSERT INTO tbl_guru (guru_nip,guru_nama,guru_jenkel,guru_tmp_lahir,guru_tgl_lahir,guru_mapel) VALUES ('$nip','$nama','$jenkel','$tmp_lahir','$tgl_lahir','$mapel')");
		return $hsl;
	}

	function update_pendeta($kode, $nip, $nama, $jenkel, $tmp_lahir, $tgl_lahir, $mapel, $photo)
	{
		$hsl = $this->db->query("UPDATE tbl_guru SET guru_nip='$nip',guru_nama='$nama',guru_jenkel='$jenkel',guru_tmp_lahir='$tmp_lahir',guru_tgl_lahir='$tgl_lahir',guru_mapel='$mapel',guru_photo='$photo' WHERE guru_id='$kode'");
		return $hsl;
	}
	function update_pendeta_tanpa_img($kode, $nip, $nama, $jenkel, $tmp_lahir, $tgl_lahir, $mapel)
	{
		$hsl = $this->db->query("UPDATE tbl_guru SET guru_nip='$nip',guru_nama='$nama',guru_jenkel='$jenkel',guru_tmp_lahir='$tmp_lahir',guru_tgl_lahir='$tgl_lahir',guru_mapel='$mapel' WHERE guru_id='$kode'");
		return $hsl;
	}
	function hapus_pendeta($kode)
	{
		$hsl = $this->db->query("DELETE FROM tbl_guru WHERE guru_id='$kode'");
		return $hsl;
	}

	//front-end
	function pendeta()
	{
		$hsl = $this->db->query("SELECT * FROM tbl_guru");
		return $hsl;
	}
	function guru_perpage($offset, $limit)
	{
		$hsl = $this->db->query("SELECT * FROM tbl_guru limit $offset,$limit");
		return $hsl;
	}
}
