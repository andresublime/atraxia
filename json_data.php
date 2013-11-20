<?php
/*    $con=mysqli_connect("localhost","root","5mr4dm","andre");

    if (mysqli_connect_errno($con)){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    
    $result = mysqli_query($con,"SELECT * FROM items");

    while($row = mysqli_fetch_array($result)){
        echo $row['name'] . " " . $row['ilvl'];
        echo "<br>";
    }
    
    mysqli_close($con);
*/  
    $json = file_get_contents("Atraxia.json");
 
?>

<html>
    <head><title>Hello world!</title></head>
    <body>          
    <table>
        <?php                  
            $jsonIterator = new RecursiveIteratorIterator(
                new RecursiveArrayIterator(json_decode($json, TRUE)),
                RecursiveIteratorIterator::SELF_FIRST);

            foreach ($jsonIterator as $key => $val) {
                echo "\t";
                if(is_array($val)) {
                    echo "\t$key:\n";
                } else {
                    echo "\t\t$key => $val\n";                    
                }
            }
       ?>
    </table>
    </body>
</html>