<?php
class Blog extends CI_Controller
{
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_tulisan');
		$this->load->model('m_kategori');
		$this->load->model('m_pengunjung');
		$this->load->helper('text'); // Memuat helper text
		$this->m_pengunjung->count_visitor();
	}

	function index()
	{
		$this->data['title2'] = 'BERITA/KEGIATAN';
		$jum = $this->m_tulisan->berita();
		$page = $this->uri->segment(3);
		if (!$page):
			$offset = 0;
		else:
			$offset = $page;
		endif;
		$limit = 6;
		$config['base_url'] = base_url() . 'blog/index/';
		$config['total_rows'] = $jum->num_rows();
		$config['per_page'] = $limit;
		$config['uri_segment'] = 3;
		// Tambahan untuk styling
		$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
		$config['full_tag_close']   = '</ul></nav></div>';
		$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['num_tag_close']    = '</span></li>';
		$config['cur_tag_open']     = '<li class="page-item"><span class="page-link">';
		$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
		$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
		$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['prev_tagl_close']  = '</span>Next</li>';
		$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
		$config['first_tagl_close'] = '</span></li>';
		$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
		$config['last_tagl_close']  = '</span></li>';
		$config['first_link'] = 'Awal';
		$config['last_link'] = 'Akhir';
		$config['next_link'] = 'Next >>';
		$config['prev_link'] = '<< Prev';
		$this->pagination->initialize($config);

		$this->data['page'] = $this->pagination->create_links();
		$this->data['data'] = $this->m_tulisan->berita_perpage($offset, $limit);
		$this->data['category'] = $this->db->get('tbl_kategori');
		$this->data['populer'] = $this->db->query("SELECT * FROM tbl_tulisan ORDER BY tulisan_views DESC LIMIT 6");

		$this->data['main_view']   = 'depan/v_blog';

		$this->load->view('theme/template', $this->data);
	}

	function detail($slug)
	{
		$query = $this->db->get_where('tbl_tulisan', array('tulisan_slug' => $slug));
		if ($query->num_rows() > 0) {
			$b = $query->row_array();
			$kode = $b['tulisan_id'];
			$this->db->query("UPDATE tbl_tulisan SET tulisan_views=tulisan_views+1 WHERE tulisan_id='$kode'");
			$data = $this->m_tulisan->get_berita_by_kode($kode);
			$row = $data->row_array();
			$this->data['id'] = $row['tulisan_id'];
			$this->data['title'] = $row['tulisan_judul'];
			$this->data['image'] = $row['tulisan_gambar'];
			$this->data['blog'] = $row['tulisan_isi'];
			$this->data['tanggal'] = date('d F, Y', strtotime($row['tulisan_tanggal']));
			$this->data['author'] = $row['tulisan_author'];
			$this->data['kategori'] = $row['tulisan_kategori_nama'];
			$this->data['slug'] = $row['tulisan_slug'];
			$this->data['show_komentar'] = $this->m_tulisan->show_komentar_by_tulisan_id($kode);
			$this->data['recent_posts'] = $this->m_tulisan->get_recent_posts();
			$this->data['archive_posts'] = $this->m_tulisan->get_archive_posts();
			$this->data['tags'] = $this->m_kategori->get_all_kategori()->result();
			$this->data['populer'] = $this->db->query("SELECT * FROM tbl_tulisan ORDER BY tulisan_views DESC LIMIT 5");
			$this->load->helper('text'); // Memuat helper text
			$this->data['main_view']   = 'depan/v_blog_detail';

			$this->load->view('theme/template', $this->data);
		} else {
			redirect('artikel');
		}
	}

	function kategori()
	{
		$kategori = str_replace("-", " ", $this->uri->segment(3));
		$jum = $this->db->query("SELECT tbl_tulisan.* FROM tbl_tulisan WHERE tulisan_kategori_nama LIKE '%$kategori%'");

		if ($jum->num_rows() > 0) {
			$page = $this->uri->segment(4);
			if (!$page):
				$offset = 0;
			else:
				$offset = $page;
			endif;
			$limit = 6;
			$config['base_url'] = base_url() . 'blog/kategori/' . str_replace(" ", "-", $kategori) . '/';
			$config['total_rows'] = $jum->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			// Tambahan untuk styling
			$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
			$config['full_tag_close']   = '</ul></nav></div>';
			$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
			$config['num_tag_close']    = '</span></li>';
			$config['cur_tag_open']     = '<li class="page-item"><span class="page-link">';
			$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
			$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
			$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['prev_tagl_close']  = '</span>Next</li>';
			$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
			$config['first_tagl_close'] = '</span></li>';
			$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['last_tagl_close']  = '</span></li>';
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Next >>';
			$config['prev_link'] = '<< Prev';
			$this->pagination->initialize($config);

			$this->data['page'] = $this->pagination->create_links();
			$this->data['data'] = $this->db->query("SELECT tbl_tulisan.*,DATE_FORMAT(tulisan_tanggal,'%d/%m/%Y') AS tanggal FROM tbl_tulisan WHERE tulisan_kategori_nama LIKE '%$kategori%' ORDER BY tulisan_views DESC LIMIT $offset,$limit");
			$this->data['category'] = $this->db->get('tbl_kategori');
			$this->data['populer'] = $this->db->query("SELECT * FROM tbl_tulisan ORDER BY tulisan_views DESC LIMIT 5");
			// Tambahkan data untuk breadcrumb
			$this->data['breadcrumb_title'] = 'Kategori ' . htmlspecialchars($kategori, ENT_QUOTES, 'UTF-8');
			$this->data['breadcrumb_subtitle'] = 'Kumpulan Kegiatan Gereja';
			$this->data['main_view']   = 'depan/v_blog';

			$this->load->view('theme/template', $this->data);
		} else {
			// Tambahkan data breadcrumb untuk halaman kosong
			$this->data['breadcrumb_title'] = 'Kategori Tidak Tersedia';
			$this->data['breadcrumb_subtitle'] = 'Kumpulan Kegiatan Gereja';
			echo $this->session->set_flashdata('msg', '<div class="alert alert-danger">Tidak Ada artikel untuk kategori <b>' . $kategori . '</b></div>');
			redirect('artikel');
		}
	}


	public function archive($month_year)
	{
		// Decode URL
		$month_year = urldecode($month_year);

		// Hitung jumlah total artikel untuk paginasi
		$jum = $this->db->query("SELECT * FROM tbl_tulisan WHERE DATE_FORMAT(tulisan_tanggal, '%M %Y') = ?", array($month_year));

		if ($jum->num_rows() > 0) {
			$page = $this->uri->segment(4);
			if (!$page):
				$offset = 0;
			else:
				$offset = $page;
			endif;
			$limit = 6;
			$config['base_url'] = base_url() . 'blog/archive/' . urlencode($month_year) . '/';
			$config['total_rows'] = $jum->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			// Tambahan untuk styling
			$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
			$config['full_tag_close']   = '</ul></nav></div>';
			$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
			$config['num_tag_close']    = '</span></li>';
			$config['cur_tag_open']     = '<li class="page-item"><span class="page-link">';
			$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
			$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
			$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['prev_tagl_close']  = '</span>Next</li>';
			$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
			$config['first_tagl_close'] = '</span></li>';
			$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['last_tagl_close']  = '</span></li>';
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Next >>';
			$config['prev_link'] = '<< Prev';
			$this->pagination->initialize($config);

			$this->data['page'] = $this->pagination->create_links();
			$this->data['data'] = $this->db->query("SELECT tbl_tulisan.*, DATE_FORMAT(tulisan_tanggal, '%d/%m/%Y') AS tanggal FROM tbl_tulisan WHERE DATE_FORMAT(tulisan_tanggal, '%M %Y') = ? ORDER BY tulisan_views DESC LIMIT $offset, $limit", array($month_year));
			$this->data['category'] = $this->db->get('tbl_kategori');
			$this->data['populer'] = $this->db->query("SELECT * FROM tbl_tulisan ORDER BY tulisan_views DESC LIMIT 5");

			// Tambahkan data untuk breadcrumb
			$this->data['breadcrumb_title'] = 'Arsip ' . htmlspecialchars($month_year, ENT_QUOTES, 'UTF-8');
			$this->data['breadcrumb_subtitle'] = 'Kumpulan Kegiatan Gereja';

			$this->data['main_view'] = 'depan/v_blog';

			$this->load->view('theme/template', $this->data);
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger">Tidak Ada artikel untuk bulan <b>' . htmlspecialchars($month_year, ENT_QUOTES, 'UTF-8') . '</b></div>');
			redirect('artikel');
		}
	}



	function search()
	{
		$keyword = str_replace("'", "", htmlspecialchars($this->input->get('keyword', TRUE), ENT_QUOTES));
		$jum = $this->m_tulisan->cari_berita($keyword);
		if ($jum->num_rows() > 0) {
			$page = $this->uri->segment(4);
			if (!$page):
				$offset = 0;
			else:
				$offset = $page;
			endif;
			$limit = 6;
			$config['base_url'] = base_url() . 'blog/search?keyword=' . urlencode($keyword) . '/';
			$config['total_rows'] = $jum->num_rows();
			$config['per_page'] = $limit;
			$config['uri_segment'] = 4;
			// Tambahan untuk styling
			$config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
			$config['full_tag_close']   = '</ul></nav></div>';
			$config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
			$config['num_tag_close']    = '</span></li>';
			$config['cur_tag_open']     = '<li class="page-item"><span class="page-link">';
			$config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
			$config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
			$config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['prev_tagl_close']  = '</span>Next</li>';
			$config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
			$config['first_tagl_close'] = '</span></li>';
			$config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
			$config['last_tagl_close']  = '</span></li>';
			$config['first_link'] = 'Awal';
			$config['last_link'] = 'Akhir';
			$config['next_link'] = 'Next >>';
			$config['prev_link'] = '<< Prev';
			$this->pagination->initialize($config);

			$this->data['page'] = $this->pagination->create_links();
			$this->data['data'] = $this->db->query("SELECT tbl_tulisan.*, DATE_FORMAT(tulisan_tanggal, '%d/%m/%Y') AS tanggal FROM tbl_tulisan WHERE tulisan_judul LIKE '%$keyword%'
                           OR tulisan_isi LIKE '%$keyword%' ORDER BY tulisan_views DESC LIMIT $offset, $limit", array($keyword));
			$this->data['category'] = $this->db->get('tbl_kategori');
			$this->data['populer'] = $this->db->query("SELECT * FROM tbl_tulisan ORDER BY tulisan_views DESC LIMIT 5");

			// Tambahkan data untuk breadcrumb
			$this->data['breadcrumb_title'] = 'Arsip ' . htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8');
			$this->data['breadcrumb_subtitle'] = 'Kumpulan Kegiatan Gereja';

			$this->data['main_view'] = 'depan/v_blog';

			$this->load->view('theme/template', $this->data);
		} else {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger">Tidak Ada artikel untuk  <b>' . htmlspecialchars($keyword, ENT_QUOTES, 'UTF-8') . '</b></div>');
			redirect('artikel');
		}
	}
	function komentar()
	{
		$kode = htmlspecialchars($this->input->post('id', TRUE), ENT_QUOTES);
		$data = $this->m_tulisan->get_berita_by_kode($kode);
		$row = $data->row_array();
		$slug = $row['tulisan_slug'];
		$nama = htmlspecialchars($this->input->post('nama', TRUE), ENT_QUOTES);
		$email = htmlspecialchars($this->input->post('email', TRUE), ENT_QUOTES);
		$komentar = nl2br(htmlspecialchars($this->input->post('komentar', TRUE), ENT_QUOTES));
		if (empty($nama) || empty($email)) {
			$this->session->set_flashdata('msg', '<div class="alert alert-danger">Masukkan input dengan benar.</div>');
			redirect('artikel/' . $slug);
		} else {
			$data = array(
				'komentar_nama' 			=> $nama,
				'komentar_email' 			=> $email,
				'komentar_isi' 				=> $komentar,
				'komentar_status' 		=> 0,
				'komentar_tulisan_id' => $kode
			);

			$this->db->insert('tbl_komentar', $data);
			$this->session->set_flashdata('msg', '<div class="alert alert-info">Komentar Anda akan tampil setelah moderasi.</div>');
			redirect('artikel/' . $slug);
		}
	}
}
