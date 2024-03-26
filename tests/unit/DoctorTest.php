<?php

require_once('admin_func.php'); 

use PHPUnit\Framework\TestCase;


class DoctorTest extends TestCase
{
    protected $dbMock;
    public function setUp(): void
    {
        $this->dbMock = Mockery::mock('Database');
    }

    public function tearDown(): void
    {
        Mockery::close();
    }
    
    public function testDeleteDoctor() {

        $this->dbMock->shouldReceive('query')->once()->andReturn(true); 
        $doctor = new Doctor($this->dbMock);

        // Dummy email of the doctor to be deleted
        $doctorEmail = 'john@example.com';

        // Calling the deleteDoctor method with dummy email
        $status = $doctor->deleteDoctor($doctorEmail);

        // Asserting the returned status message
        $this->assertEquals('Doctor removed successfully!', $status);
    }

    public function testAddDoctor()
    {
       
        $this->dbMock->shouldReceive('query')->once()->andReturn(true); 
        $doctor = new Doctor($this->dbMock);

        // Dummy doctor data
        $doctorData = [
            'doctor' => 'Dr. Amit Mishra',
            'dpassword' => 'password',
            'demail' => 'john@example.com',
            'special' => 'Cardiologist',
            'docFees' => '100'
        ];
        
         $status = $doctor->addDoctor($doctorData);

         $this->assertEquals('Doctor added successfully!', $status);
    }

    
}