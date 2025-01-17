<?php 
require "includes/SubmitFunctions.php";

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Webhook Cards</title>
    <style>

        /* Define styles for small screens */
        .container {
          margin: auto; padding: 10px; 
        }
        .row {
          display: flex;
          overflow: scroll;
          /* background-color: green; */
          margin: auto; width: 100%;
          border: 2px double blue;
          height: inherit;
          /* width: 1000px; */
        }
        .col {
            width: 400px;
        }

        
        .card {
          position: relative;
             border-bottom: 1px solid red;
             margin: 10px;
             width: 300px; 
             height: 400px; 
             overflow: scroll;
             background-color: #CCCCCC; 
             border: 2px double black
        }
        .cardContent {
          height: 270px; margin:10px; padding:10px; overflow: scroll;
        }
        .eventsButton { display: none;
          margin: auto; text-align: center; background-color: white; width: 100px; border-radius: 5px; padding: 1px; border: 1px solid black; font-weight: bold;
        }
        .allEvents { display: none;
          margin: auto; text-align: center; border: 1px solid black; background-color: white; width: 200px;  font-weight: bold;
        }
        .eventsButton:hover {
          color:white; background-color: #333;
        }   
        .allEvents:hover {
          color:white; background-color: #66f;
        }   



        /* Hide the checkbox */
    #modal-toggle {
      display: none;
    }
    
    /* Styling for the modal container */
    .modal-container {
      display: none;
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      overflow: scroll;
      background-color: rgba(0, 0, 0, 0.5); /* Semi-transparent background */
      z-index: 9999;
    }
    
    /* Styling for the modal content */
    .modal-content {
      overflow: scroll;
      position: absolute;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
      background-color: white;
      padding: 20px;
      border-radius: 5px;
    }
    
    /* Styling for the close button */
    .close-btn {
      position: absolute;
      top: 10px;
      right: 10px;
      cursor: pointer;
    }
    
    /* Display the modal when checkbox is checked */
    #modal-toggle:checked + .modal-container {
      display: block;
    }
    </style>
</head>
 <body style="background-color:#CCC">
 
 <h1 style="text-align: center; color: #66f">Amocrm Integration Task</h1>
 <div style="color: black; text-align: center">Это динамический контент! Последняя активность в панели управления AmoCRM будет автоматически отражена здесь</div>

 <div class="container">
  <div class="row">


    <div class="col">

          <div class="card">
                <div style="text-align: center; font-size: 30px; "><b>Card</b></div>
                <div style="color:blue; text-align:center"><i>(from new CONTACT ADDED webhook)</i></div>

                <div class="cardContent">
                <?php 
                        $numberEvents = SubmitFunctions::showEvents('contact_add');

                        $N = count($numberEvents);
                        // echo $N;
                        for ($j=0; $j<$N; $j++ ) {
                          
                          echo "<p><b>Contact Name: " . $numberEvents[$j]['name'] . "</b></p>";
                          echo "<p><b>Responsible User: " . $numberEvents[$j]['rname'] . "</b></p>";
                          echo "<p><b>Date created is: " . $numberEvents[$j]['c_at'] . "</b></p>";
                          echo '<hr>';
                        
                        };
                    ?>
                      </div>
        <hr>
        <div class="eventsButton">view all</div>
      
          </div>
    </div>

    <div class="col">

      <div  class="card">
                <div style="text-align: center; font-size: 30px; "><b>Card</b></div>
                <div style="color:brown; text-align:center"><i>(from UPDATED CONTACT webhook)</i></div>

                <div class="cardContent">

                <?php 
                $numberEvents = SubmitFunctions::showEvents('contact_update');

                        $N = count($numberEvents);
                        // echo $N;
                        for ($j=0; $j<$N; $j++ ) {
                          
                          echo "<p><b>Contact Name: " . $numberEvents[$j]['name'] . "</b></p>";
                          echo "<p><b>Responsible User: " . $numberEvents[$j]['rname'] . "</b></p>";
                          echo "<p><b>Date Changed is: " . $numberEvents[$j]['u_at'] . "</b></p>";
                          echo '<hr>';
                        
                        };
                    ?>
                     </div>
        <hr>
        <div class="eventsButton">view all</div>
          
      </div>
    </div>

    <div class="col">
      <div class="card" >
                <div style="text-align: center; font-size: 30px; "><b>Card</b></div>
                <div style="color:green; text-align:center"><i>(from new DEAL ADDED webhook)</i></div>

                <div class="cardContent">

                <?php 
                        $numberEvents = SubmitFunctions::showEvents('lead_add');

                        $N = count($numberEvents);
                        // echo $N;
                        for ($j=0; $j<$N; $j++ ) {
                          
                          echo "<p><b>Contact Name: " . $numberEvents[$j]['name'] . "</b></p>";
                          echo "<p><b>Responsible User: " . $numberEvents[$j]['rname'] . "</b></p>";
                          echo "<p><b>Date created is: " . $numberEvents[$j]['c_at'] . "</b></p>";
                          echo '<hr>';
                        
                        };
                    ?>
                    </div>
        <hr>
        <div class="eventsButton">view all</div>
        </div>

    </div>

    <div class="col">
      <div  class="card" >
                <div style="text-align: center; font-size: 30px; "><b>Card</b></div>
                <div style="color:purple; text-align:center"><i>(from UPDATED DEAL webhook)</i></div>

                <div class="cardContent">
                <?php 
                        $numberEvents = SubmitFunctions::showEvents('lead_update');

                        $N = count($numberEvents);
                        // echo $N;
                        for ($j=0; $j<$N; $j++ ) {
                          
                          echo "<p><b>Contact Name: " . $numberEvents[$j]['name'] . "</b></p>";
                          echo "<p><b>Responsible User: " . $numberEvents[$j]['rname'] . "</b></p>";
                          echo "<p><b>Date created is: " . $numberEvents[$j]['u_at'] . "</b></p>";
                          echo '<hr>';
                        
                        };
                    ?>
        </div>
        <hr>
        <div class="eventsButton">view all</div>
   </div>

    </div>

  </div>
  <!-- Button to trigger modal -->

  <br>
   <div class="allEvents"><label for="modal-toggle">View all Events</label></div>
 </div>

<!-- Checkbox to toggle modal -->
<input type="checkbox" id="modal-toggle">

 <!-- Modal container -->
<div class="modal-container">
  <!-- Modal content -->
  <div class="modal-content">
    <label class="close-btn" for="modal-toggle">&times;</label>
    <div style="text-align: center; font-size:20px; font-weight: bold">All Events</div>
    <p>This is a modal body. You can add any content here.</p>
    <?php 
                        $numberEvents = SubmitFunctions::listEvents('contact_add');

                        // $N = count($numberEvents);
                        // // echo $N;
                        // for ($j=0; $j<$N; $j++ ) {
                          
                        //   echo "<p><b>Contact Name: " . $numberEvents[$j]['name'] . "</b></p>";
                        //   echo "<p><b>Responsible User: " . $numberEvents[$j]['rname'] . "</b></p>";
                        //   echo "<p><b>Date created is: " . $numberEvents[$j]['u_at'] . "</b></p>";
                        //   echo '<hr>';
                        
                        // };
                    ?>
  </div>
</div>


</body>
</html>