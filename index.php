<?php
    $json = file_get_contents("Atraxia.json");              
    require('./includes/display.php');    
    $a = json_decode($json);           
    $atraxia = new gearset($a->{items});
?>

<html>
    <head>
        <title>Hello world!</title>
        <link rel="stylesheet" type="text/css" href="/css/character_items.css">
        <script type="text/javascript" src="http://static.wowhead.com/widgets/power.js"></script>
        <script>var wowhead_tooltips = { "colorlinks": true, "iconizelinks": false, "renamelinks": false, "droppedby": true, "dropchance": true}</script>
    </head>
        
    <body>          
<?php            
    $avatarurl="http://eu.battle.net/static-render/eu/".$a->{'thumbnail'};
    echo "\t<img src=\"$avatarurl\">\n\t";
    echo "<h1>".$a->{'name'}."</h1><br>\n";
    $atraxia->back->show();
    $atraxia->chest->show();
    $atraxia->feet->show();
    $atraxia->finger1->show();
    $atraxia->finger2->show();
    $atraxia->hands->show();
    $atraxia->legs->show();
    $atraxia->mainHand->show();
    $atraxia->neck->show();
    $atraxia->shoulder->show();
    $atraxia->trinket1->show();
    $atraxia->trinket2->show();
    $atraxia->waist->show();
    $atraxia->wrist->show();
    $atraxia->wrist->show_stats();
?>      
    </body>
</html>