<?php
class M_pengumuman extends CI_Model
{
	function get_all_pengumuman()
	{
		return $this->db->get('tbl_pengumuman');
	}

	function simpan_pengumuman($judul, $deskripsi, $tanggal, $gambar)
	{
		$data = array(
			'pengumuman_judul' => $judul,
			'pengumuman_deskripsi' => $deskripsi,
			'pengumuman_gambar' => $gambar,
			'pengumuman_author' => $this->session->userdata('admin_name'),
			'pengumuman_tanggal' => $tanggal
		);
		$this->db->insert('tbl_pengumuman', $data);
	}

	function update_pengumuman($kode, $judul, $deskripsi, $tanggal, $gambar = null)
	{
		$data = array(
			'pengumuman_judul' => $judul,
			'pengumuman_deskripsi' => $deskripsi,
			'pengumuman_tanggal' => $tanggal
		);

		if ($gambar != null) {
			$data['pengumuman_gambar'] = $gambar;
		}

		$this->db->where('pengumuman_id', $kode);
		$this->db->update('tbl_pengumuman', $data);
	}

	function hapus_pengumuman($kode)
	{
		$this->db->where('pengumuman_id', $kode);
		$this->db->delete('tbl_pengumuman');
	}

	function get_pengumuman_by_id($id)
	{
		return $this->db->get_where('tbl_pengumuman', array('pengumuman_id' => $id))->row();
	}
	function pengumuman()
	{
		$hsl = $this->db->query("SELECT pengumuman_id,pengumuman_judul,pengumuman_deskripsi,DATE_FORMAT(pengumuman_tanggal,'%d/%m/%Y') AS tanggal,pengumuman_author FROM tbl_pengumuman ORDER BY pengumuman_id DESC");
		return $hsl;
	}
	function pengumuman_perpage($offset, $limit)
	{
		$hsl = $this->db->query("SELECT pengumuman_id,pengumuman_judul,pengumuman_deskripsi,pengumuman_tanggal,DATE_FORMAT(pengumuman_tanggal,'%d/%m/%Y') AS tanggal,pengumuman_author FROM tbl_pengumuman ORDER BY pengumuman_id DESC limit $offset,$limit");
		return $hsl;
	}
	// baru

	public function get_next_announcement()
	{
		$now = date('Y-m-d H:i:s');
		$this->db->select('*');
		$this->db->from('tbl_pengumuman');
		$this->db->where('pengumuman_tanggal >', $now);
		$this->db->order_by('pengumuman_tanggal', 'asc');
		$this->db->limit(1);
		$query = $this->db->get();
		return $query->row();
	}
}
