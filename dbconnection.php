<?php
/**
 * @author Sriram Gopalakrishnan
 *
 * Configure your MySQL connection information
 */

$user = 'root';
$pass = '';
$host = 'localhost';
$dbName = 'classuser_registration';


/** @var resource $connection Information about your MySQL connection */
$connection = mysqli_connect($host,$user,$pass,$dbName) or die(mysqli_connect_error());
