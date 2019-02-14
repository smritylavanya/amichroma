                    <title>Payment Status!</title>
                <style>
                  body { text-align: center; padding: 150px; }
                  h1 { font-size: 50px; }
                  body { font: 20px Helvetica, sans-serif; color: #333; }
                  article { display: block; text-align: left; width: 650px; margin: 0 auto; }
                  a { color: #dc8100; text-decoration: none; }
                  a:hover { color: #333; text-decoration: none; }
                </style>




<?php


if(isset($_POST) && count($_POST)>0){

            if($_POST["STATUS"] == "TXN_SUCCESS"){
                    echo "<h2><br>Thanks For your registration for Chroma 2k19!<br/><br/>";
                    echo "Transaction Status:".$_POST['RESPMSG'];
                    echo "<br>Transaction ID.".$_POST['TXNID'];
                    echo "<br>Please keep the Transaction ID with you for later verification!";

$tnx=$_POST["TXNID"];
$oid=$_POST["ORDERID"];
$ta=$_POST["TXNAMOUNT"];

$dst = new mysqli('localhost', 'admin_chroma', 'mrGV3C5tqS', 'admin_chroma');

        if($dst->connect_error){
            die("Connection Failed: ".$db->connect_error);
          }
          else{

            $dq = "INSERT INTO registered(tnxid, id, amt)
           VALUES('$tnx','$oid', '$ta')";
            $result = $dst->query($dq); //Run the query

            }
mysqli_close($dq);



                }
                else{

                    echo "<h2><br>Sorry! Your transaction is failed! Kindly try after some time!.";

                    }
}

else{
    ?>
     <h2><br/>Dear user, Your details has been successfully submitted!<br>
            After payment verification you will recieve an email/message regarding the status!</h2>

    <?php

    }
?>

