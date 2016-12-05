<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


//$duration = microtime(true);
//$hours = (int)($duration/60/60);
//$minutes = (int)($duration/60)-$hours*60;
//$seconds = (int)$duration-$hours*60*60-$minutes*60;
//echo $hours.":".$minutes.":".$seconds;

$t = microtime(true);
$micro = sprintf("%06d",($t - floor($t)) * 1000000);
$d = new DateTime( date('Y-m-d H:i:s.'.$micro, $t) );

print $d->format("d-m- H:i:s"); // note at point on "u"