<?php
/**
 * @author Sriram Gopalakrishnan
 * @url www.classuser.com
 */

session_start();

if(isset($_SESSION['user_id'], $_SESSION['username'])) {
    #logged in user
    echo "<center><h3>Welcome {$_SESSION['username']}!</h3> <a href='logout.php'>Click here to Logout</a></center>";
} else {
    #anonymous user
    echo "<center>Anonymous user <a href='registration.php'>Click here to Register</a></center>";
}