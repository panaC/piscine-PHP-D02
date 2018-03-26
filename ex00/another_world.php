#!/usr/bin/php
<?php
/**
 * Created by PhpStorm.
 * User: pierre
 * Date: 26/03/18
 * Time: 20:18
 */

if ($argc > 1)
{
    $arr = preg_split("/[\s]+/", trim($argv[1]));
    echo implode(" ", $arr)."\n";
}

?>