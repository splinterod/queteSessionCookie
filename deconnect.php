<?php
session_start();
session_destroy();
header('location:http://localhost:8000/index.php');