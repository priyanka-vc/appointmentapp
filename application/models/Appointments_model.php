<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointments_model extends CI_Model {

    public $doctor_id;
    public $patient_id;
    public $availability_id;
    public $status;
    public $created_at;

    public function add($user_id, $date, $from, $to)
    {
        $this->user_id      = 1;
        $this->date         = $date;
        $this->from_time    = $from;
        $this->to_time      = $to;
        $this->created_at =  date("Y-m-d H:i:s");

        return $this->db->insert('availability', $this);
    }

    public function get_appointments_of_patient($patient_id)
    {
        return $this->db
            ->select([
                'appointments.*',
                'users.first_name',
                'users.last_name',
                'availability.from_time',
                'availability.to_time',
                'availability.date',
            ])
            ->join('users', 'users.id = appointments.doctor_id', 'left')
            ->join('availability', 'availability.id = appointments.availability_id', 'left')
            ->get_where('appointments', [
                'patient_id' => $patient_id
            ]);
    }
}