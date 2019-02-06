<?php


class mydashboard extends CI_model
{
	
	public function loginuser($id)
	{
		$qry=$this->db->where("id",$id)
						->get("register");  
		return $qry->result();
	
	}

	public function alluserdata()
	{
		$sql=$this->db->get("register");
		return $sql->result();
	}

	public function delete_user($id)
	{
		return $this->db->delete('register',['id'=>$id]);
	}

}

?>