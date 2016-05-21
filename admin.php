<?php

session_start();
session_name('docek2016nis_admin');

require 'config.php';
require LIBS.'Router.php';
require LIBS.'Admin_Controller.php';
require LIBS.'Admin_View.php';
require LIBS.'Admin_Model.php';
require LIBS.'Database.php';

$docek2016nis = new Router('admin');
?>