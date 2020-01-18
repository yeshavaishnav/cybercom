<?php
    $color = array("red" => 1,"yellow" => 2,"green" => 3);
    print_r($color);
    
    print_r($color);

    foreach($color as $key=>$value)
    {
        echo $key."=>".$value;
    }
?>