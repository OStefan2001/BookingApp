<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rezervare</title>
</head>
<body>
    


<?php
    $checkIn = $_POST['checkIn'];
    $checkOut = $_POST['checkOut'];
    $adults = $_POST['adults'];
    $kids = $_POST['kids'];


    //Conectare baza de date     
    $conn = new mysqli('localhost','root','','apartHotel');
    if($conn->connect_error){
        die('Conectare esuata : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into familyApartment(checkIn, checkOut, adults, kids)values(?, ?, ?, ?)");
        $stmt->bind_param("ssii", $checkIn, $checkOut, $adults, $kids);
        $stmt->execute();
        echo "Your stay is reserved <br>";
        echo "You have a reservation for: " .$adults. " adults";
        echo " and " .$kids. " kids";
        echo " between  " .$checkIn. "  -  ";
        echo "".$checkOut."";
        $stmt->close();
        $conn->close();
    }
?>

<button><a href ='apartment1.html' style="text-decoration:none" >OK</button>
<a href='apartment1.html' button onclick="cancelreservation('Your reservation it will be canceled')"style="margin-top:1%;margin-bottom:1%;margin-left:2%;
        text-decoration:none;color:black;border-style:solid">Cancel reservation</button>

<script>
    function cancelreservation(){
        var result=confirm('Are you sure?');
        if (result==false){
            event.preventDefault();
        }
        alert(msg)

    }

</script>
</body>
</html>