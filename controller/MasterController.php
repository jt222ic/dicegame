<?php


class MasterController
{
public function init()
{
$l = new LayoutView();
$lv = new LoginView();
$lm = new LoginModel();
$lc = new LogController($lv,$lm,$l);              // short text variable too difficult to read? post me and i rename them to the original name
                                                   // Lazy to write out a work in a hurry in Master Class

$p = new Player();
$dg = new DiceGame();
$d = new Dice();
$dv = new DiceView($d, $dg,$p);
$c = new Cash($dg);
$pc = new PlayerController($dv,$d,$dg,$p, $c);

if($lc->isLoggedin())
{
$sv = new StartView();    
$l->render($sv);

if($sv->GetGame())
    {
   $pc->CheckRoll();
   $l->render($dv);
    }
}
else
{
$lc->initLogin();
$lc->renderLoginLayout();
}
}
}
