<?php
use PHPUnit\Framework\TestCase;

class AdminPanelTest extends TestCase
{
  

    public function testPatientList()
    {
        // Mock patient data from the database
        $patientData = [
            ['pid' => 1, 'fname' => 'John', 'lname' => 'Doe', 'gender' => 'Male', 'email' => 'john@example.com', 'contact' => '1234567890', 'password' => 'password1'],
            ['pid' => 2, 'fname' => 'Jane', 'lname' => 'Doe', 'gender' => 'Female', 'email' => 'jane@example.com', 'contact' => '9876543210', 'password' => 'password2'],
        ];


         $dbMock = Mockery::mock('Database');
         $resultMock = Mockery::mock('mysqli_result');
         
        // Mock the query result for fetching patient data
         $dbMock->shouldReceive('getConnection')->once()->andReturn('mocked_connection');
         $dbMock->shouldReceive('query')->once()->andReturn($resultMock);
         $dbMock->shouldReceive('fetch_array')->times(3)->andReturn(...$patientData);


        // Include the PHP file to execute the logic
        include('admin-panel1.php');

        // Assert that the patient list table contains the expected data
        $this->expectOutputString('
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Patient ID</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Email</th>
                        <th scope="col">Contact</th>
                        <th scope="col">Password</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>1</td><td>John</td><td>Doe</td><td>Male</td><td>john@example.com</td><td>1234567890</td><td>password1</td></tr>
                    <tr><td>2</td><td>Jane</td><td>Doe</td><td>Female</td><td>jane@example.com</td><td>9876543210</td><td>password2</td></tr>
                </tbody>
            </table>
        ');
    }

    // Similarly, write test methods for doctor list and appointment details
}
?>
