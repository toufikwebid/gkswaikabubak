<?php
class M_situs extends CI_Model
{

    function get_all_situs()
    {
        $hsl = $this->db->query("SELECT * FROM tbl_situs");
        return $hsl->result_array(); // Convert result to array
    }


    function update_situs($kode, $nama, $logo, $photo, $deskripsi, $fav, $quotes, $footer, $visimisi, $sambutan, $hp, $email)
    {
        $hsl = $this->db->query("UPDATE tbl_situs SET situs_nama='$nama', situs_logo='$logo', situs_deskripsi='$deskripsi', situs_favicon='$fav',
    situs_ftpendeta='$photo', situs_quotes='$quotes', situs_footer='$footer', visi_misi = '$visimisi', sambutan ='$sambutan', situs_hp='$hp', situs_mail='$email' WHERE situs_id='$kode'");
        return $hsl;
    }

    function update_situsxlogo($kode, $nama, $logo, $deskripsi, $quotes, $footer, $visimisi, $sambutan, $hp, $email)
    {
        $hsl = $this->db->query("UPDATE tbl_situs SET situs_nama='$nama', situs_logo='$logo', situs_deskripsi='$deskripsi', situs_quotes='$quotes', situs_footer='$footer', visi_misi = '$visimisi', sambutan ='$sambutan', situs_hp='$hp', situs_mail='$email' WHERE situs_id='$kode'");
        return $hsl;
    }

    function update_situsxfav($kode, $nama, $fav, $deskripsi, $quotes, $footer, $visimisi, $sambutan, $hp, $email)
    {
        $hsl = $this->db->query("UPDATE tbl_situs SET situs_nama='$nama', situs_favicon='$fav', situs_deskripsi='$deskripsi', situs_quotes='$quotes', situs_footer='$footer', visi_misi = '$visimisi', sambutan ='$sambutan', situs_hp='$hp', situs_mail='$email' WHERE situs_id='$kode'");
        return $hsl;
    }

    function update_situsxpen($kode, $nama, $pendeta, $deskripsi, $quotes, $footer, $visimisi, $sambutan, $hp, $email)
    {
        $hsl = $this->db->query("UPDATE tbl_situs SET situs_nama='$nama', situs_ftpendeta='$pendeta', situs_deskripsi='$deskripsi', situs_quotes='$quotes', situs_footer='$footer', visi_misi = '$visimisi', sambutan ='$sambutan', situs_hp='$hp', situs_mail='$email' WHERE situs_id='$kode'");
        return $hsl;
    }

    function update_situs_tanpa_img($kode, $nama, $deskripsi, $quotes, $footer, $visimisi, $sambutan, $hp, $email)
    {
        $hsl = $this->db->query("UPDATE tbl_situs SET situs_nama='$nama', situs_deskripsi='$deskripsi', situs_quotes='$quotes', situs_footer='$footer', visi_misi = '$visimisi', sambutan ='$sambutan', situs_hp='$hp', situs_mail='$email' WHERE situs_id='$kode'");
        return $hsl;
    }
}
