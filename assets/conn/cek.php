<?php
if (!isset($_SESSION['username'])) {
    Header("location: ../../index.php");
}
?>