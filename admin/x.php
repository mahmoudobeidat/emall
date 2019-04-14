<?php
$x = array(1,2,"mohd",1.15);
$x[] = "salameh";
echo "<pre>";
print_r($x);

$sal = array("mohd"=>800,"diana"=>400);

print_r($sal);

foreach ($x as $key=>$val){
    echo $key." ".$val."<br>";
}

$multi = array(array(1,2,3),array(4,5,6));

print_r($multi);
echo $multi[1][2];