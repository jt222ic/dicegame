<?php


class MasterController
{
public function init()
{
  
  
$l = new LayoutView();
$lv = new LoginView();
$lm = new LoginModel();
$lc = new LogController($lv,$lm,$l);


$p = new Player();
$dg = new DiceGame();
$d = new Dice();
$dv = new DiceView($d, $dg,$p);
$pc = new PlayerController($dv,$d,$dg,$p);

if($lc->isLoggedin())
{
$sv = new StartView();    
$l->render($sv);
}
else
{
$lc->initLogin();
$lc->renderLoginLayout();
}
}
}
