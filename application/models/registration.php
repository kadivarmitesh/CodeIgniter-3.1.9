<?php


class registration extends CI_model
{
	

	public function add_regiter($array)
	{
		 return $this->db->insert('register', $array);
		
	}

}

?>