<?php

if (!isset($_SESSION['sessionId'])) {
    header ('Location:build/index.php');
}