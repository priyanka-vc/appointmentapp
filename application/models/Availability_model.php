<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Availability_model extends CI_Model {

    public $user_id;
    public $date;
    public $from_time;
    public $to_time;

    public function add($user_id, $date, $from, $to)
    {
        $this->user_id      = 1;
        $this->date         = $date;
        $this->from_time    = $from;
        $this->to_time      = $to;
        $this->created_at =  date("Y-m-d H:i:s");

        return $this->db->insert('availability', $this);
    }
}