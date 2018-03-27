#!/usr/bin/php
<?php
/**
 * Created by PhpStorm.
 * User: pleroux
 * Date: 3/27/18
 * Time: 2:58 PM
 */

date_default_timezone_set("Europe/Paris");

$hand = @fopen("/var/run/utmpx", "r") or die;
while ($file = fread($hand, 628))
{
    $arr = unpack("a256login/a4id/a32name/ipid/itype/I2time/a256hostname/L16pad", $file);
    if ($arr['type'] == 7 && strcmp($arr['login'], get_current_user()))
        echo str_pad(trim($arr['login']), 8)." ".$arr['name']."  ".date("M d H:i", $arr[time1])."\n";
}
fclose($hand);
?>