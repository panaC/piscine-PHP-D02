#!/usr/bin/env php
<?php
/**
 * Created by PhpStorm.
 * User: pleroux
 * Date: 3/27/18
 * Time: 4:16 PM
 */

/* (<img.*src=\")(.*)(\".*>) */
$arr = array();
if ($argc == 2) {
    $curl = curl_init(trim($argv[1]));
    curl_setopt($curl, CURLOPT_HEADER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $str = curl_exec($curl);
    preg_match_all("/(<img.*src=\")(.*)(\".*>)/iU", $str, $arr);
    print_r($arr);
    curl_close($curl);

    /* regex ^(.*:\/\/)?([^\/]*) */ /*pour path*/
    $domaine =
    $path = str_replace("http://", "", trim($argv[1]));
    $path = str_replace("/", "_", $path);
    mkdir($path);

    foreach ($arr[2] as $val) {

        preg_match("");
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $img = curl_exec($curl);
        file_put_contents($path."/test.jpg", $img);
    }




}
?>