<?php
function kelas($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('kelas');
    foreach ($result->result() as $c) {
        $stmt = $c->tingkat_kelas . ' ' . $c->jurusan_kelas;
        return $stmt;
    }
}
function siswa($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id_siswa', $id)->get('siswa');
    foreach ($result->result() as $c) {
        $stmt = $c->nama_siswa;
        return $stmt;
    }
}
function siswa2($id)
{
    $ci = &get_instance();
    $ci->load->database();

    // mencari data siswa
    $result = $ci->db->where('id_siswa', $id)->get('siswa');
    $stmt = ''; // variable $stmt

    foreach ($result->result() as $c) {
        $stmt = $c->id_kelas; // get id kelas
        break; // menghentikan looping
    }

    // menggunakan id kelas untuk mengambil tingkat kelas dan jurusan kelas
    $p = '';

    if (!empty($stmt)) {
        $res = $ci->db->where('id', $stmt)->get('kelas');
        foreach ($res->result() as $b) {
            $p = $b->tingkat_kelas . ' ' . $b->jurusan_kelas;
            break; // keluar looping
        }
    }

    return $p; // mengembalikan variable $P
}
function convRupiah($value)
{
    return 'Rp. ' . number_format($value);
}
function mapel($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id', $id)->get('mapel');
    foreach ($result->result() as $c) {
        $stmt = $c->nama_mapel;
        return $stmt;
    }
}
function get_kelas($id)
{
    $ci = &get_instance();
    $ci->load->database();
    $result = $ci->db->where('id_guru_walikelas', $id)->get('kelas');
    foreach ($result->result() as $c) {
        $stmt = $c->tingkat_kelas . ' ' . $c->jurusan_kelas;
        return $stmt;
    }
}

