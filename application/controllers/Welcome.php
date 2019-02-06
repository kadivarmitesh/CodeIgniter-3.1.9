<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->library('form_validation');

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		//Validating Name Field
		$this->form_validation->set_rules('dname', 'Username', 'required|min_length[3]|max_length[15]');

		//Validating Email Field
		$this->form_validation->set_rules('demail', 'Email', 'required|valid_email');

		//Validating password Field
		$this->form_validation->set_rules('dpass', 'Password', 'trim|required|min_length[8]|regex_match[/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/]');

		//Validating Mobile no. Field
		$this->form_validation->set_rules('dmobile', 'Mobile No.', 'required|regex_match[/^[0-9]{10}$/]');

		//Validating Address Field
		$this->form_validation->set_rules('daddress', 'Address', 'required|min_length[10]|max_length[50]');


		if ($this->form_validation->run() == FALSE) {
		$this->load->view('registration');
		}
		else
		{
			$config = array(
		        'upload_path'   => "./uploads/",
		        'allowed_types' => 'jpg|png|jpeg',
		        'overwrite'     => TRUE,                       
    		);


		    $this->load->library('upload', $config);
		    $files = $_FILES['uploads'];

		    foreach ($files['name'] as $key => $filename) 
		    {
		        $_FILES['uploads[]']['name']     = $files['name'][$key];
		        $_FILES['uploads[]']['type']     = $files['type'][$key];
		        $_FILES['uploads[]']['tmp_name'] = $files['tmp_name'][$key];
		        $_FILES['uploads[]']['error']    = $files['error'][$key];
		        $_FILES['uploads[]']['size']     = $files['size'][$key];
		   
		   	    $config['file_name'] = $filename;


		    $this->upload->initialize($config);

		    if (!$this->upload->do_upload('uploads[]')) {
               $error = array('error' => $this->upload->display_errors());
               $this->load->view('registration',$error);
            }

        	if (isset($_FILES['uploads[]']['name']) && !empty($_FILES['uploads[]']['name'])) {

        		// $uploads[] = $this->upload->data();
               
                $array = array(
                    
                    'name' => $this->input->post('dname'),
					'email' => $this->input->post('demail'),
					'pass' => $this->input->post('dpass'),
					'mobile' => $this->input->post('dmobile'),
					'address' => $this->input->post('daddress'),
                    'filename'  => $_FILES['uploads[]']['name']
                   // 'size'      => $_FILES['uploads[]']['size']
                );

                $this->load->model('registration');
				if($this->registration->add_regiter($array))
				{
		        	$this->load->library('email');
					//return redirect('Welcome/Login');
				$from_email = "mitesh.kadivar@overseasits.com";
		        $to_email = $this->input->post('demail');
		        //Load email library
		        //configure email settings
	            $config['protocol'] = 'smtp';
	            $config['smtp_host'] = 'webmail.overseasits.com';
	            $config['smtp_port'] = '25';
	            $config['smtp_user'] = 'mitesh.kadivar@overseasits.com';
	            $config['smtp_pass'] = 'mitesh@123';
	            $config['mailtype'] = 'html';
	            $config['charset'] = 'iso-8859-1';
	            $config['wordwrap'] = TRUE;
	            $config['newline'] = "\r\n"; //use double quotes
	            //$this->load->library('email', $config);
            	$this->email->initialize($config);                        

		        $this->email->from($from_email, 'Mitesh Kadivar');
		        $this->email->to($to_email);
		        $this->email->subject('Registration Successfully');
		        $this->email->message('Thank You ! For, Registraion in CodeIgniter Demo Created By: Mitesh Kadivar');
		        //Send mail
		        if($this->email->send())
		            $this->session->set_flashdata("email_sent","Congragulation Email Send Successfully. Pls Login ");
		        else
		            $this->session->set_flashdata("email_sent","You have encountered an error");
		       
				}
				
				return redirect('Welcome/Login');
				
		    }
		    
        }
    	}
	}


/*Login */
//password validation    Minimum eight characters, at least one letter, one number and one special character:



	public function Login()
	{
		if($this->session->userdata('id'))
	    {
	      return redirect('dashboard');
	    }
		$this->load->library('form_validation');

		$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

		//Validating Email Field
		$this->form_validation->set_rules('demail', 'Email', 'required|valid_email');

		//Validating password Field
		$this->form_validation->set_rules('dpass', 'Password', 'trim|required|min_length[8]|regex_match[/^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{8,}$/]');

		if ($this->form_validation->run() == FALSE) {
		$this->load->view('login');
		}
		else
		{
		//Setting values for tabel columns
	
		$email = $this->input->post('demail');
		$pass = $this->input->post('dpass');
		
		//Transfering data to Model
		$this->load->model('login');	
		$id=$this->login->isvalid($email,$pass);
		if($id)
			{
				$this->session->set_userdata('id',$id);
				//$this->load->view('dashboard');
				return redirect('dashboard');	
			}
			else
			{
				$this->session->set_flashdata('log_fail','Invalid username/password');
				return redirect('Welcome/login');
			}
		//Loading View
		$this->load->view('login');
		}

	}
}
	