<?php

session_start();
session_name('docek2016nis');

require 'config.php';
require LIBS.'Router.php';
require LIBS.'Controller.php';
require LIBS.'View.php';
require LIBS.'Model.php';
require LIBS.'Database.php';

$docek2016nis = new Router();
?>