<?php

class Cash
{
    var $cash50 = 50;
    var $cash100 = 100;
    var $cash200 = 200;
    var $cookie_name = "Jan";
    var $bankaccount = 0;
    
    public function __construct(DiceGame $dg)
    {
       $this->DiceGame = $dg; 
    }
    
   public function Bet($value)
   {
       if(!isset($_SESSION["Money"]))
       {
           $_SESSION["Money"] = 0;
       }
       if($value == "50$")
       {
           if($this->PlayerCondition())
           {
            $_SESSION["Money"] += $this->cash50;
           }
           else
           {
               $_SESSION["Money"] -= $this->cash50;
           } 
       }
       if($value == "100$")
       {
            if($this->PlayerCondition())
           {
                $_SESSION["Money"] += $this->cash100;
           }
           else
           {
                $_SESSION["Money"] -= $this->cash100;
           }   
       }
       if($value == "200$")
       {
                  if($this->PlayerCondition())
           {
                $_SESSION["Money"] += $this->cash200;
           }
           else
           {
                $_SESSION["Money"] -= $this->cash200;
           }   
       }
       setcookie($cookie_name,$_SESSION["Money"], time() + (86400 * 30), "/");
   }
   
   public function PlayerCondition()
   {
       if($this->DiceGame->Gamecondition())
       {     
            return false;
       }
       return true;
   }
   public function SessionForBank()
   {
       if(isset($_SESSION["Money"]))
       {
           return $_SESSION["Money"];
           
       }
       return false;
   }
}
