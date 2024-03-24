<?php

require_once('admin_func.php'); 

use PHPUnit\Framework\TestCase;


class DoctorTest extends TestCase
{
    public function testDeleteDoctor() {

        // Mocking the database object
        $dbMock = Mockery::mock('Database');
        $dbMock->shouldReceive('query')->once()->andReturn(true); 
        $doctor = new Doctor($dbMock);

        // Dummy email of the doctor to be deleted
        $doctorEmail = 'john@example.com';

        // Calling the deleteDoctor method with dummy email
        $status = $doctor->deleteDoctor($doctorEmail);

        // Asserting the returned status message
        $this->assertEquals('Doctor removed successfully!', $status);
    }

    public function testAddDoctor()
    {
        $dbMock = Mockery::mock('Database');
        $dbMock->shouldReceive('query')->once()->andReturn(true); 

        $doctor = new Doctor($dbMock);

        // Dummy doctor data
        $doctorData = [
            'doctor' => 'Dr. John Doe',
            'dpassword' => 'password',
            'demail' => 'john@example.com',
            'special' => 'Cardiologist',
            'docFees' => '100'
        ];
        
         $status = $doctor->addDoctor($doctorData);

         $this->assertEquals('Doctor added successfully!', $status);
    }

    
}