<!DOCTYPE html>
<html lang = "en">
<head>
    <meta charset = "UTF-8">
    <title>MD5 cracker</title>
</head>
<body>
    <h1>MD5 cracker</h1>
    <p>This application takes an MD5 hash of a four digit pin and check all 10,000 possible four digit PINs to determine the PIN.</p>
    <pre><?php
$oldsubmit = $_GET["md5"]?? "";
if (isset($_GET["md5"])) {

print("Debug Output\n");
    $startTime = microtime(true);
    $c = 0;
    for ($i = 0; $i < 10000; $i++) {
        $pin = sprintf("%'04.d",$i);
        $hashy = hash("md5", $pin);
        $c++;
        if ($c <= 15){
            print($hashy." ".$pin."\n");
        }            
        if ($hashy === $_GET["md5"]) {
        $pinFound = $pin;           
        } 
    }  
    print("Total checks: ".$c."\n");
    $endTime = microtime(true);
    print("Ellapsed time: ");
    print($endTime-$startTime);  
}
?></pre>
<p>
<?php 
    if (isset($pinFound)){
        print "Pin is: ".$pinFound."";    
    }else {
        print "No Pin Found";
    }
?>    
</p>    
    <form name="MD5-input" method="get">
        <label for="md5-input"><input id="md5-input" type="text" name="md5" placeholder="Enter MD5-Hash" size="40" value="<?= htmlentities($oldsubmit)?>"></label>        
        <button type="submit">Submit</button>
    </form> 
