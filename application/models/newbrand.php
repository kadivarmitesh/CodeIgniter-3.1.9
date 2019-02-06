<?php

class newbrand extends CI_model
{

	public function add_brand($array)
	{
		 return $this->db->insert('brand', $array);
		
	}

	public function get_brands()
	{
	 
	  $query = $this->db->query('SELECT * FROM brand');
		return $query->result();

	}

	public function delete_brand($id)
	{
	 	return $this->db->delete('brand',['id'=>$id]);
	}

	// Update Query For Brand 
	public	function update_student_id1($id,$data)
	{
		return $this->db->where('id', $id)
				 	->update('brand', $data);
		
	}
}

?>

