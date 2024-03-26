<?php

use PHPUnit\Framework\TestCase;
use Mockery as m;
include_once('admin_func.php');

class AdminAuthenticationTest extends TestCase
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

    public function testAuthenticateWithValidCredentials()
    {
        
        $resultMock = m::mock('mysqli_result'); 
       
        $this->dbMock->shouldReceive('query')
            ->with("SELECT * FROM admintb WHERE username='username' AND password='password';")
            ->once()
            ->andReturn($resultMock);
      
        $this->dbMock->shouldReceive('num_rows')
            ->with($resultMock)
            ->once()
            ->andReturn(1);

        $adminAuthenticator = new AdminAuthentication($this->dbMock);

        $this->assertTrue($adminAuthenticator->authenticate('username', 'password'));
    }

    public function testAuthenticateWithInValidCredentials()
    {
      
        
        $resultMock = m::mock('mysqli_result');
       
        $this->dbMock->shouldReceive('query')
            ->with("SELECT * FROM admintb WHERE username='username' AND password='password';")
            ->once()
            ->andReturn($resultMock);
      
            $this->dbMock->shouldReceive('num_rows')
            ->with($resultMock)
            ->once()
            ->andReturn(0);

        $adminAuthenticator = new AdminAuthentication($this->dbMock);

        $this->assertTrue(!$adminAuthenticator->authenticate('username', 'password'));
    }


  
}
