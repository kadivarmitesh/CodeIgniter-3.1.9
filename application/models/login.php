<?php


class login extends CI_model
{
	
	public function isvalid($email,$pass)
	{
		
		$res=$this->db->where(['email'=>$email,'pass'=>$pass])
				  ->get('register');

		if($res->num_rows())
		{
			return $res->row()->id;
		}
		else
		{
			return false;
		}
	}

}

?>