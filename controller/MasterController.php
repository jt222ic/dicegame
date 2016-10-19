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


$dg = new DiceGame();
$d = new Dice();
$c = new Cash($dg);
$dv = new DiceView($d, $dg, $c);

$pc = new PlayerController($dv,$d,$dg, $c);

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
