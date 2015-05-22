<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class UsersModel extends CI_Model {

    public function register($email = '', $pass = '') {
        $rv = 0;
        if ($email && $pass) {
            $data = array(
                    'id'            =>  0,
                    'email'         =>  $email,
                    'password'      =>  $pass,
                    'progress'      =>  '',
                    'preferences'   =>  '',
                    );
            $query = $this->db->insert('users', $data);
            $rv = $this->db->insert_id();
        }
        return $rv;
    }

    public function verify($email = '', $pass = '') {
        $rv = 0;
        if ($email && $pass) {
            $this->db->from('users');
            $this->db->where('email', $email);
            $this->db->where('password', $pass);
            $query = $this->db->get();
            if ($query && $query->result()) {
                $res = $query->result();
                $row = $res[0];
                $rv = $row->id;  // user id
            } 
        }
        return $rv;
    }

    public function getProgress($user_id = 0) {
        $current_issue_id = 0;
        if ($user_id) {
            $this->db->select('progress');
            $this->db->from('users');
            $this->db->where('id',$user_id);
            $query = $this->db->get();
            if ($query && $query->result()) {
                $res = $query->result();
                $current_issue_id = $res[0]->progress;
            }
        }
        return $current_issue_id;
    }

    public function updateProgress($user_id = 0, $issue_id = 0) {
        if ($issue_id && $user_id) {
            $data = array('progress'=>$issue_id);
            $this->db->where('id', $user_id);
            $this->db->update('users', $data);
        }
    }

    public function updateQuizProgress($user_id = 0, $unit = 0) {
        if ($unit) {
            $data = array('quiz_entry'=>$unit);
            $this->db->where('id', $user_id);
            $this->db->update('users', $data);
        }
    }

    public function getQuizProgress($user_id = 0) {
        $quiz_id = 0;
        if ($user_id) {
            $this->db->from('users');
            $this->db->where('id', $user_id);
            $query = $this->db->get();
            if ($query && $query->result()) {
                $res = $query->result();
                $quiz_id = $res[0]->quiz_entry;
            }
        }
        return $quiz_id;
    }

    public function validQuiz($unit = 0, $user_id = 0) {
        $rv = false;
        if ($unit && $user_id) {
            $quiz_prog = $this->getQuizProgress($user_id);
            if ($quiz_prog >= $unit) {
                $rv = true;
            }
        }
        return $rv;
    }
    
    public function passFinal($user_id = 0) {
        if ($user_id ) {
            $this->db->from('users');
            $this->db->where('id', $user_id);
            $query = $this->db->get();
            if (isset($query) && count($query->results)) {
                $data = array('passed_final'=>1, 'date_passed'=>date('Y-m-d H:i:s', time()));
                $this->db->where('id', $user_id);
                $this->db->update('users', $data);
            }
        }
    }

    public function getUserInfo($user_id = 0) {
        $rv = null;
        if ($user_id) {
            $this->db->from('users');
            $this->db->where('id', $user_id);
            $query = $this->db->get();
            if ($query && $query->result()) {
                foreach ($query->result() as $row) {
                    $rv['email'] = $row->email;
                }
            }
        }
        return $rv;
    }

}
