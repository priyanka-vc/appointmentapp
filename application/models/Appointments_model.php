<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Appointments_model extends CI_Model {

    public $doctor_id;
    public $patient_id;
    public $availability_id;
    public $status;
    public $created_at;

    /**
     * Get appointment list by patients
     * @param $patient_id
     * @return mixed
     */
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
            ->join('availability', 'availability.id = appointments.availability_id', 'left')
            ->join('users', 'users.id = appointments.doctor_id', 'left')
            ->get_where('appointments', [
                'patient_id' => $patient_id
            ]);
    }

    /**Get appointments list of docters
     * @param $doctor_id
     * @return mixed
     */
    public function get_appointments_of_doctor($doctor_id)
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
            ->join('users', 'users.id = appointments.patient_id', 'left')
            ->join('availability', 'availability.id = appointments.availability_id', 'left')
            ->get_where('appointments', [
                'doctor_id' => $doctor_id
            ]);
    }

    /**
     * Book appointment by patient
     * @param $availability_id
     * @param $user_id
     * @return mixed
     */
    public function book_appointment($availability_id, $user_id)
    {
        $slot = $this->db->get_where('availability', ['id' => $availability_id]);

        if($slot) {
            $slotData = $slot->row();

            $this->doctor_id = $slotData->user_id;
            $this->patient_id = $user_id;
            $this->availability_id = $availability_id;
            $this->created_at = date("Y-m-d H:i:s");


            return $this->db->insert('appointments', $this);
        }


    }
}