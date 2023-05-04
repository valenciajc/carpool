<?php

$conn = mysqli_connect("localhost", "root", "", "carpool");

if (!$conn) {
    echo "Connection Failed";
}