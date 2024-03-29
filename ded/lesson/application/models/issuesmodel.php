<?php

class IssuesModel extends CI_Model {
    public function getIssues($unit = 0, $section = '') {
        $issues = array();
        if (is_numeric($unit)) {
            $this->db->where('unit', $unit);
            $this->db->where('section', $section);
            $this->db->from('issues');
            $query = $this->db->get();
            if ($query && $query->result()) {
                foreach ($query->result() as $row) {
                    $issues[$row->issue] = $row;
                }
            }
        }
        return $issues;
    }

    public function getUnit($unit = 0) {
        $unit_data = array();
        if (is_numeric($unit)) {
            $this->db->where('unit', $unit);
            $this->db->order_by('id','asc');
            $this->db->from('issues');
            $query = $this->db->get();
            if ($query && $query->result()) {
                foreach ($query->result() as $row) {
                    $unit_data[] = $row;
                }
            }
        }
        return $unit_data;
    }

    public function getSlides($issue_id = 0) {
        $issues = array();
        $this->db->from('issues');
        $this->db->where('id >=', $issue_id);
        $this->db->order_by('id','asc');
        $this->db->limit(2);
        $query = $this->db->get();
        if ($query && $query->result()) {
            foreach ($query->result() as $row) {
                $issues[] = $row;
            }
        }
        return $issues;
    }

    public function getPrevious($issue_id = 0) {
        $prev_id = 0;
        if ($issue_id) {
            $this->db->select('id');
            $this->db->from('issues');
            $this->db->where('id <', $issue_id);
            $this->db->order_by('id','desc');
            $this->db->limit(1);
            $query = $this->db->get();
            if ($query && $query->result()) {
                $res = $query->result();
                $prev_id = $res[0]->id;
            }
        }
        return $prev_id;
    }
}
