<?php
class Tanaman_model extends CI_Model
{
    function tambah($kode_tanaman, $id_barang)
    {
        $data = [
            "kode_tanaman" => $kode_tanaman,
            "id_barang" => $id_barang,
            "kondisi" => '',
        ];
        $this->db->insert('tanaman', $data);
    }
    public function update($table, $pk, $id, $data)
    {
        $this->db->where($pk, $id);
        return $this->db->update($table, $data);
    }
}