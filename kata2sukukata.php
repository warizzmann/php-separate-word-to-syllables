<!DOCTYPE html>
<html>
<head>
    <title>Split Kata manjadi Suku Kata</title>
    <style type="text/css">
        body {font-size: 20px;}
        span {font-size: 15px;}
    </style>
</head>
<body>
<?php
# created by warizzmann
# 2016
if (isset($_GET['opo'])) {
    function ng($now,$next){
        return strtolower($now) == 'n' && strtolower($next) == 'g' ? true : false;
    }
    function ny($now,$next){
        return strtolower($now) == 'n' && strtolower($next) == 'y' ? true : false;
    }
    function th($now,$next){
        return strtolower($now) == 't' && strtolower($next) == 'h' ? true : false;
    }
    function dh($now,$next){
        return strtolower($now) == 'd' && strtolower($next) == 'h' ? true : false;
    }
    $vowels = array('a','i','u','e','o','A','I','U','E','O');
    $consonants = array('b','c','d','f','g','h','j','k','l','m','n','p','q','r','s','t','v','w','x','y','z',
            'B','C','D','F','G','H','J','K','L','M','N','P','Q','R','S','T','V','W','X','Y','Z');
    $opo = $_GET['opo'];
    $opo_array = str_split($opo);
    $count_opo_array = count($opo_array);
    for ($i=0; $i < ($count_opo_array-1); $i++) { 
        $opo_array_berikut = $opo_array[$i+1];
        $ng = ng($opo_array[$i],$opo_array_berikut);
        $ny = ny($opo_array[$i],$opo_array_berikut);
        $th = th($opo_array[$i],$opo_array_berikut);
        $dh = dh($opo_array[$i],$opo_array_berikut);
        // echo $opo_array_berikut;
        if (in_array($opo_array_berikut, $vowels)) {
            $hasil[]= $opo_array[$i].$opo_array_berikut;
            $i++;
        } elseif (in_array($opo_array_berikut, $consonants) && !$ng && !$ny && !$th && !$dh) {
            $hasil[]= $opo_array[$i];
        }
        if ($ng || $ny || $dh || $th) {
            $x = $i;
            if ($x+2 < $count_opo_array) {
                if (in_array($opo_array[$i+2],$vowels)) {
                    $hasil[]= $opo_array[$i].$opo_array_berikut.$opo_array[$i+2];
                    $i=$i+2;
                }else{
                    $hasil[]= $opo_array[$i].$opo_array_berikut;
                    $i++;
                }
            }else{
                $hasil[]= $opo_array[$i].$opo_array_berikut;
                $i++;
            }
        }
    }
    if (in_array($opo_array[$count_opo_array-1],$consonants) && !in_array($opo_array[$count_opo_array-2],$consonants)) {
        $hasil[]= $opo_array[$count_opo_array-1];
    }
    if (in_array($opo_array[$count_opo_array-1],$vowels) && in_array($opo_array[$count_opo_array-2],$vowels)) {
        $hasil[]= $opo_array[$count_opo_array-1];
    }
    print_r($hasil);
}
?>
<form method="get">
    <input type="text" name="opo">
</form>
</body>
</html>
