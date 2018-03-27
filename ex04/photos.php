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
    curl_close($curl);

    $domaine = array();
    preg_match("/^(.*:\/\/)?([^\/]*)/", trim($argv[1]), $domaine);
    if (count($domaine) == 3) {
        $protocol = $domaine[1];
        $domaine = $domaine[2];
    }
    else
        die();

    if (is_dir($domaine) || @mkdir($domaine)){
        foreach ($arr[2] as $val){
            preg_match("/^http/", $val, $match);
            if (count($match))
                $link = $val;
            else
                $link = $protocol.$domaine.$val;
            $curl = curl_init($link);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $img = curl_exec($curl);
            preg_match("/([^\/]+)\/?$/", $link, $name);
            if (count($name))
                file_put_contents($domaine."/".$name[1], $img);
        }
    }






}
?>