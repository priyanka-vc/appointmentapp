<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Availability extends CI_Model {

    public $user_id;
    public $date;
    public $from_time;
    public $to_time;

    public function add($user_id, $date, $from, $to)
    {
        $this->user_id      = $user_id;
        $this->date         = $date;
        $this->from_time    = $from_time;
        $this->to_time      = $to_time;

        $this->db->insert('availability', $this);
    }
}