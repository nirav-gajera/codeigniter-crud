<?php
class Crud extends CI_Model
{

	public function insert($table, $data)
	{
		$result = $this->db->insert($table, $data);
		return $result;
	}

	public function update($table, $data, $id)
	{
		$result = $this->db->where('id', $id)->update($table, $data);
		return $result;
	}

	public function delete($table, $id)
	{
		$result = $this->db->delete($table, ['id' => $id]);
		return $result;
	}

	public function get_records($table, $limit, $offset)
	{
		$this->db->limit($limit, $offset);
		$result = $this->db->get($table)->result();
		return $result;
	}

	// public function get_records($table)
	// {
	// 	$result = $this->db->get($table)->result();
	// 	return $result;
	// }

	public function find_record_by_id($table, $id)
	{
		$result = $this->db->get_where($table, ['id' => $id])->row();
		return $result;
	}

	public function search_records($table, $searchValue)
	{
		$this->db->like('title', $searchValue);
		$this->db->or_like('description', $searchValue);
		$result = $this->db->get($table)->result();
		return $result;
	}

	public function count_records($table)
	{
		return $this->db->count_all($table);
	}
	
}
