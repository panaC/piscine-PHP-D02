#!/usr/bin/php
<?php
/**
 * Created by PhpStorm.
 * User: pierre
 * Date: 26/03/18
 * Time: 21:45
 */

function ft_link($str)
{
    $ret = "";
    if (count($str) == 6)
    {
        $ret_1 = preg_replace_callback("/(title=\")(.*?)(\")/", function ($s){
            if (count($s) == 4)
                return $s[1].strtoupper($s[2]).$s[3];
        }, $str[2]);
        $tmp_2 = preg_replace_callback("/(title=\")(.*?)(\")/", function ($s){
            if (count($s) == 4)
                return $s[1].strtoupper($s[2]).$s[3];
        }, $str[4]);
        $ret_2 = preg_replace_callback("/^(.*?)(<|$)/", function ($s){
            if (count($s) == 3)
                return strtoupper($s[1]).$s[2];
        }, $tmp_2);
        return $str[1].$ret_1.$str[3].$ret_2.$str[5];
    }
    return implode($str);
}

if ($argc == 2)
{
    $hand = fopen($argv[1], 'r');
    $file =  fread($hand, filesize($argv[1]));

    $file = preg_replace_callback("/(<a )(.*?)(>)(.*?)(<\/a>)/", "ft_link", $file);

    echo $file;

    fclose($hand);
}

?>