<?php
$db = new mysqli("localhost","root","","handmade");
if(mysqli_connect_errno()){
    echo '<script>alert ("Sorry, could not connect to Database, Press Ok ro try again!");
            document.location.reload()</script>';
}

?>