<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_model');
        $this->load->helper('my_helper');
        $this->load->library('upload');
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
        $this->load->view('keuangan/dashboard');
    }
}
