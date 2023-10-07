<?php
defined('BASEPATH') or exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
        $this->load->helper('my_helper');
        $this->load->library('upload');
        $this->load->helper('url');
        // $this->load->library('spreadsheet_library');
        if ($this->session->userdata('logged_in') != true) {
            redirect(base_url() . 'auth');
        }
    }

    // upload image
    public function upload_img($value)
    {
        $kode = round(microtime(true) * 1000);
        $config['upload_path'] = './images/siswa';
        $config['allowed_types'] = 'jpg|png|jpeg';
        $config['max_size'] = '30000';
        $config['file_name'] = $kode;
        $this->upload->initialize($config);
        if (!$this->upload->do_upload($value)) {
            return array(false, '');
        } else {
            $fn = $this->upload->data();
            $nama = $fn['file_name'];
            return array(true, $nama);
        }
    }

    public function index()
    {
        $data['siswa'] = $this->m_model->get_data('siswa')->num_rows();
        $data['kelas'] = $this->m_model->get_data('kelas')->num_rows();
        $data['guru'] = $this->m_model->get_data('guru')->num_rows();
        $data['mapel'] = $this->m_model->get_data('mapel')->num_rows();
        $this->load->view('admin/index', $data);
    }

    public function siswa()
    {
        $data['result'] = $this->m_model->get_siswa();
        $this->load->view('admin/siswa', $data);
    }

    public function hapus_siswa($id)
    {
        $siswa = $this->m_model->get_by_id('siswa', 'id_siswa', $id)->row();
        if ($siswa) {
            if ($siswa->foto !== 'User.png') {
                $file_path = './images/siswa' . $siswa->foto;

                if (file_exists($file_path)) {
                    if (unlink($file_path)) {
                        $this->m_model->delete('siswa', 'id_siswa', $id);
                        redirect(base_url('admin/siswa'));
                    } else {
                        echo 'Gagal menghapus file.';
                    }
                }
            } else {
                $this->m_model->delete('siswa', 'id_siswa', $id);
                redirect(base_url('admin/siswa'));
            }
        } else {
            echo 'Siswa tidak ditemukan';
        }
    }
    // public function hapus_siswa($id)
    // {
    //     $this->m_model->delete('siswa', 'id_siswa', $id);
    //     redirect(base_url('admin/siswa'));
    // }

    public function tambah_siswa()
    {
        $data['kelas'] = $this->m_model->get_data('kelas')->result();
        $this->load->view('admin/tambahsiswa', $data);
    }

    public function aksi_tambah_siswa()
    {
        $foto = $this->upload_img('foto');
        if ($foto[0] == false) {
            $data = [
                'foto' => 'User.png',
                'nama_siswa' => $this->input->post('nama'),
                'nisn' => $this->input->post('nisn'),
                'gender' => $this->input->post('gender'),
                'id_kelas' => $this->input->post('kelas'),
            ];
            $this->m_model->tambah_data('siswa', $data);
            redirect(base_url('admin/siswa'));
        } else {
            $data = [
                'foto' => $foto[1],
                'nama_siswa' => $this->input->post('nama'),
                'nisn' => $this->input->post('nisn'),
                'gender' => $this->input->post('gender'),
                'id_kelas' => $this->input->post('kelas'),
            ];
            $this->m_model->tambah_data('siswa', $data);
            redirect(base_url('admin/siswa'));
        }
    }
    public function ubah_siswa($id)
    {
        $data['siswa'] = $this->m_model->get_by_id('siswa', 'id_siswa', $id)->result();
        $data['kelas'] = $this->m_model->get_data('kelas')->result();
        $this->load->view('admin/update_siswa', $data);
    }
    public function aksi_ubah_siswa()
    {
        $foto = $_FILES['foto']['name'];
        $foto_temp = $_FILES['foto']['tmp_name'];

        // Jika ada foto yang diunggah
        if ($foto) {
            $kode = round(microtime(true) * 1000);
            $file_name = $kode . '_' . $foto;
            $upload_path = './images/siswa/' . $file_name;

            if (move_uploaded_file($foto_temp, $upload_path)) {
                // Hapus foto lama jika ada
                $old_file = $this->m_model->get_siswa_foto_by_id($this->input->post('id_siswa'));
                if ($old_file && file_exists('./images/siswa/' . $old_file)) {
                    unlink('./images/siswa/' . $old_file);
                }

                $data = [
                    'foto' => $file_name,
                    'nama_siswa' => $this->input->post('nama'),
                    'nisn' => $this->input->post('nisn'),
                    'gender' => $this->input->post('gender'),
                    'id_kelas' => $this->input->post('kelas'),
                ];
            } else {
                // Gagal mengunggah foto baru
                redirect(base_url('admin/ubah_siswa/' . $this->input->post('id_siswa')));
            }
        } else {
            // Jika tidak ada foto yang diunggah
            $data = [
                'nama_siswa' => $this->input->post('nama'),
                'nisn' => $this->input->post('nisn'),
                'gender' => $this->input->post('gender'),
                'id_kelas' => $this->input->post('kelas'),
            ];
        }

        // Eksekusi dengan model ubah_data
        $eksekusi = $this->m_model->ubah_data('siswa', $data, array('id_siswa' => $this->input->post('id_siswa')));

        if ($eksekusi) {
            redirect(base_url('admin/siswa'));
        } else {
            redirect(base_url('admin/ubah_siswa/' . $this->input->post('id_siswa')));
        }
    }
    // public function aksi_ubah_siswa()
    // {
    //     $data = array(
    //         'nama_siswa' => $this->input->post('nama'),
    //         'nisn' => $this->input->post('nisn'),
    //         'gender' => $this->input->post('gender'),
    //         'id_kelas' => $this->input->post('id_kelas'),
    //     );
    //     $eksekusi = $this->m_model->ubah_data('siswa', $data, array('id_siswa' => $this->input->post('id_siswa')));
    //     if ($eksekusi) {
    //         $this->session->set_flashdata('sukses', 'berhasil');
    //         redirect(base_url('admin/siswa'));
    //     } else {
    //         $this->session->set_flashdata('error', 'gagal...');
    //         redirect(base_url('admin/siswa/ubah_siswa/' . $this->input->post('id_siswa')));
    //     }
    // }
    public function akun()
    {
        $data['user'] = $this->m_model->get_by_id('admin', 'id', $this->session->userdata('id'))->result();
        $this->load->view('admin/akun', $data);
    }

    public function aksi_ubah_akun()
    {
        $password_baru = $this->input->post('new_password');
        $konfirmasi_password = $this->input->post('confirm_password');
        $email = $this->input->post('email');
        $username = $this->input->post('username');
        $foto = $this->upload_img('foto');

        if ($foto[0] == false) {
            $data = array(
                'email' => $email,
                'username' => $username,
                'foto' => 'User.png',
            );

            if (!empty($password_baru)) {
                if ($password_baru === $konfirmasi_password) {
                    $data['password'] = md5($password_baru);
                } else {
                    $this->session->set_flashdata('message', 'Password baru dan konfirmasi password harus sama!');
                    redirect(base_url('admin/akun'));
                }
            }

            $this->session->set_userdata($data);
            $update_result = $this->m_model->ubah_data('admin', $data, array('id' => $this->session->userdata('id')));

            if ($update_result) {
                redirect(base_url('admin/akun'));
            } else {
                redirect(base_url('admin/akun'));
            }
        } else {
            $data = array(
                'email' => $email,
                'username' => $username,
                'foto' => $foto[1]
            );

            if (!empty($password_baru)) {
                if ($password_baru === $konfirmasi_password) {
                    $data['password'] = md5($password_baru);
                } else {
                    $this->session->set_flashdata('message', 'Password baru dan konfirmasi password harus sama!');
                    redirect(base_url('admin/akun'));
                }
            }

            $this->session->set_userdata($data);
            $update_result = $this->m_model->ubah_data('admin', $data, array('id' => $this->session->userdata('id')));

            if ($update_result) {
                redirect(base_url('admin/akun'));
            } else {
                redirect(base_url('admin/akun'));
            }
        }
    }

    public function dashboard_keuangan()
    {
        $data = ['menu' => 'dashboard'];
        $spp = ['jenis_pembayaran' => 'Pembayaran SPP'];
        $gedung = ['jenis_pembayaran' => 'Pembayaran Uang Gedung'];
        $seragam = ['jenis_pembayaran' => 'Pembayaran Uang Seragam'];
        $data['spp'] = $this->m_model->total('pembayaran', $spp);
        $data['uang_gedung'] = $this->m_model->total('pembayaran', $gedung);
        $data['uang_seragam'] = $this->m_model->total('pembayaran', $seragam);
        $this->load->view('keuangan/dashboard', $data);
    }

    public function pembayaran()
    {
        $data = ['menu' => 'pembayaran'];
        $data['pembayaran'] = $this->m_model->get_data('pembayaran')->result();
        $this->load->view('keuangan/pembayaran', $data);
    }

    public function tambah_pembayaran()
    {
        $data = ['menu' => 'pembayaran'];
        $data['siswa'] = $this->m_model->get_data('siswa')->result();
        $this->load->view('keuangan/tambah_pembayaran', $data);
    }

    public function aksi_tambah_pembayaran()
    {
        $data = [
            'id_siswa' => $this->input->post('id_siswa'),
            'total' => $this->input->post('nominal'),
            'jenis_pembayaran' => $this->input->post('jenis_pembayaran'),
        ];
        $this->m_model->tambah_data('pembayaran', $data);
        redirect(base_url('admin/pembayaran'));
    }

    public function hapus_pembayaran($id)
    {
        $this->m_model->delete('pembayaran', 'id_bayar', $id);
        redirect(base_url('admin/pembayaran'));
    }

    public function ubah_pembayaran($id)
    {
        $data = ['menu' => 'pembayaran'];
        $data['pembayaran'] = $this->m_model->get_by_id('pembayaran', 'id_bayar', $id)->result();
        $data['siswa'] = $this->m_model->get_data('siswa')->result();
        $this->load->view('keuangan/update_pembayaran', $data);
    }

    public function aksi_ubah_pembayaran()
    {
        $data = [
            'id_siswa' => $this->input->post('id_siswa'),
            'jenis_pembayaran' => $this->input->post('jenis_pembayaran'),
            'total' => $this->input->post('nominal'),
        ];
        $eksekusi = $this->m_model->ubah_data('pembayaran', $data, array('id_bayar' => $this->input->post('id_bayar')));

        if ($eksekusi) {
            redirect(base_url('admin/pembayaran'));
        } else {
            redirect(base_url('admin/ubah_pembayaran/' . $this->input->post('id_bayar')));
        }
    }

    public function export()
    {
        require_once FCPATH . 'vendor/autoload.php';
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $style_col = [
            'font' => ['bold' => true],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'top' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
            ]
        ];

        $style_row = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ],
            'borders' => [
                'top' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
            ]
        ];

        $sheet->setCellValue('A1', "DATA PEMBAYARAN");
        $sheet->mergeCells('A1:E1');
        $sheet->getStyle('A1')->getFont()->setBold(true);

        $sheet->setCellValue('A3', "ID");
        $sheet->setCellValue('B3', "JENIS PEMBAYARAN");
        $sheet->setCellValue('C3', "TOTAL PEMBAYARAN");
        $sheet->setCellValue('D3', "SISWA");
        $sheet->setCellValue('E3', "KELAS");

        $sheet->getStyle('A3')->applyFromArray($style_col);
        $sheet->getStyle('B3')->applyFromArray($style_col);
        $sheet->getStyle('C3')->applyFromArray($style_col);
        $sheet->getStyle('D3')->applyFromArray($style_col);
        $sheet->getStyle('E3')->applyFromArray($style_col);

        $data_pembayaran = $this->m_model->get_data('pembayaran')->result();

        $no = 1;
        $numrow = 4;

        foreach ($data_pembayaran as $data) {
            $sheet->setCellValue('A' . $numrow, $data->id_bayar);
            $sheet->setCellValue('B' . $numrow, $data->jenis_pembayaran);
            $sheet->setCellValue('C' . $numrow, $data->total);
            $sheet->setCellValue('D' . $numrow, siswa($data->id_siswa));
            $sheet->setCellValue('E' . $numrow, siswa2($data->id_siswa));

            $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('E' . $numrow)->applyFromArray($style_row);

            $no++;
            $numrow++;
        }

        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(25);
        $sheet->getColumnDimension('C')->setWidth(25);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(30);

        $sheet->getDefaultRowDimension()->setRowHeight(-1);

        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

        $sheet->setTitle('LAPORAN DATA PEMBAYARAN');

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="PEMBAYARAN.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    public function export_siswa()
    {
        require_once FCPATH . 'vendor/autoload.php';
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        $style_col = [
            'font' => ['bold' => true],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER,
            ],
            'borders' => [
                'top' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
            ]
        ];

        $style_row = [
            'alignment' => [
                'vertical' => \PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_CENTER
            ],
            'borders' => [
                'top' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'right' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'bottom' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
                'left' => ['borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN],
            ]
        ];

        $sheet->setCellValue('A1', "DATA SISWA");
        $sheet->mergeCells('A1:E1');
        $sheet->getStyle('A1')->getFont()->setBold(true);

        $sheet->setCellValue('A3', "ID");
        $sheet->setCellValue('B3', "NAMA SISWA");
        $sheet->setCellValue('C3', "NISN");
        $sheet->setCellValue('D3', "GENDER");
        $sheet->setCellValue('E3', "KELAS");

        $sheet->getStyle('A3')->applyFromArray($style_col);
        $sheet->getStyle('B3')->applyFromArray($style_col);
        $sheet->getStyle('C3')->applyFromArray($style_col);
        $sheet->getStyle('D3')->applyFromArray($style_col);
        $sheet->getStyle('E3')->applyFromArray($style_col);

        $siswa = $this->m_model->get_data('siswa')->result();

        $no = 1;
        $numrow = 4;

        foreach ($siswa as $data) {
            $sheet->setCellValue('A' . $numrow, $data->id_siswa);
            $sheet->setCellValue('B' . $numrow, $data->nama_siswa);
            $sheet->setCellValue('C' . $numrow, $data->nisn);
            $sheet->setCellValue('D' . $numrow, $data->gender);
            $sheet->setCellValue('E' . $numrow, siswa2($data->id_siswa));

            $sheet->getStyle('A' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('B' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('C' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('D' . $numrow)->applyFromArray($style_row);
            $sheet->getStyle('E' . $numrow)->applyFromArray($style_row);

            $no++;
            $numrow++;
        }

        $sheet->getColumnDimension('A')->setWidth(5);
        $sheet->getColumnDimension('B')->setWidth(25);
        $sheet->getColumnDimension('C')->setWidth(25);
        $sheet->getColumnDimension('D')->setWidth(20);
        $sheet->getColumnDimension('E')->setWidth(30);

        $sheet->getDefaultRowDimension()->setRowHeight(-1);

        $sheet->getPageSetup()->setOrientation(\PhpOffice\PhpSpreadsheet\Worksheet\PageSetup::ORIENTATION_LANDSCAPE);

        $sheet->setTitle('DATA SISWA');

        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment; filename="SISWA.xlsx"');
        header('Cache-Control: max-age=0');

        $writer = new Xlsx($spreadsheet);
        $writer->save('php://output');
    }

    public function import()
    {
        require_once FCPATH . 'vendor/autoload.php';
        if (isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            $object = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $hightestRow = $worksheet->getHighestRow();
                $hightestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $hightestRow; $row++) {
                    $jenis_pembayaran = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $total_pembayaran = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $nisn = $worksheet->getCellByColumnAndRow(5, $row)->getValue();

                    $get_id_by_nisn = $this->m_model->get_by_nisn($nisn);
                    echo $get_id_by_nisn;
                    $data = array(
                        'jenis_pembayaran' => $jenis_pembayaran,
                        'total' => $total_pembayaran,
                        'id_siswa' => $get_id_by_nisn,
                    );
                    $this->m_model->tambah_data('pembayaran', $data);
                }
            }
            redirect(base_url('admin/pembayaran'));
        }
    }

    public function import_siswa()
    {
        require_once FCPATH . 'vendor/autoload.php';
        if (isset($_FILES["file"]["name"])) {
            $path = $_FILES["file"]["tmp_name"];
            $object = \PhpOffice\PhpSpreadsheet\IOFactory::load($path);
            foreach ($object->getWorksheetIterator() as $worksheet) {
                $hightestRow = $worksheet->getHighestRow();
                $hightestColumn = $worksheet->getHighestColumn();
                for ($row = 2; $row <= $hightestRow; $row++) {
                    $nama = $worksheet->getCellByColumnAndRow(2, $row)->getValue();
                    $nisn = $worksheet->getCellByColumnAndRow(3, $row)->getValue();
                    $gender = $worksheet->getCellByColumnAndRow(4, $row)->getValue();
                    $tingkat = $worksheet->getCellByColumnAndRow(5, $row)->getValue();
                    $jurusan = $worksheet->getCellByColumnAndRow(6, $row)->getValue();

                    $get_by_id_kelas = $this->m_model->get_by_kelas($tingkat, $jurusan);
                    echo $get_by_id_kelas;
                    $data = array(
                        'nama_siswa' => $nama,
                        'nisn' => $nisn,
                        'gender' => $gender,
                        'id_kelas' => $get_by_id_kelas,
                        'foto' => 'User.png'
                    );
                    $this->m_model->tambah_data('siswa', $data);
                }
            }
            redirect(base_url('admin/siswa'));
        }
    }

    public function export_pembayaran()
    {
        $data['data_pembayaran'] = $this->m_model->get_data('pembayaran')->result();
        $data['nama'] = 'pembayaran';
        if ($this->uri->segment(3) == "pdf") {
            $this->load->library('pdf');
            $this->pdf->load_view('keuangan/export_data_pembayaran', $data);
            $this->pdf->render();
            $this->pdf->stream("data_pembayaran.pdf", array("Attachment" => false));
        } else {
            $this->load->view('keuangan/download-data', $data);
        }
    }

    public function export_guru()
    {
        $data['guru'] = $this->m_model->get_data('guru')->result();
        $data['nama'] = 'data_guru';
        if ($this->uri->segment(3) == "pdf") {
            $this->load->library('pdf');
            $this->pdf->load_view('keuangan/export_data_pembayaran', $data);
            $this->pdf->render();
            $this->pdf->stream("data_guru.pdf", array("Attachment" => false));
        } else {
            $this->load->view('keuangan/pdf_guru', $data);
        }
    }
}
