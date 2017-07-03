<?php
$bid = $_POST['delete'];
$db = mysqli_connect("localhost","root","11111111","book");
$sql = "DELETE FROM textbook WHERE book_id='$bid'";
mysqli_query($db,$sql);
