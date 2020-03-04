<?php 

class Kelas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if (!$this->session->userdata('isLoggedIn')) {
            redirect('auth');
        }
    }

    public function index()
    {
        $data['kelas'] = $this->Kelas_model->getKontrakById();
        // $this->debug($this->session->userdata());
        
        $data['page'] = 'Kelas';
        $data['navbar'] = $this->load->view('partials/navbar', $data, TRUE);
        $data['sidebar'] = $this->load->view('partials/sidebar', '', TRUE);
        $data['header'] = $this->load->view('partials/header', $data, TRUE);
        $data['footer'] = $this->load->view('partials/footer', '', TRUE);
        $data['js'] = $this->load->view('partials/js', '', TRUE);
        $data['content'] = $this->load->view('kelas/index', $data, TRUE);

        $this->load->view('base', $data, FALSE);
    }

    public function detail($id)
    {
        $data['kelas'] = $this->Kelas_model->getKelas($id);
        $data['bab'] = $this->Kelas_model->getBabById($data['kelas']->id_mata_pelajaran);
        // $this->debug($data['kelas']);
        
        $data['page'] = 'Kelas';
        $data['navbar'] = $this->load->view('partials/navbar', $data, TRUE);
        $data['sidebar'] = $this->load->view('partials/sidebar', '', TRUE);
        $data['header'] = $this->load->view('partials/header', $data, TRUE);
        $data['footer'] = $this->load->view('partials/footer', '', TRUE);
        $data['js'] = $this->load->view('partials/js', '', TRUE);
        $data['content'] = $this->load->view('kelas/kelas', $data, TRUE);

        $this->load->view('base', $data, FALSE);
    }

    public function tambahKelas()
    {
        $input = $this->input->post('kode');

        if ($input != "") {
            $kelas = $this->Kelas_model->getKelasByName($input);
            if ($kelas) {
                $isKontrakAvailable = $this->Kelas_model->getKontrakAvailable($kelas->id_kelas);
                if ($isKontrakAvailable) {
                    $this->session->set_flashdata('message', $this->getAlert("Kelas berhasil ditambahkan", "success"));
                    redirect('kelas', 'refresh');
                }
                else {
                    $this->session->set_flashdata('message', $this->getAlert("Anda sudah mengontrak kelas tersebut. Silakan ambil kelas lain", "danger"));
                    redirect('kelas', 'refresh');
                }
            }
            else {
                $this->session->set_flashdata('message', $this->getAlert("Kelas tidak ditemukan", "danger"));
                redirect('kelas', 'refresh');
            }
        } else {
            $this->session->set_flashdata('message', $this->getAlert("Data input tidak boleh kosong", "danger"));
		    redirect('kelas', 'refresh');
        }
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