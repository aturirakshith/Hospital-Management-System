<?php
use PHPUnit\Framework\TestCase;
class AdminPanelTest extends TestCase
{
    protected $mockDb;

    public function setUp(): void
    {
        $this->mockDb = Mockery::mock('Database');
    }

    public function tearDown(): void
    {
        Mockery::close();
    }
    
    public function testGetPatientList()
    {
        include_once('admin-panel1.php');
        $adminPanel = new AdminPanel($this->mockDb);

        $this->mockDb->shouldReceive('query')
            ->once()
            ->with("select * from patreg")
            ->andReturn('fake_result');

        $result = $adminPanel->getPatientList();
        $this->assertEquals('fake_result', $result);
    }

    public function testGetDoctorsList()
    {
        $adminPanel = new AdminPanel($this->mockDb);

        $this->mockDb->shouldReceive('query')
            ->once()
            ->with("select * from doctb")
            ->andReturn('fake_result');

        $result = $adminPanel->getDoctorsList();
        $this->assertEquals('fake_result', $result);
    }


    public function testGetAppointmentDetailsList()
    {
        $adminPanel = new AdminPanel($this->mockDb);

        $this->mockDb->shouldReceive('query')
            ->once()
            ->with("select * from appointmenttb")
            ->andReturn('fake_result');

        $result = $adminPanel->getAppointmentDetailsList();
        $this->assertEquals('fake_result', $result);
    }

    public function testGetPrescriptionList()
    {
        $adminPanel = new AdminPanel($this->mockDb);

        $this->mockDb->shouldReceive('query')
            ->once()
            ->with("select * from prestb")
            ->andReturn('fake_result');

        $result = $adminPanel->getPrescriptionList();
        $this->assertEquals('fake_result', $result);
    }

    public function testGetQueriesList()
    {
        $adminPanel = new AdminPanel($this->mockDb);

        $this->mockDb->shouldReceive('query')
            ->once()
            ->with("select * from contact")
            ->andReturn('fake_result');

        $result = $adminPanel->getQueriesList();
        $this->assertEquals('fake_result', $result);
    }
}

