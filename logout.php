<?php

require 'includes/url.php';

session_start();

$_SESSION['is_logged_in'] = false;

redirect('/cms');
