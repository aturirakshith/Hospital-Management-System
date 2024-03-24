<?php

use PHPUnit\Framework\TestCase;
use Mockery as m;


class AdminAuthenticationTest extends TestCase
{

    public function testAuthenticateWithValidCredentials()
    {
        include_once('admin_func.php');
        $dbMock = m::mock('Database');
        $resultMock = m::mock('mysqli_result');
       
        $dbMock->shouldReceive('query')
            ->with("SELECT * FROM admintb WHERE username='username' AND password='password';")
            ->once()
            ->andReturn($resultMock);
      
            $dbMock->shouldReceive('num_rows')
            ->with($resultMock)
            ->once()
            ->andReturn(1);

        $adminAuthenticator = new AdminAuthentication($dbMock);

        $this->assertTrue($adminAuthenticator->authenticate('username', 'password'));
    }

    public function testAuthenticateWithInValidCredentials()
    {
        include_once('admin_func.php');
        $dbMock = m::mock('Database');
        $resultMock = m::mock('mysqli_result');
       
        $dbMock->shouldReceive('query')
            ->with("SELECT * FROM admintb WHERE username='username' AND password='password';")
            ->once()
            ->andReturn($resultMock);
      
            $dbMock->shouldReceive('num_rows')
            ->with($resultMock)
            ->once()
            ->andReturn(0);

        $adminAuthenticator = new AdminAuthentication($dbMock);

        $this->assertTrue(!$adminAuthenticator->authenticate('username', 'password'));
    }


  
}
