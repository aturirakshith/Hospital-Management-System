<?php

include('database.php');

class AdminAuthentication
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    
    public function authenticate($username, $password)
    {
        $query = "SELECT * FROM admintb WHERE username='$username' AND password='$password';";
        $result = $this->db->query($query);
        return  $this->db->num_rows($result) == 1;
    }
}

class AppointmentUpdater
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function updateAppointment($contact, $status)
    {
        $query = "UPDATE appointmenttb SET payment='$status' WHERE contact='$contact';";
        return $this->db->query($query);
    }
}

class Doctor
{
    private $db;

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function addDoctor($name)
    {
        $query = "INSERT INTO doctb(name) VALUES('$name')";
        $result = $this->db->query($query);
        if ($result) {
            return 'Doctor added successfully!';
        } else {
            return 'Unable to Add';
        }
    }
    public function deleteDoctor($email) {
        $query = "delete from doctb where email='$email'";
        $result = $this->db->query($query);

        if ($result) {
            return 'Doctor removed successfully!';
        } else {
            return 'Unable to delete doctor!';
        }
    }

    public function displayDoctors()
    {
        $query = "SELECT * FROM doctb";
        $result = $this->db->query($query);
        $options = '';
        while ($row = mysqli_fetch_array($result)) {
            $name = $row['name'];
            $options .= '<option value="' . $name . '">' . $name . '</option>';
        }
        return $options;
    }
}

session_start();

$db = new Database("localhost", "root", "", "myhmsdb");
$adminAuthenticator = new AdminAuthentication($db);
$appointmentUpdater = new AppointmentUpdater($db);
$doctor = new Doctor($db);

if (isset($_POST['adsub'])) {
    $username = $_POST['username1'];
    $password = $_POST['password2'];

    if ($adminAuthenticator->authenticate($username, $password)) {
        $_SESSION['username'] = $username;
        header("Location: admin-panel1.php");
    } else {
        echo ("<script>alert('Invalid Username or Password. Try Again!');
          window.location.href = 'index.php';</script>");
    }
}

if (isset($_POST['update_data'])) {
    $contact = $_POST['contact'];
    $status = $_POST['status'];

    if ($appointmentUpdater->updateAppointment($contact, $status)) {
        header("Location: updated.php");
    }
}

if (isset($_POST['doc_sub'])) {
    $name = $_POST['name'];

    if ($doctor->addDoctor($name)) {
        header("Location: adddoc.php");
    }
}
