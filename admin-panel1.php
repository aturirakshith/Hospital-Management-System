<?php 
require_once('database.php');
$db = new Database("localhost", "root", "", "myhmsdb");

include('newfunc.php');

if (isset($_POST['docsub'])) {
    addDoctor($db);
}

if (isset($_POST['docsub1'])) {
    deleteDoctor($db);
}

function addDoctor($db) {
    $doctor = $_POST['doctor'];
    $dpassword = $_POST['dpassword'];
    $demail = $_POST['demail'];
    $spec = $_POST['special'];
    $docFees = $_POST['docFees'];
    $query = "INSERT INTO doctb(username, password, email, spec, docFees) VALUES ('$doctor', '$dpassword', '$demail', '$spec', '$docFees')";
    $result = $db->query($query);
    if ($result) {
        echo "<script>alert('Doctor added successfully!');</script>";
    }
}

function deleteDoctor($db) {
    $demail = $_POST['demail'];
    $query = "DELETE FROM doctb WHERE email='$demail'";
    $result = $db->query($query);
    if ($result) {
        echo "<script>alert('Doctor removed successfully!');</script>";
    } else {
        echo "<script>alert('Unable to delete!');</script>";
    }
}
?>








<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <link rel="shortcut icon" type="image/x-icon" href="images/favicon.png" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="font-awesome-4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="style.css" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="vendor/fontawesome/css/font-awesome.min.css" />
    <link
      href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans&display=swap"
      rel="stylesheet"
    />
    <link
      rel="stylesheet"
      href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css"
      integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M"
      crossorigin="anonymous"
    />
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary fixed-top">
      <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous"
      />
      <a class="navbar-brand" href="#"
        ><i class="fa fa-user-plus" aria-hidden="true"></i> Global Hospital
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <script>
        var check = function () {
          if (
            document.getElementById("dpassword").value ==
            document.getElementById("cdpassword").value
          ) {
            document.getElementById("message").style.color = "#5dd05d";
            document.getElementById("message").innerHTML = "Matched";
          } else {
            document.getElementById("message").style.color = "#f55252";
            document.getElementById("message").innerHTML = "Not Matching";
          }
        };

        function alphaOnly(event) {
          var key = event.keyCode;
          return (key >= 65 && key <= 90) || key == 8 || key == 32;
        }
      </script>

      <style>
        .bg-primary {
          background: -webkit-linear-gradient(left, #3931af, #00c6ff);
        }

        .col-md-4 {
          max-width: 20% !important;
        }

        .list-group-item.active {
          z-index: 2;
          color: #fff;
          background-color: #342ac1;
          border-color: #007bff;
        }
        .text-primary {
          color: #342ac1 !important;
        }

        #cpass {
          display: -webkit-box;
        }

        #list-app {
          font-size: 15px;
        }

        .btn-primary {
          background-color: #3c50c1;
          border-color: #3c50c1;
        }
      </style>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <a class="nav-link" href="logout1.php"
              ><i class="fa fa-sign-out" aria-hidden="true"></i>Logout</a
            >
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"></a>
          </li>
        </ul>
      </div>
    </nav>
  </head>
  <style type="text/css">
    button:hover {
      cursor: pointer;
    }
    #inputbtn:hover {
      cursor: pointer;
    }
  </style>
  <body style="padding-top: 50px">
    <div class="container-fluid" style="margin-top: 50px">
      <h3
        style="
          margin-left: 40%;
          padding-bottom: 20px;
          font-family: 'IBM Plex Sans', sans-serif;
        "
      >
        WELCOME RECEPTIONIST
      </h3>
      <div class="row">
        <div class="col-md-4" style="max-width: 25%; margin-top: 3%">
          <div class="list-group" id="list-tab" role="tablist">
            <a
              class="list-group-item list-group-item-action active"
              id="list-dash-list"
              data-toggle="list"
              href="#list-dash"
              role="tab"
              aria-controls="home"
              >Dashboard</a
            >
            <a
              class="list-group-item list-group-item-action"
              href="#list-doc"
              id="list-doc-list"
              role="tab"
              aria-controls="home"
              data-toggle="list"
              >Doctor List</a
            >
            <a
              class="list-group-item list-group-item-action"
              href="#list-pat"
              id="list-pat-list"
              role="tab"
              data-toggle="list"
              aria-controls="home"
              >Patient List</a
            >
            <a
              class="list-group-item list-group-item-action"
              href="#list-app"
              id="list-app-list"
              role="tab"
              data-toggle="list"
              aria-controls="home"
              >Appointment Details</a
            >
            <a
              class="list-group-item list-group-item-action"
              href="#list-pres"
              id="list-pres-list"
              role="tab"
              data-toggle="list"
              aria-controls="home"
              >Prescription List</a
            >
            <a
              class="list-group-item list-group-item-action"
              href="#list-settings"
              id="list-adoc-list"
              role="tab"
              data-toggle="list"
              aria-controls="home"
              >Add Doctor</a
            >
            <a
              class="list-group-item list-group-item-action"
              href="#list-settings1"
              id="list-ddoc-list"
              role="tab"
              data-toggle="list"
              aria-controls="home"
              >Delete Doctor</a
            >
            <a
              class="list-group-item list-group-item-action"
              href="#list-mes"
              id="list-mes-list"
              role="tab"
              data-toggle="list"
              aria-controls="home"
              >Queries</a
            >
          </div>
          <br />
        </div>
       

        <div class="tab-pane fade" id="list-pat" role="tabpanel" aria-labelledby="list-pat-list">

<div class="col-md-8">
<form class="form-group" action="patientsearch.php" method="post">
 <div class="row">
 <div class="col-md-10"><input type="text" name="patient_contact" placeholder="Enter Contact" class = "form-control"></div>
 <div class="col-md-2"><input type="submit" name="patient_search_submit" class="btn btn-primary" value="Search"></div></div>
</form>
</div>
 
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
           <?php 

             $query = "select * from patreg";
             $result = $db->query($query);
             while ($row = $db->fetch_array($result)){
               $pid = $row['pid'];
               $fname = $row['fname'];
               $lname = $row['lname'];
               $gender = $row['gender'];
               $email = $row['email'];
               $contact = $row['contact'];
               $password = $row['password'];
               
               echo "<tr>
                 <td>$pid</td>
                 <td>$fname</td>
                 <td>$lname</td>
                 <td>$gender</td>
                 <td>$email</td>
                 <td>$contact</td>
                 <td>$password</td>
               </tr>";
             }

           ?>
         </tbody>
       </table>
 <br>
</div>


    <script
      src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
      integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"
      integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js"
      integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
      crossorigin="anonymous"
    ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/6.10.1/sweetalert2.all.min.js"></script>
  </body>
</html>


