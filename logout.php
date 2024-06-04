<?php

require 'includes/url.php';

session_start();

session_destroy();

redirect('/cms');
