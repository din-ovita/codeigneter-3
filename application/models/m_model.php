<?php
class M_model extends CI_Model
{
    function get_data($table)
    {
        return $this->db->get($table);
    }
    function get_siswa()
    {
        $sql = $this->db->get('siswa');
        return $sql->result();
    }
    function getwhere($table, $data)
    {
        return $this->db->get_where($table, $data);
    }
}
