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
                        <h1>Reservation Form</h1>
                  </div>
          <div class="main-content">
                  <form action="Actions.php" method="POST">


                     <?php if (isset($_GET['error'])) { ?><div class="error">   <?php echo $_GET['error']; ?></div><?php } ?>


                      <input type="hidden" value="<?= $row['id']; ?>" name="id" >
                      <input type="hidden" value="<?= $row['name']; ?>" name="name" >
                      <label for="">Date of Arrival</label>
                      <?php if (isset($_GET['date_arrival'])) { ?><input type="text" name="date_arrival" value="<?php echo $_GET['date_arrival']; ?>">
                        <?php }else{ ?><input type="text" name="date_arrival"><?php }?>
                      <?php if (isset($_GET['date_arrival_Err'])) { ?>
                                      <div class="error"><?php echo $_GET['date_arrival_Err']; ?></div>
                          <?php } ?><br>

                      <label for="">Time of Arrival</label>
                      <?php if (isset($_GET['time_arrival'])) { ?><input type="text" name="time_arrival" value="<?php echo $_GET['time_arrival']; ?>">
                        <?php }else{ ?><input type="text" name="time_arrival"><?php }?>
                      <?php if (isset($_GET['time_arrival_Err'])) { ?>
                                      <div class="error"><?php echo $_GET['time_arrival_Err']; ?></div>
                          <?php } ?><br>

                      <label for="">Date of Departure</label>
                      <?php if (isset($_GET['date_departure'])) { ?><input type="text" name="date_departure" value="<?php echo $_GET['date_departure']; ?>">
                        <?php }else{ ?><input type="text" name="date_departure"><?php }?>
                      <?php if (isset($_GET['date_departure_Err'])) { ?>
                                      <div class="error"><?php echo $_GET['date_departure_Err']; ?></div>
                          <?php } ?><br>

                      <label for="">Time of Departure</label>
                      <?php if (isset($_GET['time_departure'])) { ?><input type="text" name="time_departure" value="<?php echo $_GET['time_departure']; ?>">
                        <?php }else{ ?><input type="text" name="time_departure"><?php }?>
                      <?php if (isset($_GET['time_departure_Err'])) { ?>
                                      <div class="error"><?php echo $_GET['time_departure_Err']; ?></div>
                          <?php } ?><br>

                      <label for="">Name of Passangers</label>
                      <?php if (isset($_GET['passangers'])) { ?><input type="text" name="passangers" value="<?php echo $_GET['passangers']; ?>">
                        <?php }else{ ?><input type="text" name="passangers"><?php }?>
                      <?php if (isset($_GET['passangers_Err'])) { ?>
                                      <div class="error"><?php echo $_GET['passangers_Err']; ?></div>
                          <?php } ?><br>

                      <label for="">Place to be visited</label>
                      <?php if (isset($_GET['visited'])) { ?><input type="text" name="visited" value="<?php echo $_GET['visited']; ?>">
                        <?php }else{ ?><input type="text" name="visited"><?php }?>
                      <?php if (isset($_GET['visited_Err'])) { ?>
                                      <div class="error"><?php echo $_GET['visited_Err']; ?></div>
                          <?php } ?><br>

                      <label for="">Purpose of Travel</label>
                      <?php if (isset($_GET['letter'])) { ?><input type="text" name="letter" value="<?php echo $_GET['letter']; ?>">
                        <?php }else{ ?><input type="text" name="letter"><?php }?>
                      <?php if (isset($_GET['letter_Err'])) { ?>
                                      <div class="error"><?php echo $_GET['letter_Err']; ?></div>
                          <?php } ?><br>
                          
                                          <div class="vehicles">
                            <div class="radio1">
                                    <input type="radio" name="Vehicle" value="Toyota Hiace" >
                                      <label for="html">Toyota Hiace</label>
                                    <div class="crd">
                                      <img src="Images/hiace.png" alt="Avatar" class="img">
                                      <div class="ctn">
                                        <p>
                                        
                                        <?php
                                        $query = "SELECT Hiace FROM available";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_fetch_assoc($query_run) > 0)
                                        {
                                        foreach($query_run as $row)
                                        {
                                        ?><h3><?=$row['Hiace'];?> Available</h3>
                                        <?php
                                          }
                                        }
                                    else
                                    {
                                        echo "<h5> Not Available Vehicle </h5>";
                                    }
                                    ?>
                                        </p>
                                      </div>
                                    </div>
                                    <br>
                                    <input type="radio" name="Vehicle" value="Toyota Hilux" >
                                      <label for="html">Toyota Hilux</label>
                                    <div class="crd">
                                      <img src="Images/hilux.png" alt="Avatar" class="img">
                                      <div class="ctn">
                                      <p>
                                        
                                        <?php
                                        $query = "SELECT Hilux FROM available";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_fetch_assoc($query_run) > 0)
                                        {
                                        foreach($query_run as $row)
                                        {
                                        ?><h3><?=$row['Hilux'];?> Available</h3>
                                        <?php
                                          }
                                        }
                                    else
                                    {
                                        echo "<h5> Not Available Vehicle </h5>";
                                    }
                                    ?>
                                        </p>
                                      </div>
                                    </div><br>
                                    <input type="radio" name="Vehicle" value="Isuzu DI N944" >
                                    <label for="html">Isuzu DI N944</label>
                                    <div class="crd">
                                      <img src="Images/isuzu.jpg" alt="Avatar" class="img">
                                    <div class="ctn">
                                    <p>
                                        
                                        <?php
                                        $query = "SELECT Isuzu FROM available";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_fetch_assoc($query_run) > 0)
                                        {
                                        foreach($query_run as $row)
                                        {
                                        ?><h3><?=$row['Isuzu'];?> Available</h3>
                                        <?php
                                          }
                                        }
                                    else
                                    {
                                        echo "<h5> Not Available Vehicle </h5>";
                                    }
                                    ?>
                                        </p>                           
                                    </div>
                                  </div>
                                  <br>
                                    <input type="radio" name="Vehicle" value="Multi Cab" >
                                    <label for="html">Multi Cab</label>
                                    <div class="crd">
                                      <img src="Images/multi.jpg" alt="Avatar" class="img">
                                      <div class="ctn">
                                      <p>
                                        
                                        <?php
                                        $query = "SELECT Multi FROM available";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_fetch_assoc($query_run) > 0)
                                        {
                                        foreach($query_run as $row)
                                        {
                                        ?><h3><?=$row['Multi'];?> Available</h3>
                                        <?php
                                          }
                                        }
                                    else
                                    {
                                        echo "<h5> Not Available Vehicle </h5>";
                                    }
                                    ?>
                                        </p>
                                      </div>
                                    </div><br>
                                    <input type="radio" name="Vehicle" value="Innova" >
                                    <label for="html">Inova</label>
                                    <div class="crd">
                                      <img src="Images/innova.png" alt="Avatar" class="img">
                                      <div class="ctn">
                                      <p>
                                        
                                        <?php
                                        $query = "SELECT Innova FROM available";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_fetch_assoc($query_run) > 0)
                                        {
                                        foreach($query_run as $row)
                                        {
                                        ?><h3><?=$row['Innova'];?> Available</h3>
                                        <?php
                                          }
                                        }
                                    else
                                    {
                                        echo "<h5> Not Available Vehicle </h5>";
                                    }
                                    ?>
                                        </p>
                                      </div>
                                    </div><br>
                      </div>
                      <div class="radio2">
                                    <input type="radio" name="Vehicle" value="Jinbie Truck" >
                                    <label for="html">Jinbie Truck</label>
                                    <div class="crd">
                                      <img src="Images/jinbie.jpg" alt="Avatar" class="img">
                                      <div class="ctn">
                                      <p>
                                        
                                        <?php
                                        $query = "SELECT Jinbie FROM available";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_fetch_assoc($query_run) > 0)
                                        {
                                        foreach($query_run as $row)
                                        {
                                        ?><h3><?=$row['Jinbie'];?> Available</h3>
                                        <?php
                                          }
                                        }
                                    else
                                    {
                                        echo "<h5> Not Available Vehicle </h5>";
                                    }
                                    ?>
                                        </p>
                                      </div>
                                    </div><br>
                                    <input type="radio" name="Vehicle" value="Foton Truck" >
                                    <label for="html">Foton Truck</label>
                                    <div class="crd">
                                      <img src="Images/foton.png" alt="Avatar" class="img">
                                      <div class="ctn">
                                      <p>
                                        
                                        <?php
                                        $query = "SELECT Foton FROM available";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_fetch_assoc($query_run) > 0)
                                        {
                                        foreach($query_run as $row)
                                        {
                                        ?><h3><?=$row['Foton'];?> Available</h3>
                                        <?php
                                          }
                                        }
                                    else
                                    {
                                        echo "<h5> Not Available Vehicle </h5>";
                                    }
                                    ?>
                                        </p>
                                      </div>
                                    </div><br>
                                    <input type="radio" name="Vehicle" value="Foton Truck Tornado" >
                                    <label for="html">Foton Truck Tornado</label>
                                    <div class="crd">
                                      <img src="Images/tornado.jpg" alt="Avatar" class="img">
                                      <div class="ctn">
                                      <p>
                                        
                                        <?php
                                        $query = "SELECT Tornado FROM available";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_fetch_assoc($query_run) > 0)
                                        {
                                        foreach($query_run as $row)
                                        {
                                        ?><h3><?=$row['Tornado'];?> Available</h3>
                                        <?php
                                          }
                                        }
                                    else
                                    {
                                        echo "<h5> Not Available Vehicle </h5>";
                                    }
                                    ?>
                                        </p>
                                      </div>
                                    </div><br>
                                    <input type="radio" name="Vehicle" value="Commuter" >
                                    <label for="html">Commuter</label>
                                    <div class="crd">
                                      <img src="Images/commuter.jpg" alt="Avatar" class="img">
                                      <div class="ctn">
                                      <p>
                                        
                                        <?php
                                        $query = "SELECT Commuter FROM available";
                                        $query_run = mysqli_query($con, $query);

                                        if(mysqli_fetch_assoc($query_run) > 0)
                                        {
                                        foreach($query_run as $row)
                                        {
                                        ?><h3><?=$row['Commuter'];?> Available</h3>
                                        <?php
                                          }
                                        }
                                    else
                                    {
                                        echo "<h5> Not Available Vehicle </h5>";
                                    }
                                    ?>
                                        </p>
                                      </div>
                                    </div><br>
                            </div>
                      </div>

                    
                            <?php if (isset($_GET['Vehicle_Err'])) { ?>
                                      <div class="error"><?php echo $_GET['Vehicle_Err']; ?></div>
                          <?php } ?><br>

                      <select name="Driver">
                                  <option value="">Choose a Driver Here </option>
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
                        <?php if (isset($_GET['Driver_Err'])) { ?>
                                      <div class="error"><?php echo $_GET['Driver_Err']; ?></div>
                          <?php } ?><br>

                        <input type="hidden" value="pending.." name="request" >

                      <input type="submit" name="send_request" value="SUBMIT">
                  </form>
          </div>
    </section>
</body>
</html>