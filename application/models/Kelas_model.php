<?php 

class Kelas_model extends CI_Model
{
    var $table = '';

    public function __construct()
    {
        parent::__construct();
        $this->table = "kelas";
    }

    public function getAll()
    {
        $query = $this->db->select('*')
                        ->join('guru', 'guru.id = kelas.id_guru')
                        ->join('mata_pelajaran', 'mata_pelajaran.id = kelas.id_mata_pelajaran')
                        ->get($this->table)
                        ->result();
        
        return $query;
    }

    public function getKelasByName($name)
    {
        $query = $this->db->select('*')
                        ->where('kode_unik', $name)
                        ->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran = kelas.id_mata_pelajaran')
                        ->join('guru', 'guru.id_guru = kelas.id_guru')
                        ->get($this->table)
                        ->row();

        return $query;
    }

    public function getKontrakById()
    {
        $id = $this->session->userdata('id');

        $query = $this->db->select('*')
                        ->where('kontrak.id_siswa', $id)
                        ->join('siswa', 'siswa.id_siswa = kontrak.id_siswa')
                        ->join('kelas', 'kelas.id_kelas = kontrak.id_kelas')
                        ->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran = kelas.id_mata_pelajaran')
                        ->join('guru', 'guru.id_guru = kelas.id_guru')
                        ->get('kontrak')
                        ->result();
        return $query;
    }

    public function getKontrakAvailable($id_kelas)
    {
        $id = $this->session->userdata('id');

        $query = $this->db->where('id_siswa', $id)
                        ->where('id_kelas', $id_kelas)
                        ->get('kontrak')
                        ->num_rows();
        if ($query == 0) {
            $cond = $this->insertKontrak($id, $id_kelas);
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function insertKontrak($id, $id_kelas)
    {
        $array = ['id_siswa' => $id, 'id_kelas' => $id_kelas];
        $this->db->insert('kontrak', $array);
    }

    public function getKelas($id)
    {
        return $this->db->where('id_kelas', $id)
                        ->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran = kelas.id_mata_pelajaran')
                        ->join('guru', 'guru.id_guru = kelas.id_guru')
                        ->get('kelas')->row();
    }

    public function getBabById($id)
    {
        return $this->db->where('id_mata_pelajaran', $id)->get('bab_pelajaran')->result();
    }
}


?>