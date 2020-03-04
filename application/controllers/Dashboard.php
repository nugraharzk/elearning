<?php

class Dashboard extends CI_Controller 
{

    public function __construct(Type $var = null)
    {
        parent::__construct();
        if (!$this->session->userdata('isLoggedIn')) {
            $this->session->set_flashdata('message', $this->getAlert('Session has Expired. Please login', 'danger'));
            redirect('auth', 'refresh');
        }
    }

    public function index()
    {
        $data['kelas'] = $this->Kelas_model->getKontrakById();
        // $this->debug($this->session->userdata());
        
        $data['page'] = 'Dashboard';
        $data['navbar'] = $this->load->view('partials/navbar', $data, TRUE);
        $data['sidebar'] = $this->load->view('partials/sidebar', '', TRUE);
        $data['header'] = $this->load->view('partials/header', $data, TRUE);
        $data['footer'] = $this->load->view('partials/footer', '', TRUE);
        $data['js'] = $this->load->view('partials/js', '', TRUE);
        $data['content'] = $this->load->view('dashboard/index', $data, TRUE);

        $this->load->view('base', $data, FALSE);
    }

    public function debug($var)
    {
        header('Content-Type: application/json');
        echo json_encode($var);
    }

	public function getAlert($message, $type)
	{
		return '
			<div class="alert alert-'.$type.' alert-dismissible">
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				'.$message.'
			</div>
		';
	}

}


?>