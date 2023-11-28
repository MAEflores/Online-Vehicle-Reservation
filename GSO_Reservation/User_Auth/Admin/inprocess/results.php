<?php 
// The Session will start
session_start();
// The connection to database
include 'connectionDB/db_conn.php';
// Not displaying errors
ini_set('display_errors', 'Off');
// Admin login authentications
$admin_id = $_SESSION['admin_id'];
// Checker if Admin is Login
if(!isset($admin_id)){
// If not, page will back to Login Page
  header("Location: /GSO_Reservation/login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Drver Trip Tickets</title>
    <link rel="stylesheet" href="result.css">
    <link rel="stylesheet" type="text/css" href="print.css" media="print">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"></head>
	<link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">

</head>
<body>
    <div class="whole_con">
        <div class="invoice_container">
            <div class="menu" id="print-btn">
                <div class="toggle" id="toggle" onclick="expand()" >
                    <i class="material-icons" id="toggle1">
                        add
                    </i>
                </div>
                    <div class="items" id="items">
                        <a href="#" id="item1" onclick="window.print();">
                            <i class="material-icons">
                                print
                            </i>
                        </a>
                        <a href="/User_Auth/Admin/monitor.php" id="item2">
                            <i class="material-icons">
                                home
                            </i>
                        </a>
                    </div>
            </div>

            <!-- js script -->
                    <script>
                        var state=false;
                        function expand(){
                            if(state==false){
                                document.getElementById('items').style.transform='scaleX(1)';
                                document.getElementById('toggle1').style.transform='rotate(45deg)';

                                state=true;
                            }
                            else{
                                document.getElementById('items').style.transform='scaleX(0)';
                                document.getElementById('toggle1').style.transform='rotate(0deg)';
                                state=false;
                            }
                        }
                    </script>
            <!-- js script -->
            <!-- reports/records -->
            <h4><b>Republic of the Philippines</b></h4>
            <h4><b>Province of Pangasinan</b></h4>
            <h4><b>MUNICIPALITY OF BURGOS</b></h4><br>
            <h4><b>DRIVER'S TRIP TICKET</b></h4>
                <div class="invoice_header">
                    
                    <div class="patient_info">
                    <?php
                    $query = "SELECT * FROM administrative ORDER BY id DESC LIMIT 1";
                    $query_run = mysqli_query($con, $query);

                    if(mysqli_fetch_assoc($query_run) > 0)
                    {
                    foreach($query_run as $row)
                    {
                    ?>
                        
                        <table>
                            <tr>
                                <td><b>RIS No.</b></td>
                            </tr>
                            <tr>
                                <td>Date</td>
                                <td> : </td>
                                <td> <b><?=$row['date'];?></b> </td>
                            </tr>
                        </table>
                    </div>
                    
                </div><br>
               
                
                <div class="patient_container">
                        <div>
                        <h5><b>A. To be filled by the Adminitrator Official Authorization Office Travel:</b></h5>
                            <b>1. Name of Driver of the Vehicle:</b>  <b><?=$row['fname'];?></b> <br>
                            <b>2. Government car to be used; Plate No:</b> <?=$row['plate_number'];?><br>
                            <b>3. Name of Authorize Passanger:</b> <?=$row['passenger'];?><br>
                            <b>4. Place or places to be visited/inspected:</b> <?=$row['place'];?><br>
                            <b>5. Purpose:</b> <?=$row['purpose'];?><br>
                        </div>
                </div>
                <div class="signed">
                    <div class="signedBy">
                    </div>
                    <div class="signedBy">
                        <p></h3><b>EFREN C. BUYA</b></h3><br>Chief of Bureau or Office or his duly<br><b>Authorized Representative</b></p>

                    </div>
                </div>
                <div class="patient_container">
                        <div>
                        <h5><b>B. To be filled up by Driver:</b></h5>
                            <b>1. Time of departure from the Office/Garage:</b> <?=$row['time_departure'];?> <?=$row['type1'];?></b><br>
                            <b>2. Time of arrival from (per No. 4):</b> <?=$row['time_arrival'];?> <?=$row['type2'];?></b><br>
                            <b>3. Time of departure from (per No. 4):</b> <?=$row['time_depart'];?> <?=$row['type3'];?></b><br>
                            <b>4. Time of arrival back to the Office N:</b> <?=$row['time_arrival_back'];?> <?=$row['type4'];?></b><br>
                            <b>5. Approximate distance travelled (to and from):</b> <?=$row['distance'];?></b><br>
                            <b>6. Gasoline issued, purchase and consumed:</b><br>
                            <b>a. Balance in Tank:</b> <?=$row['gasoline'];?> liters</b><br>
                            <b>b. Issued by office from stock:</b> <?=$row['issued'];?> liters</b><br>
                            <b>c. Add-purchased during trip:</b> <?=$row['additional_purchase'];?> liters</b><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>TOTAL......  liters</b><br><br>
                            <b>d. Deduct: Used during the trip (to and from):</b> <?=$row['deduct'];?> liters</b><br>
                            <b>e. Balance in tank:</b> <?=$row['balance'];?> liters</b><br>
                            <b>7. Gear oil issued:</b> <?=$row['gear_oil_issued'];?> liters</b><br>
                            <b>8. Lub. oil issued:</b> <?=$row['lub_oil_issued'];?> liters</b><br>
                            <b>9. Grease issued:</b> <?=$row['grease_issued'];?>  liters</b><br>
                            <b>8. Speedometer reading, if any:</b><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>At the beginning of the trip</b> <?=$row['beggining'];?> miles/kms</b><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>At the end of the trip</b> <?=$row['end_of_trip'];?> miles/kms</b><br>
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>Distance travelled (per 5 above)</b> <?=$row['distance_travelled'];?> miles/kms</b><br>
                            <b>11. Remarks: </b>
                        </div>
                </div>




                <br><b></b><div class="address" style="text-align: center;">
                    <b>I hereby certify to the corrections of the above statement of record of Travel</b>
                </div>
                <div class="signed">
                    <div class="signedBy">
                    </div>
                    <div class="signedBy">
                        <p></h3><b>____________________________________</b></h3><br>Signature over Printed Name of Driver</p>

                    </div>
                </div><br>


                <div class="address" style="text-align: center;">
                    <b>I hereby certify that I used this car on official business as stated above.</b>
                </div>

            </div>
         <!-- reports/records -->
</body>
</html>
                <?php
                    }
                  }
              else
              {
                  echo "<h5> No Record Found </h5>";
              }
              ?>