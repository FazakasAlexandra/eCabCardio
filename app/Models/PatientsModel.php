<?php

namespace App\Models;

use CodeIgniter\Model;
use App\Models\CountysModel;
use App\Models\CitysModes;

class PatientsModel extends Model
{
    public function __construct()
	{
        $this->db = \Config\Database::connect();
		$this->builder = $this->db->table('patients');
        $this->countysModel = new CountysModel();
        $this->citysModel = new CitysModel();
	}

    public function getPatients($offset, $order)
    {
        return [
            'records' => $this->builder->countAll(),
            'patients' => $this->builder->orderBy('name', $order)->get(5, $offset)->getResult('array')
        ];
    }

    public function search($searchList)
    {
        return $this->builder->where($searchList)->get()->getResult('array');
    }

    public function getSingle($patientId)
    {

        $patient = $this->builder->where('id', $patientId)->get()->getRowObject();

        $patientCity = $this->citysModel->getSingle($patient->city_id);
        $patientCounty = $this->countysModel->getSingle($patientCity->county_id);

        $patient->city = $patientCity->city;
        $patient->county = $patientCounty->county;

        return $patient;
    }
}
