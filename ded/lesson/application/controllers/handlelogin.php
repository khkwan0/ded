<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class HandleLogin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('usersmodel');
        $this->load->helper('url');
    }

    public function index() {
        $this->load->view('html_header');
        $email = $this->input->post('email');
        $pass = $this->input->post('pass');
        if ($user_id = $this->usersmodel->verify($email, $pass)) {
            $this->session->set_userdata('user_id', $user_id);
            $issue_id = $this->usersmodel->getProgress($user_id);
            redirect('/teach/unit/'.$issue_id, 302);
        } else {
            $this->load->view('welcome_message');
        }
        $this->load->view('html_footer');
    }
}
