<?php 

class Materi_model extends CI_Model
{
  public function __construct()
  {
    parent::__construct();
  }

  public function getMateryById($id)
  {
    return $query = $this->db->where('id_bab_pelajaran', $id)->get('materi_pelajaran')->result();
  }

  public function getMateriByBabId($id, $jenis)
  {
    $query = $this->db->where('materi_pelajaran.id_bab_pelajaran', $id)
                      ->where('materi_pelajaran.jenis_materi', $jenis)
                      ->join('bab_pelajaran', 'bab_pelajaran.id_bab_pelajaran = materi_pelajaran.id_bab_pelajaran')
                      ->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran = bab_pelajaran.id_mata_pelajaran')
                      ->get('materi_pelajaran');

    return $query->row();
  }

  public function getBab($id)
  {
    return $this->db->where('id_bab_pelajaran', $id)->join('mata_pelajaran', 'mata_pelajaran.id_mata_pelajaran = bab_pelajaran.id_mata_pelajaran')->get('bab_pelajaran')->row();
  }
}

?>