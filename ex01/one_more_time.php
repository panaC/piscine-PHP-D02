#!/usr/bin/php
<?php
/**
 * Created by PhpStorm.
 * User: pierre
 * Date: 26/03/18
 * Time: 20:23
 */

date_default_timezone_set("Europe/Paris");

function select_month($str)
{
    $str = lcfirst($str);
    if (strcmp($str, "janvier") == 0)
        return 1;
    else if (strcmp($str, "fevrier") == 0)
        return 2;
    else if (strcmp($str, "mars") == 0)
        return 3;
    else if (strcmp($str, "avril") == 0)
        return 4;
    else if (strcmp($str, "mai") == 0)
        return 5;
    else if (strcmp($str, "juin") == 0)
        return 6;
    else if (strcmp($str, "juillet") == 0)
        return 7;
    else if (strcmp($str, "aout") == 0)
        return 8;
    else if (strcmp($str, "septembre") == 0)
        return 9;
    else if (strcmp($str, "octobre") == 0)
        return 10;
    else if (strcmp($str, "novembre") == 0)
        return 11;
    else if (strcmp($str, "decembre") == 0)
        return 12;
    else
        return -1;
}

$err = false;

if ($argc == 2)
{
    $arr = preg_split("/[ ]/", trim($argv[1]));
    if (count($arr) == 5)
    {
        $day = $arr[1];
        if (!is_numeric($day))
            $err = true;
        $month = select_month($arr[2]);
        if ($month < 0)
            $err = true;
        if (!preg_match("/^\d{4}$/", $arr[3]))
            $err = true;
        $year = $arr[3];
        $time = explode(":", $arr[4]);
        if (count($time) == 3)
        {
            if (!preg_match("/^(0[0-9]|1[0-9]|2[0-3])$/", $time[0]))
                $err = true;
            $hour = $time[0];
            if (!preg_match("/^([0-5][0-9])$/", $time[1]))
                $err = true;
            $min = $time[1];
            if (!preg_match("/^([0-5][0-9])$/", $time[2]))
                $err = true;
            $sec = $time[2];
        }
        else
            $err = true;
        if (!ctype_lower(lcfirst($arr[0])))
            $err = true;
    }
    else
        $err = true;
    if ($err)
        echo "Wrong Format\n";
    else
        echo mktime($hour, $min, $sec, $month, $day, $year)."\n";
}

?>
