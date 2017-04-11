<?php
class MY_Model extends CI_Model {

	protected $table_name = "banner";
	protected $primaryKey = "bannerID";
	public function __construct(){
		$this->load->database();
	}

	public function count($where=array()){
		$this->db->select("COUNT(id) as total");
		$this->db->where($where);
		$query = $this->db->get($this->table_name);
		$row = $query->row_array();
		return $row['total'];
	}

	public function get_where_cus($where=""){
		$this->db->where($where, null, false);
		$query = $this->db->get($this->table_name);
		return $query->row_array();
	}

	public function get_where($array=array(), $orderby="", $descasc="DESC"){

		if($orderby == "") {
			$orderby = $this->primaryKey;
		}

		$this->db->where($array);
		$this->db->order_by($orderby, $descasc);
		$query = $this->db->get($this->table_name);
		return $query->result_array();

	}
	public function getOne($array=array()){
		$this->db->where($array);
		$query = $this->db->get($this->table_name);
		return $query->row_array();
	}

	public function insert($array=array()){

		$this->db->insert($this->table_name, $array);
		return $this->db->insert_id();

	}
	public function update($where=array(),$array=array()){
		$this->db->update($this->table_name, $array, $where);

	}
	public function delete($where=array()){
		$this->update($where, array(
			'is_deleted' => 1,
			'modified_date' => date("Y-m-d H:i:s"),
		));

	}

	
}

?>