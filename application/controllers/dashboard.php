<?php

class dashboard extends CI_Controller
{       

	public function index()
	{
    if(!$this->session->userdata('id'))
    {
      return redirect('Welcome/login');
    }
    else
    {
      $id =$this->session->userdata('id');
      $this->load->model('mydashboard');

      $data['users']=$this->mydashboard->loginuser($id); 
       $this->load->model('newbrand');
      $data['brand'] = $this->newbrand->get_brands();
      $data['members']=$this->mydashboard->alluserdata();
      $this->load->view('dashboard',$data);


    }
    
	}

  /* Logout function  click on logout */

  public function logout()
  {
    $this->session->unset_userdata('id');
    return redirect('Welcome/Login');
  }

  public function deletebrand($id)
  {
    
    $this->load->model('newbrand');
    if($this->newbrand->delete_brand($id))
    {
      return redirect('dashboard');
    }

  }  

  public function Editdata()
  {
     If( $_SERVER['REQUEST_METHOD']  != 'POST'  ){
            redirect('dashboard');
        }

        $id = $this->input->post('id',true);
        $data = array(
          'brand_name' => $this->input->post('firstname',true),
           'use_id' => $this->session->userdata('id')
        );

      $this->load->model('newbrand');
      $this->newbrand->update_student_id1($id,$data);
  
  }

  //delete user 
  public function deleteuser($id)
  {
    $this->load->model('mydashboard');
    if($this->mydashboard->delete_user($id))
    {
      return redirect('dashboard');
    }
  }

}

?>

