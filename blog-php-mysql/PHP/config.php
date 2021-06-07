<?php
$con = mysqli_connect("localhost", "root", "root", "blog2");

if(mysqli_connect_error())
{
    echo"Failed to connect" . mysqli_connect_error();
}
