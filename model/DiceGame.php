<?php




class DiceGame{



private $dievalue;
private $rankvalue;                       // remove all classes and refix the rule to easily accessible 
private $currentplayer = 0;
private $WinDice;
private $Highest;
private $TriplesDice;
public $Pairss = false;


    public function checkPair($rollvalues)                        // if you get pair you count the number of the single value such as   4-4-1 you get value points 1 or  3-3-6 you get value 6
    {
    foreach($rollvalues as $pairs)
    {                                                       
     $PairDice[] = $pairs;
    }
    if($PairDice[0] == $PairDice[1] )                  
    {
        $_SESSION[$this->Pairss] = true;
     $PairDice[2];
    }
    else if($PairDice[0] == $PairDice[2] )
    {
        $_SESSION[$this->Pairss] = true;
       $PairDice[1];
    }
    else if($PairDice[1] == $PairDice[2])
    {
        $_SESSION[$this->Pairss] = true;
      $PairDice[0];
    }
     $_SESSION[$this->Pairss] = true;
    
    }
    
    public function Gamecondition()
    {
        if(isset($_SESSION[$this->Pairss]))
        {
            return true;
        }
    }
}
