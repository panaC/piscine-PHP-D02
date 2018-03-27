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
    print_r($str);
    if (count($str) == 6)
    {
        $ret_1 = preg_replace_callback("/(title=\")(.*?)(\")/s", function ($s){
            if (count($s) == 4)
                return $s[1].strtoupper($s[2]).$s[3];
        }, $str[1]);
        $ret_2 = preg_replace_callback("/(title=\")(.*?)(\")/s", function ($s){
            if (count($s) == 4)
                return $s[1].strtoupper($s[2]).$s[3];
        }, $str[1]);
        return $str[1].$ret_1.$str[3].$ret_2.$str[5];
    }
    echo "ret : $ret\n";
}

if ($argc == 2)
{
    $hand = fopen($argv[1], 'r');
    $file =  fread($hand, filesize($argv[1]));

    $file = preg_replace_callback("/(<a )(.*?)(>)(.*?)(<\/a>)/s", "ft_link", $file);

    echo $file;

    fclose($hand);
}

?>