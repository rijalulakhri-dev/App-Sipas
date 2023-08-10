<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function select_login($email, $password) {
        $this->db->where('email', $email);
        $this->db->where('password', $password);
        return $this->db->get('tb_pengguna')->row();
    }

    function login($username,$password)
    {
        $query = $this->db->query("SELECT * FROM tb_pengguna WHERE username='$username' LIMIT 1");
        return $query;
    }

}

/* End of file ModelName.php */
?>