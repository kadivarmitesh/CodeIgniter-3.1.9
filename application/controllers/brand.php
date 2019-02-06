<?php 


class brand extends CI_Controller
{
	
	/*function __construct(argument)
	{
		# code...
	}*/




	public function  addbrand()
	{
		if(!$this->session->userdata('id'))
	    {
	      return redirect('Welcome/login');
	    }
	    else
	    {
	    	$this->load->library('form_validation');

			$this->form_validation->set_error_delimiters('<div class="error">', '</div>');

			//Validating Name Field
			$this->form_validation->set_rules('brand', 'Brand name', 'required|max_length[15]');

			if ($this->form_validation->run() == FALSE) {
				return redirect('dashboard');
			}
			else
			{
	    	$array = array(
	    		'use_id' => $this->session->userdata('id'),
	    		'brand_name' => $this->input->post('brand')
	    	);
	    	$this->load->model('newbrand');
				if($this->newbrand->add_brand($array))
				{
					return redirect('dashboard');
				}
			}
		}

	}


	public function index()
	{
		

	}
}


?>