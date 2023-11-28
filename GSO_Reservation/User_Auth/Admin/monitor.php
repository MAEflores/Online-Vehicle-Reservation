<?php 
// The Session will start
session_start();
// The connection to database
include 'server_connection/db_conn.php';
// Not displaying errors
ini_set('display_errors', 'Off');
// Admin login authentications
$admin_id = $_SESSION['admin_id'];
// Checker if Admin is Login
if(!isset($admin_id)){
// If not, page will back to Login Page
  header("Location: /login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <title>Vehicles Monitoring</title>
  <link rel="stylesheet" href="css/sidebar.css"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"/>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">



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
        <a href="home.php">
          <i class="fas fa-list"></i>
          <span class="nav-item">Home</span>
          </a>
      </li>
      <li>
        <a href="monitor.php">
          <i class="fas fa-desktop"></i>
          <span class="nav-item">Monitor</span>
          </a>
      </li>
      <li>
        <a href="availableVehicle.php">
          <i class="fas fa-car"></i>
          <span class="nav-item">Vehicle</span>
          </a>
      </li>
      <li>
        <a href="approval.php">
          <i class="fas fa-check"></i>
          <span class="nav-item">Approval</span>
          </a>
      </li>
      <li>
          <a href="Data Analytics.php">
          <i class="fas fa-bar-chart"></i>
          <span class="nav-item">Data Analytics</span>
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
            <h1>Driver's Trip Ticket</h1>
      </div>
      <div class="main-content">
      </div>

      <div class="main-content">
            <form action="inprocess/administrative.php" method="POST">
                    <label for="">Date today</label>
                    <input type="text" name="date" value="<?php echo date("Y-m-d") ?>">
                    <p>1. To be filled by the Administrative Official Authorizing Official Travel: </p>                    
                                      
                    <?php if (isset($_GET['success'])) { ?><div class="success"><?php echo $_GET['success']; ?></div>
                    <?php } ?><?php if (isset($_GET['error'])) { ?><div class="warning">   <?php echo $_GET['error']; ?></div><?php } ?>
                    

                      
                    <select name="fname" class="form-inline">
                    <?php if (isset($_GET['fname'])) { ?><option value="<?php echo $_GET['fname']; ?>"><?php echo $_GET['fname']; ?></option>
                        <?php }else{ ?><option value="">Choose Driver</option><?php }?>
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
                      <?php if (isset($_GET['fname_Err'])) { ?>
                                  <div class="error"><?php echo $_GET['fname_Err']; ?></div>
                      <?php } ?><br>




                  <label for="">2. Government Car to be used; Plate Number</label>
                  <?php if (isset($_GET['plate_number'])) { ?><input type="text" name="plate_number" value="<?php echo $_GET['plate_number']; ?>">
                    <?php }else{ ?><input type="text" name="plate_number"><?php }?>
                  <?php if (isset($_GET['plate_number_Err'])) { ?>
                                  <div class="error"><?php echo $_GET['plate_number_Err']; ?></div>
                      <?php } ?><br>

                  <label for="">3. Name of Authorized Passenger</label>
                  <?php if (isset($_GET['passenger'])) { ?><input type="text" name="passenger" value="<?php echo $_GET['passenger']; ?>">
                    <?php }else{ ?><input type="text" name="passenger"><?php }?>
                  <?php if (isset($_GET['passenger_Err'])) { ?>
                                  <div class="error"><?php echo $_GET['passenger_Err']; ?></div>
                      <?php } ?><br>

                  <label for="">4. Place or Places to be visited/inspected</label>
                  <?php if (isset($_GET['place'])) { ?><input type="text" name="place" value="<?php echo $_GET['place']; ?>">
                    <?php }else{ ?><input type="text" name="place"><?php }?>
                  <?php if (isset($_GET['place_Err'])) { ?>
                                  <div class="error"><?php echo $_GET['place_Err']; ?></div>
                      <?php } ?><br>

                  <label for="">5. Purpose</label>
                  <?php if (isset($_GET['purpose'])) { ?><input type="text" name="purpose" value="<?php echo $_GET['purpose']; ?>">
                    <?php }else{ ?><input type="text" name="purpose"><?php }?>
                  <?php if (isset($_GET['purpose_Err'])) { ?>
                                  <div class="error"><?php echo $_GET['purpose_Err']; ?></div>
                      <?php } ?><br>
                  <p>B. To be filled by the Driver:</p>







                  <label for="">1. Time of Departure from the Office/Garage</label>
                  <?php if (isset($_GET['time_departure'])) { ?><input type="text" name="time_departure" value="<?php echo $_GET['time_departure']; ?>">
                    <?php }else{ ?><input type="text" name="time_departure"><?php }?>
                  <?php if (isset($_GET['time_departure_Err'])) { ?>
                                  <div class="error"><?php echo $_GET['time_departure_Err']; ?></div>
                      <?php } ?><br>
                    <select name="type1" id="">
                      <option value="">AM or PM</option>
                      <option value="Am">AM</option>
                      <option value="Pm">PM</option>
                    </select>

                  <label for="">2. Time of Arrival at(per No. 4 above)</label>
                  <?php if (isset($_GET['time_arrival'])) { ?><input type="text" name="time_arrival" value="<?php echo $_GET['time_arrival']; ?>">
                    <?php }else{ ?><input type="text" name="time_arrival"><?php }?>
                  <?php if (isset($_GET['time_arrival_Err'])) { ?>
                                  <div class="error"><?php echo $_GET['time_arrival_Err']; ?></div>
                      <?php } ?><br>
                    <select name="type2" id="">
                      <option value="">AM or PM</option>
                      <option value="Am">AM</option>
                      <option value="Pm">PM</option>
                    </select>









                  <label for="">3. Time of Departure from (per No. 4)</label>
                  <?php if (isset($_GET['time_depart'])) { ?><input type="text" name="time_depart" value="<?php echo $_GET['time_depart']; ?>">
                    <?php }else{ ?><input type="text" name="time_depart"><?php }?>
                  <?php if (isset($_GET['time_depart_Err'])) { ?>
                                  <div class="error"><?php echo $_GET['time_depart_Err']; ?></div>
                      <?php } ?><br>
                    <select name="type3" id="">
                      <option value="">AM or PM</option>
                      <option value="Am">AM</option>
                      <option value="Pm">PM</option>
                    </select>

                  <label for="">4. Time of Arrival back to the Office N</label>
                  <?php if (isset($_GET['time_arrival_back'])) { ?><input type="text" name="time_arrival_back" value="<?php echo $_GET['time_arrival_back']; ?>">
                    <?php }else{ ?><input type="text" name="time_arrival_back"><?php }?>
                    <select name="type4" id="">
                      <option value="">AM or PM</option>
                      <option value="Am">AM</option>
                      <option value="Pm">PM</option>
                    </select>
                  <?php if (isset($_GET['time_arrival_back_Err'])) { ?>
                                  <div class="error"><?php echo $_GET['time_arrival_back_Err']; ?></div>
                      <?php } ?><br>








                  <label for="">5. Approximate distance travelled (to and from)</label>
                  <?php if (isset($_GET['distance'])) { ?><input type="text" name="distance" value="<?php echo $_GET['distance']; ?>">
                    <?php }else{ ?><input type="text" name="distance"><?php }?>
                    
                  <?php if (isset($_GET['distance_Err'])) { ?>
                                  <div class="error"><?php echo $_GET['distance_Err']; ?></div>
                      <?php } ?><br>

                  <label for="">6. Gasoline issued, purchase and consumed:</label>
                  <?php if (isset($_GET['gasoline'])) { ?><input type="text" name="gasoline" value="<?php echo $_GET['gasoline']; ?>">
                    <?php }else{ ?><input type="text" name="gasoline"><?php }?>
                  <?php if (isset($_GET['gasoline_Err'])) { ?>
                                  <div class="error"><?php echo $_GET['gasoline_Err']; ?></div>
                      <?php } ?><br>


                  <label for="">   a. Balance in tank</label>
                  <?php if (isset($_GET['balance'])) { ?><input type="text" name="balance" value="<?php echo $_GET['balance']; ?>">
                    <?php }else{ ?><input type="text" name="balance"><?php }?>
                  <?php if (isset($_GET['balance_Err'])) { ?>
                                  <div class="error"><?php echo $_GET['balance_Err']; ?></div>
                      <?php } ?><br>

                  <label for="">   b. Issued by office from stock</label>
                  <?php if (isset($_GET['issued'])) { ?><input type="text" name="issued" value="<?php echo $_GET['issued']; ?>">
                    <?php }else{ ?><input type="text" name="issued"><?php }?>
                  <?php if (isset($_GET['issued_Err'])) { ?>
                                  <div class="error"><?php echo $_GET['issued_Err']; ?></div>
                      <?php } ?><br>

                  <label for="">   c. Add-purchased during trip</label>
                  <?php if (isset($_GET['additional_purchase'])) { ?><input type="text" name="additional_purchase" value="<?php echo $_GET['additional_purchase']; ?>">
                    <?php }else{ ?><input type="text" name="additional_purchase"><?php }?>
                  <?php if (isset($_GET['additional_purchase_Err'])) { ?>
                                  <div class="error"><?php echo $_GET['additional_purchase_Err']; ?></div>
                      <?php } ?><br>

                  <label for="">   d.Deduct: Used during the trip (to and from)</label>
                  <?php if (isset($_GET['deduct'])) { ?><input type="text" name="deduct" value="<?php echo $_GET['deduct']; ?>">
                    <?php }else{ ?><input type="text" name="deduct"><?php }?>
                  <?php if (isset($_GET['deduct_Err'])) { ?>
                                  <div class="error"><?php echo $_GET['deduct_Err']; ?></div>
                      <?php } ?><br>

                  <label for="">7. Gear oil issued</label>
                  <?php if (isset($_GET['gear_oil_issued'])) { ?><input type="text" name="gear_oil_issued" value="<?php echo $_GET['gear_oil_issued']; ?>">
                    <?php }else{ ?><input type="text" name="gear_oil_issued"><?php }?>
                  <?php if (isset($_GET['gear_oil_issued_Err'])) { ?>
                                  <div class="error"><?php echo $_GET['gear_oil_issued_Err']; ?></div>
                      <?php } ?><br>

                  <label for="">8. Lub. oil issued</label>
                  <?php if (isset($_GET['lub_oil_issued'])) { ?><input type="text" name="lub_oil_issued" value="<?php echo $_GET['lub_oil_issued']; ?>">
                    <?php }else{ ?><input type="text" name="lub_oil_issued"><?php }?>
                  <?php if (isset($_GET['lub_oil_issued_Err'])) { ?>
                                  <div class="error"><?php echo $_GET['lub_oil_issued_Err']; ?></div>
                      <?php } ?><br>

                  <label for="">9. Grease issued</label>
                  <?php if (isset($_GET['grease_issued'])) { ?><input type="text" name="grease_issued" value="<?php echo $_GET['grease_issued']; ?>">
                    <?php }else{ ?><input type="text" name="grease_issued"><?php }?>
                  <?php if (isset($_GET['grease_issued_Err'])) { ?>
                                  <div class="error"><?php echo $_GET['grease_issued_Err']; ?></div>
                      <?php } ?><br>

                  <b>10. Speedometer reading, if any:</b><br><br>
                  <div class="last">

                  <label for="">   At the beginning of the trip</label>
                  <?php if (isset($_GET['beggining'])) { ?><input type="text" name="beggining" value="<?php echo $_GET['beggining']; ?>">
                    <?php }else{ ?><input type="text" name="beggining"><?php }?>
                      <?php if (isset($_GET['beggining_Err'])) { ?>
                                  <div class="error"><?php echo $_GET['beggining_Err']; ?></div>
                      <?php } ?><br>

                  <label for="">   At the end of the trip</label>
                  <?php if (isset($_GET['end_of_trip'])) { ?><input type="text" name="end_of_trip" value="<?php echo $_GET['end_of_trip']; ?>">
                    <?php }else{ ?><input type="text" name="end_of_trip"><?php }?>
                  <?php if (isset($_GET['end_of_trip_Err'])) { ?>
                                  <div class="error"><?php echo $_GET['end_of_trip_Err']; ?></div>
                      <?php } ?><br>

                  <label for="">   Distance travelled (per 5 above)</label>
                  <?php if (isset($_GET['distance_travelled'])) { ?><input type="text" name="distance_travelled" value="<?php echo $_GET['distance_travelled']; ?>">
                    <?php }else{ ?><input type="text" name="distance_travelled"><?php }?>
                  <?php if (isset($_GET['distance_travelled_Err'])) { ?>
                                  <div class="error"><?php echo $_GET['distance_travelled_Err']; ?></div>
                      <?php } ?><br>

                  </div>
                  <input type="submit" name="administrative" value="SUBMIT"><br><br>
            </form>
  </section>
</body>
</html>