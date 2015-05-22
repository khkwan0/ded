<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('LessonsModel');
    }

    public function index() {
        $lessons = $this->LessonsModel->getLessons();
        $this->load->view('html_header');
        $this->load->view('admin', array('lessons'=>$lessons));
        $this->load->view('html_footer');
    }
}
