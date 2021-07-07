<?php

class M_pembayaran extends CI_Model{
	protected $_table = 'jenis_pembayaran';


	public function lihat_pembayaran($id_jenis_pembayaran){
		$query = $this->db->select('*');
		$query = $this->db->where(['id_jenis_pembayaran' => $id_jenis_pembayaran]);
		$query = $this->db->get($this->_table);
		return $query->row();
	}

	public function lihat(){
		$query = $this->db->get($this->_table);
		return $query->result();
	}
	
	public function insertAngsuran($data)
    {
        return $this->db->insert('angsuran', $data);
    }

}