<?php

include 'db.php';

if (isset($_COOKIE['cookie'])) {
    $token = "";
    $email = "";
    // TODO: if isset + mysql_escape + html_encode ...for $token & $email
    $token = $_COOKIE['cookie']['TOKEN'];
    $email = $_COOKIE['cookie']['email'];
    if(strcmp($token, "") == 0 || strcmp($email, "") == 0) {
        exit ('Security issue. Prevented access...');
    }
    $cnt = 0;
    $query = "SELECT COUNT(*) FROM Patient WHERE email='$email' AND verification='$token'";
   	$result = mysqli_query($link,$query);
    while ($myrow=mysqli_fetch_array($result)) {
        $cnt = $myrow[0];
    }
    if($cnt == 0) {
        exit ('Security issue. Prevented access...');
    }
}

?>