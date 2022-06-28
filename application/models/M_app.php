<?php
class M_app extends CI_Model
{
	public function tambah($data)
	{
		$this->db->insert('data', $data);
	}

	public function get_app()
	{
		$this->db->order_by('id', 'DESC');
		return $this->db->get('data')->result();
	}

	public function edit($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->set($data);
		$this->db->update('data');
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete('data');
	}
}
