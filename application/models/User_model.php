<?php 

class User_model extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function login($email, $password)
    {
        $query = $this->db->where('email', $email)->get('user');
        if ($query->num_rows() > 0) {
            $md5 = md5($password);
            $match = $this->db->where('email', $email)->where('password', $md5)->get('user');
            if ($match->num_rows() > 0) {
                return 1;
            } else {
                return 2;
            }
        } else {
            return 3;
        }
    }

    public function insert($data)
    {
        $email = $this->db->where('email', $data['email'])->get('user')->num_rows();
        if ($email > 0) {
            return FALSE;
        } else {
            $userdata = [
                "email" => $data['email'],
                "password" => $data['password'],
                "role_id" => 3
            ];
            return $this->db->insert('user', $userdata);
        }
    }

    public function insertSiswa($data)
    {
        $email = $this->db->where('email', $data['email'])->get('siswa')->num_rows();
        if ($email > 0) {
            return FALSE;
        } else {
            $userdata = [
                "nis" => $data['nis'],
                "email" => $data['email'],
                "nama_siswa" => $data['nama_siswa']
            ];
            return $this->db->insert('siswa', $userdata);
        }
    }

    public function getUserByEmail($email)
    {
        $query = $this->db->where('email', $email)->get('user')->row();

        $detail;
        if ($query->role_id == 3) {
            $detail = $this->db->where('email', $email)
                            ->join('role', 'role.id_role = '.$query->role_id)
                            ->get('siswa')
                            ->row();
        }
        else if ($query->role_id == 2){
            $detail = $this->db->where('email', $email)
                            ->join('role', 'role.id_role = '.$query->role_id)
                            ->get('guru')
                            ->row();
        }

        return $detail;
    }

    public function getAllUser()
    {
        return $this->db->get('user');
    }
}

?>