<?php 
session_start();
ini_set('display_errors', 'Off');
include 'server_connection/db_conn.php';
if(!empty($_SESSION["id"])){
    $id = $_SESSION["id"];
    $result = mysqli_query($con, "SELECT * FROM login WHERE id = $id");
    $row = mysqli_fetch_assoc($result);
  }
  else{
    header("Location: /login.php");
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Request Form</title>
  <link rel="stylesheet" href="sidebar.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>



</head>
<body>
  <div class="container">
  <nav>
      <ul>
        <li>
          <a href="#" class="logo">
            <img src="Images/res.jpeg">
            <span class="nav-item">GSO 
          </a>
        </li>
        <li>
          <a href="Profile.php">
            <i class="fas fa-user"></i>
            <span class="nav-item">My Account</span>
          </a>
        </li>
        <li>
          <a href="Form.php">
            <i class="fas fa-fill-drip"></i>
            <span class="nav-item">Form</span>
          </a>
        </li>
        <li>
          <a href="Form-edit.php">
            <i class="fas fa-edit"></i>
            <span class="nav-item">Edit</span>
          </a>
        </li>
        <li>
          <a href="Request.php">
            <i class="fas fa-paper-plane"></i>
            <span class="nav-item">Request</span>
          </a>
        </li>
        <li>
          <a href="Data Analytics.php">
            <i class="fas fa-eye"></i>
            <span class="nav-item">Analytics</span>
          </a>
        </li>
        <li>
          <a href="/log-out.php">
            <i class="fas fa-arrow-circle-left"></i>
            <span class="nav-item">Logout</span>
          </a>
        </li>
    </ul>
  </nav>
    <section class="main">
                  <div class="page">
                        <h1>Edit Request</h1>
                  </div>
    <div class="main-content">
            <form action="Actions.php" method="POST">
              <input type="hidden" value="<?= $row['id']; ?>" name="id" >
              <input type="hidden" value="<?= $row['name']; ?>" name="name" >
              
              <label for="">Date of Arrival</label>
              <input type="text" value="<?= $row['date_arrival']; ?>" name="date_arrival" >

              <label for="">Time of Arrival</label>
              <input type="text" value="<?= $row['time_arrival']; ?>" name="time_arrival" >

              <label for="">Date of Departure</label>
              <input type="text" value="<?= $row['date_departure']; ?>" name="date_departure" >

              <label for="">Time of Departure</label>
              <input type="text" value="<?= $row['time_departure']; ?>" name="time_departure" >

              <label for="">Name of Passangers</label>
              <input type="text" value="<?= $row['passangers']; ?>" name="passangers" >

              <label for="">Place to be visited</label>
              <input type="text" value="<?= $row['visited']; ?>" name="visited" >

              <label for="">Purpose of Travel</label>
              <input type="text" value="<?= $row['letter']; ?>" name="letter" ><br><br>


              <b>Your Choosen Car: </b><strong> <?= $row['Vehicle']; ?></strong><br>
                        <?php
                        $query = "SELECT * FROM available";
                        $query_run = mysqli_query($con, $query);

                        if(mysqli_fetch_assoc($query_run) > 0)
                        {
                        foreach($query_run as $row)
                        {
                        ?>
                      <div class="vehicles">
                            <div class="radio1">
                                    <input type="radio" name="Vehicle" value="Toyota Hiace" >
                                      <label for="html">Toyota Hiace</label>
                                    <div class="crd">
                                      <img src="Images/hiace.png" alt="Avatar" class="img">
                                      <div class="ctn"><h4><b>Available</b></h4> 
                                        <p>
                                        <b><h3><?=$row['Hiace'];?></h3></b>
                                        </p>
                                      </div>
                                    </div>
                                    <br>
                                    <input type="radio" name="Vehicle" value="Toyota Hilux" >
                                      <label for="html">Toyota Hilux</label>
                                    <div class="crd">
                                      <img src="Images/hilux.png" alt="Avatar" class="img">
                                      <div class="ctn"><h4><b>Available</b></h4> 
                                        <p>
                                        <b><h3><?=$row['Hilux'];?></h3></b>
                                        </p>
                                      </div>
                                    </div><br>
                                    <input type="radio" name="Vehicle" value="Isuzu DI N944" >
                                    <label for="html">Isuzu DI N944</label>
                                    <div class="crd">
                                      <img src="Images/isuzu.jpg" alt="Avatar" class="img">
                                    <div class="ctn"><h4><b>Available</b></h4> 
                                       <p>
                                        <b><h3><?=$row['Isuzu'];?></h3></b>
                                      </p>                                      
                                    </div>
                                  </div>
                                  <br>
                                    <input type="radio" name="Vehicle" value="Multi Cab" >
                                    <label for="html">Multi Cab</label>
                                    <div class="crd">
                                      <img src="Images/multi.jpg" alt="Avatar" class="img">
                                      <div class="ctn"><h4><b>Available</b></h4> 
                                      <p>
                                        <b><h3><?=$row['Multi'];?></h3></b>
                                        </p>
                                      </div>
                                    </div><br>
                                    <input type="radio" name="Vehicle" value="Innova" >
                                    <label for="html">Inova</label>
                                    <div class="crd">
                                      <img src="Images/innova.png" alt="Avatar" class="img">
                                      <div class="ctn"><h4><b>Available</b></h4> 
                                      <p>
                                        <b><h3><?=$row['Innova'];?></h3></b>
                                        </p>
                                      </div>
                                    </div><br>
                      </div>
                      <div class="radio2">
                                    <input type="radio" name="Vehicle" value="Jinbie Truck" >
                                    <label for="html">Jinbie Truck</label>
                                    <div class="crd">
                                      <img src="Images/jinbie.jpg" alt="Avatar" class="img">
                                      <div class="ctn"><h4><b>Available</b></h4> 
                                      <p>
                                        <b><h3><?=$row['Jinbie'];?></h3></b>
                                        </p>
                                      </div>
                                    </div><br>
                                    <input type="radio" name="Vehicle" value="Foton Truck" >
                                    <label for="html">Foton Truck</label>
                                    <div class="crd">
                                      <img src="Images/foton.png" alt="Avatar" class="img">
                                      <div class="ctn"><h4><b>Available</b></h4> 
                                      <p>
                                        <b><h3><?=$row['Foton'];?></h3></b>
                                        </p>
                                      </div>
                                    </div><br>
                                    <input type="radio" name="Vehicle" value="Foton Truck Tornado" >
                                    <label for="html">Foton Truck Tornado</label>
                                    <div class="crd">
                                      <img src="Images/tornado.jpg" alt="Avatar" class="img">
                                      <div class="ctn"><h4><b>Available</b></h4> 
                                      <p>
                                        <b><h3><?=$row['Tornado'];?></h3></b>
                                        </p>
                                      </div>
                                    </div><br>
                                    <input type="radio" name="Vehicle" value="Commuter" >
                                    <label for="html">Commuter</label>
                                    <div class="crd">
                                      <img src="Images/commuter.jpg" alt="Avatar" class="img">
                                      <div class="ctn"><h4><b>Available</b></h4> 
                                      <p>
                                        <b><h3><?=$row['Commuter'];?></h3></b>
                                        </p>
                                      </div>
                                    </div><br>
                            </div>
                      </div>
                          <?php
                    }
                  }
              else
              {
                  echo "<h5> No Available Vehicle </h5>";
              }
              ?>                 
                      <br><br>
                    <b>Your Driver: </b><strong> <?= $row['Driver']; ?></strong>
                <select name="Driver">
                            <option value="<?= $row['Driver']; ?>">Choose your Driver</option>
                            <option value="Johnel Reyes">Johnel Reyes</option>
                            <option value="Wilmer Bongar">Wilmer Bongar</option>
                            <option value="Ryan Onnel Corpuz">Ryan Onnel Corpuz</option>
                            <option value="Alfred Raquepo">Alfred Raquepo</option>
                            <option value="Rickynor Rey Varona">Rickynor Rey Varona</option>
                            <option value="Regie Navarra">Regie Navarra</option>
                            <option value="Joseph Tomandoc">Joseph Tomandoc</option>
                            <option value="Jerome Navarza">Jerome Navarza</option>
                            <option value="Mamerto Domondon">Mamerto Domondon</option>
                            <option value="Rommell Pamosino">Rommell Pamosino</option>
                            <option value="Jeremy Steve Bongar">Jeremy Steve Bongar</option>
                  </select>
                <input type="hidden" value="pending.." name="request" >

              <input type="submit" name="form_edit" value="SUBMIT">
            </form>
    </div>
</section>
</body>
</html>