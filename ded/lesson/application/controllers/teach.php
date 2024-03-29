<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teach extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $user_id = $this->session->userdata('user_id');
        $this->load->helper('url');
        if (!$user_id) {
            $this->load->view('html_header');
            $this->load->view('welcome_message');
            $this->load->view('html_footer');
        }
    }

    public function unit($issue_id = 0) {
        $user_id = $this->session->userdata('user_id');
        $at_end = false;
        if (is_numeric($issue_id) && $user_id) {
            $this->load->model('usersmodel');
            $this->load->model('issuesmodel');

            $progress = $this->usersmodel->getProgress($user_id);
            if ($issue_id > $progress) {
                $issue_id = $progress;
            }
            $prev_id = $this->issuesmodel->getPrevious($issue_id);
            $issues = $this->issuesmodel->getSlides($issue_id);
            if (!isset($issues[1]->id)) {  // there is no next unit, no more lessons...time for final test
                $this->usersmodel->updateQuizProgress($user_id, 69);  // 69 is the magic number to denote the final exam
                $at_end = true;
            } else if ($issues[1]->id > $progress) {
                $this->usersmodel->updateProgress($user_id, $issues[1]->id);
            }
            if (isset($issues[1]) && $issues[1]->unit != $issues[0]->unit) {
                $this->usersmodel->updateQuizProgress($user_id, $issues[0]->unit);
                redirect('/test/quiz/'.$issues[0]->unit, 302);
            }
            $css = array('lesson.css');
            $random_background = $this->getRandomBackground();
            $user_info = $this->usersmodel->getUserInfo($user_id);
            $email = $user_info['email'];

            $this->load->view('html_header', array('css'=>$css, 'background'=>$random_background));
            $this->load->view('teach', array('user_id'=>$user_id, 'issues'=>$issues, 'prev_id'=>$prev_id, 'at_end'=>$at_end, 'email'=>$email));
            $this->load->view('html_footer');
        } else {
            redirect('/',302);
        }
    }

    private function getRandomBackground() {
        $dir = '/home/ken/public_html/ded/lesson/assets/img/lesson';
        $files = scandir($dir,1);
        return $files[rand(1, count($files)-2)];
    }
}
