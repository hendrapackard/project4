<?php defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends MY_Model
{
    protected $table = ['biodata','user'];


    public function getValidationRules()
    {

        $validationRules = [
            [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required|min_length[4]|max_length[30]|callback_username_unik'
            ],
            [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|callback_is_password_required|min_length[4]|max_length[50]'
            ],
            [
                'field' => 'level',
                'label' => 'Level',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'is_verified',
                'label' => 'Verified ?',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'no_induk',
                'label' => 'No Induk',
                'rules' => 'trim|required|numeric|max_length[20]|callback_no_induk_unik'
            ],
            [
                'field' => 'nama',
                'label' => 'Nama',
                'rules' => 'trim|required|max_length[30]|callback_alpha_coma_dash_dot_space'
            ],
            [
                'field' => 'jenis_kelamin',
                'label' => 'Jenis Kelamin',
                'rules' => 'trim|required'
            ],
            [
                'field' => 'no_hp',
                'label' => 'No Handphone',
                'rules' => 'trim|required|max_length[15]|numeric'
            ],
            [
                'field' => 'id_kelas',
                'label' => 'Kelas',
                'rules' => 'trim|required'
            ],
        ];

        return $validationRules;
    }

    public function getDefaultValues()
    {
        return [
            'username' => '',
            'password' => '',
            'level' => '',
            'is_verified' => '',
            'no_induk' => '',
            'nama' => '',
            'jenis_kelamin' => '',
            'no_hp' => '',
            'id_kelas' => ''
        ];
    }

    public function getAllUser()
    {
        $sql = "  SELECT  biodata.username,
                          level,
                          biodata.no_induk,
                          biodata.nama,
                          kelas.nama_kelas,
                          user.is_verified
                  FROM   user
            INNER JOIN   biodata
            ON            (user.username = biodata.username)
            INNER JOIN    kelas
            ON            (biodata.id_kelas = kelas.id_kelas)
            ORDER BY      user.username";


        return $this->db->query($sql)->result();
    }


    function simpan_1()
    {
        $data=array(
            'username' =>$this->input->post('username'),
            'password' =>$this->input->post('password'),
            'level' =>$this->input->post('level'),
            'is_verified' =>$this->input->post('is_verified')
        );
        // Hash password
        $data['password'] = md5($data['password']);
        $this->db->insert('user', $data);
        return $this->db->insert_id();

    }
    function simpan_2()
    {
        $data=array(
            'no_induk' =>$this->input->post('no_induk'),
            'nama' =>$this->input->post('nama'),
            'jenis_kelamin' =>$this->input->post('jenis_kelamin'),
            'no_hp' =>$this->input->post('no_hp'),
            'id_kelas' =>$this->input->post('id_kelas'),
            'username' =>$this->input->post('username'),

        );
        $this->db->insert('biodata', $data);
        return $this->db->insert_id();

    }

}