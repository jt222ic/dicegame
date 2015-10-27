<?php


session_start();

require_once("controller/PlayerController.php");
require_once("model/Dice.php");
require_once("model/DiceGame.php");
require_once("view/LayoutView.php");
require_once("view/DiceView.php");
require_once("view/StartView.php");
require_once("model/DiceGame.php");
require_once("model/Player.php");


if(isset($_GET["DiceGame"]))
{   
    $p = new Player();
    $dg = new DiceGame();
    $d = new Dice();
    $dv = new DiceView($d, $dg , $p);
    $pc = new PlayerController($dv,$d, $dg, $p);
    $pc->generatehtml();
}
else
{
    $dv = new StartView();            
}
$lv = new LayoutView();
$lv->render($dv);

