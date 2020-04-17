<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Availability_model extends CI_Model {

    public $user_id;
    public $date;
    public $from_time;
    public $to_time;

    public function add($user_id, $date, $from, $to)
    {
        $this->user_id      = $user_id;
        $this->date         = $date;
        $this->from_time    = $from;
        $this->to_time      = $to;
        $this->created_at =  date("Y-m-d H:i:s");

        return $this->db->insert('availability', $this);
    }

    public function get_todays_available_slots()
    {
        return $this->db
            ->select([
                'availability.*',
                'appointments.doctor_id',
                'appointments.patient_id',
                'appointments.availability_id',
                'appointments.status',
                'users.first_name',
                'users.last_name'
            ])
            ->join('users', 'users.id = availability.user_id', 'left')
            ->join('appointments', 'appointments.availability_id = availability.id', 'left')
            ->get_where('availability', [
                'date' => date('Y-m-d'),
                'availability_id' => NULL
            ]);
    }

    public function get_todays_available_slots_of_doctor($doctor_id)
    {
        return $this->db
            ->select([
                'availability.*',
                'appointments.doctor_id',
                'appointments.patient_id',
                'appointments.availability_id',
                'appointments.status',
                'users.first_name',
                'users.last_name'
            ])
            ->join('users', 'users.id = availability.user_id', 'left')
            ->join('appointments', 'appointments.availability_id = availability.id', 'left')
            ->get_where('availability', [
                'date' => date('Y-m-d'),
                'availability_id' => NULL,
                'user_id' => $doctor_id,
            ]);
    }
}