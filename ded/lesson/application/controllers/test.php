<?php

class Test extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->model('questionsmodel');
        $this->load->helper('url');
    }

    public function index() {
    }

    public function admin() {
        $questions = $this->questionsmodel->getQuestions();
        $this->load->view('html_header');
        $this->load->view('test_admin', array('questions'=>$questions));
        $this->load->view('html_footer');
    }

    public function quiz($unit = 0) {
        if ($user_id = $this->session->userdata('user_id')) {
            $this->load->model('answersmodel');
            $this->load->model('usersmodel');
            if ($this->usersmodel->validQuiz($unit, $user_id)) {
                if ($unit && is_numeric($unit)) {
                    $questions = $this->questionsmodel->getQuestionsByUnit($unit);
                    if (isset($questions) && count($questions)) {
                        foreach($questions as $question_id=>$question) {
                            $questions[$question_id]['answers'] = $this->answersmodel->getAnswers($question_id);
                        }
                    }
                    $is_final = ($unit == 69)?true:false;
                    $this->load->view('html_header');
                    $this->load->view('quiz', array('questions'=>$questions, 'unit'=>$unit, 'is_final'=>$is_final));
                    $this->load->view('html_footer');
                }
            }
        } else {
            redirect('/', 302);
        }
    }
}
