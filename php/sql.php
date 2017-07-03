<?php

$a = mysqli_connect("localhost","root","11111111","book");
mysqli_query($a,'set names utf8');
$s = 'select * from think';
$f = mysqli_query($a,$s);
$d = mysqli_fetch_all($f);
var_dump($d);