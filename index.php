<?php


session_start();

require_once("controller/PlayerController.php");
require_once("model/Dice.php");
require_once("model/DiceGame.php");
require_once("view/LayoutView.php");
require_once("view/DiceView.php");
require_once("view/StartView.php");
require_once("model/DiceGame.php");

require_once("model/Cash.php");

require_once("model/LoginModel.php");
require_once("view/LoginView.php");
require_once("controller/LoginController.php");
require_once("controller/MasterController.php");

$master = new MasterController();
$master->init();

