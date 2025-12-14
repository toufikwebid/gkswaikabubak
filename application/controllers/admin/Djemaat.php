<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require 'vendor/autoload.php';
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\Style\Border;
use PhpOffice\PhpSpreadsheet\Style\Color;
use PhpOffice\PhpSpreadsheet\Style\Font;
use PhpOffice\PhpSpreadsheet\Style\Alignment;


class Djemaat extends CI_Controller {

    public function index() {
        // View untuk filter
        $this->data['breadcrumb']  = 'Download Jemaat';

		$this->data['main_view']   = 'admin/v_djemaat';

		$this->load->view('theme/admintemplate', $this->data);
    }

    public function downloadExcel() {
        // Load input filter from text and combobox
        $namaFilter = $this->input->get('filter'); // Filter by name
        $wilayahFilter = $this->input->get('wilayah'); // Filter by combobox (wilayahpelayanan)
    
        // Query database based on both filters
        $this->load->database();
        if (!empty($wilayahFilter) && $wilayahFilter != 'all') {
            $this->db->where('wilayah_pelayanan', $wilayahFilter); // Adjust column to your table
        }
        if (!empty($namaFilter)) {
            $this->db->like('nama', $namaFilter);
        }
        $query = $this->db->get('tbl_jemaat'); // Adjust table name
        $data = $query->result_array();
    
        // Create Excel file
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
        // Add data to the sheet...
    
        // Export the file (complete implementation is needed here)
   

      
// Menambahkan judul di bagian atas
$sheet->mergeCells('A1:P1'); // Judul menempati 4 kolom (A sampai D)
$sheet->setCellValue('A1', 'DATA JEMAAT GKS WAIKABUBAK');

// Style untuk judul
$titleStyle = [
    'font' => [
        'bold' => true,
        'size' => 14,
    ],
    'alignment' => [
        'horizontal' => Alignment::HORIZONTAL_CENTER,
        'vertical' => Alignment::VERTICAL_CENTER,
    ],
];
$sheet->getStyle('A1')->applyFromArray($titleStyle);

// Header tabel
$sheet->setCellValue('A2', 'No.');
$sheet->setCellValue('B2', 'Nama');
$sheet->setCellValue('C2', 'Wilayah Pelayanan');
$sheet->setCellValue('D2', 'Alamat');
$sheet->setCellValue('E2', 'Nama KK');
$sheet->setCellValue('F2', 'Peran Dalam Keluarga');
$sheet->setCellValue('G2', 'Tempat Lahir');
$sheet->setCellValue('H2', 'Tanggal Lahir');
$sheet->setCellValue('I2', 'Umur');
$sheet->setCellValue('J2', 'Jenis Kelamin');
$sheet->setCellValue('K2', 'Pendidikan Terakhir');
$sheet->setCellValue('L2', 'Pekerjaan');
$sheet->setCellValue('M2', 'Pendonor');
$sheet->setCellValue('N2', 'Baptis');
$sheet->setCellValue('O2', 'Sidi');
$sheet->setCellValue('P2', 'Nikah');

// Style untuk header
$headerStyle = [
    'font' => [
        'bold' => true,
    ],
    'borders' => [
        'allBorders' => [
            'borderStyle' => Border::BORDER_THIN,
            'color' => ['argb' => Color::COLOR_BLACK],
        ],
    ],
    'alignment' => [
        'horizontal' => Alignment::HORIZONTAL_CENTER,
    ],
];
$sheet->getStyle('A2:P2')->applyFromArray($headerStyle);
        // Tambahkan header lainnya sesuai kebutuhan

        // Tambahkan data ke baris berikutnya
        $row = 3; // Mulai dari baris ketiga
        $no = 1; // Nomor awal
        foreach ($data as $item) {
            $sheet->setCellValue('A' . $row, $no);
            $sheet->setCellValue('B' . $row, $item['nama']);
            $sheet->setCellValue('C' . $row, $item['wilayah_pelayanan']);
            $sheet->setCellValue('D' . $row, $item['alamat']);
            $sheet->setCellValue('E' . $row, $item['nama_kepala_keluarga']);
            $sheet->setCellValue('F' . $row, $item['peran_dalam_keluarga']);
            $sheet->setCellValue('G' . $row, $item['tempat_lahir']);
            $sheet->setCellValue('H' . $row, $item['tanggal_lahir']);
            $sheet->setCellValue('I' . $row, $item['umur']);
            $sheet->setCellValue('J' . $row, $item['jenis_kelamin']);
            $sheet->setCellValue('K' . $row, $item['pendidikan_terakhir']);
            $sheet->setCellValue('L' . $row, $item['pekerjaan']);
            $sheet->setCellValue('M' . $row, $item['pendonor']);
            $sheet->setCellValue('N' . $row, $item['pendeta_baptis']);
            $sheet->setCellValue('O' . $row, $item['pendeta_sidi']);
            $sheet->setCellValue('P' . $row, $item['pendeta_nikah']);

            $row++;
            $no++;
        }
        
            // Mengatur border untuk semua sel yang memiliki data


// Terapkan gaya ke seluruh tabel (dari A1 hingga Cn, di mana n adalah baris terakhir)
$lastRow = $row - 1; // Baris terakhir yang digunakan
$styleArray = [
    'borders' => [
        'allBorders' => [
            'borderStyle' => Border::BORDER_THIN,
            'color' => ['argb' => Color::COLOR_BLACK],
        ],
    ],
];
$sheet->getStyle("A1:P{$lastRow}")->applyFromArray($styleArray);

// Mengatur auto width untuk kolom
foreach (range('A', 'P') as $column) {
    $sheet->getColumnDimension($column)->setAutoSize(true);
}

        // Simpan file Excel
        $writer = new Xlsx($spreadsheet);
        $tanggalJam = date("Ymd_His"); 
        $filename = "datajemaat$tanggalJam.xlsx";


        // Unduh file
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="' . $filename . '"');
        header('Cache-Control: max-age=0');

        $writer->save('php://output');
        exit;
    }
}