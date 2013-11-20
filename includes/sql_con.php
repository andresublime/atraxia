<?php
    $con=mysqli_connect("localhost","root","5mr4dm","andre");

    if (mysqli_connect_errno($con)){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $result = mysqli_query($con,"SELECT * FROM items");

    while($row = mysqli_fetch_array($result)){
        echo $row['name'] . " " . $row['ilvl'];
        echo "<br>";
    }
    
    mysqli_close($con);
?>
