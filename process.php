<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>


<?php
$i=0;
if(isset($_POST) && count($_POST)>0){

 foreach($_POST as $paramName => $paramValue){
               if($i<8){

                $i=$i+1;
               }
               else{
                    $amt=$amt+$paramValue;

                        $event=$event.';'.$paramName;
                   }
    }

}


$dst = new mysqli('localhost', 'admin_chroma', 'mrGV3C5tqS', 'admin_chroma');

        if($dst->connect_error){
            die("Connection Failed: ".$db->connect_error);
          }
          else{
            $first=$_POST["first-name"];
            $last=$_POST["last-name"];
            $mail=$_POST["email"];
            $phone=$_POST["phone"];
            $aadhaar=$_POST["Aadhar"];
            $gender=$_POST["gender"];
            $acc=$_POST["accomodation"];
            $clg=$_POST["College"];
            $temp=time();
            $id=$temp;

            $dq = "INSERT INTO registration(fname, lname, email, phone1, aadhaar, college, gender, accomodation, event_name, id, amt)
           VALUES('$first','$last','$mail','$phone','$aadhaar','$clg','$gender','$acc','$event','$id', '$amt')";
            $result = $dst->query($dq); //Run the query
            if($result){
              ?>

                    <title>Registered- Payment Pending!</title>
                <style>
                  body { text-align: center; padding: 150px; }
                  h1 { font-size: 50px; }
                  body { font: 20px Helvetica, sans-serif; color: #333; }
                  article { display: block; text-align: left; width: 650px; margin: 0 auto; }
                   a { color: #333; text-decoration: none; }
                  a:hover { color: #333; text-decoration: none; }
                </style>
            <h2>Dear <?php echo $first; ?>, Your details has been successfully submitted!<br>
            Please enter Rs.<?php echo $amt;?> in the payment page to proceed the registration. <br/><br/></h2>
            <br/><br/><h2><a href="https://www.payumoney.com/paybypayumoney/#/E3478C104F7A1801346E3D5A90750D89">Click here to Proceed To Pay</a>



              <?php



            }
            else
                echo 'Sorry! Something went wrong! Kindly contact us at <a href="mailto:acc@amityaump.com">Amity Coding Club</a>';

     /*           echo "System Error";
              //Debugging Message
              echo '<p>'.mysqli_error($dst).'<br><br>Query:'.$dq.'</p>';
    */

          }
              mysqli_close($dq);

?>
<form class="form-horizontal">
<fieldset>


 <?php

if(isset($_POST) && count($_POST)>0){

    echo '<input type="hidden" name="phone" value="' . $_POST["phone"] . '">';
    echo '<input type="hidden" name="id" value="' . $id . '">';
     echo '<input type="hidden" name="email" value="' . $_POST["email"] . '">';
      echo '<input type="hidden" name="Aadhar" value="' . $_POST["Aadhar"] . '">';
      echo '<input type="hidden" name="TXN_AMOUNT" value="' . $amt . '">';
}
            ?>

<!-- Button (Double) -->
<?php /*<div class="form-group">
  <label class="col-md-4 control-label" for="paytm">Proceed to pay</label>
  <div class="col-md-8">
    <button id="paytm" type="submit" name="paytm" class="btn btn-success">Paytm Gateway</button>

*/?>


  </div>
</div>

</fieldset>
</form>

