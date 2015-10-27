<?php

class Dice{

private $dice;
private $dice2;
private $dice3;


    public function RollaDice()
    {
        
        $this->dice =rand(1,6);              
        $this->dice2=rand(1,6);
        $this->dice3=rand(1,6);                                         /* $roll = $this->dice;  $this->DiceView->setRoll(dice); */    
    }

    public function GetDiceRolls()
    {
        $arrayofdicerolls = array($this->dice, $this->dice2, $this->dice3);
        
        return $arrayofdicerolls;
        
    }

}










