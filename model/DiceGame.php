<?php




class DiceGame{



private $dievalue;
private $rankvalue;
private $currentplayer = 0;
private $WinDice;
private $Highest;
private $TriplesDice;
public $Pairss = false;


    public function checkTriple($rollvalues) //3 of a kind //
    {
      foreach($rollvalues as $triple)
    {                                               
     $this->TriplesDice[] = $triple;
    }
    
    if($this->TriplesDice[0] == $this->TriplesDice[1]&& $this->TriplesDice[1] == $this->TriplesDice[2])
    {
   
    $this->TripleDievalue = max(array($this->TriplesDice));
    }
    }
    public function GetTriple()
    {
      return $this->TripleDievalue;
    }
    
    public function checkPair($rollvalues)                        // if you get pair you count the number of the single value such as   4-4-1 you get value points 1 or  3-3-6 you get value 6
    {
    foreach($rollvalues as $pairs)
    {                                                       
     $PairDice[] = $pairs;
    }
    
    if($PairDice[0] == $PairDice[1] )                  
    {
     $PairDice[2];
     if ($this->currentplayer == 0)
        $this->dievalue = $PairDice[2];
     else
        $this->dievalue2 = $PairDice[2];
   
     
    }
    else if($PairDice[0] == $PairDice[2] )
    {
       $PairDice[1];
     if ($this->currentplayer == 0)
        $this->dievalue = $PairDice[1];
     else
        $this->dievalue2 = $PairDice[1];
    
       
    }
    else if($PairDice[1] == $PairDice[2])
    {
      $PairDice[0];
     if ($this->currentplayer == 0)
        $this->dievalue = $PairDice[0];
     else
        $this->dievalue2 = $PairDice[0];
    } 
    
   $_SESSION[$this->Pairss] = true;
    
    }
public function PairCondition()
{ 
    
    if(isset($_SESSION[$this->Pairss]))
    {
   
    return true;
    }
   
}
    public function GetSingleDieValue()
    {   
     return $this->dievalue;
    
    }
    public function GetSingleDieValue2()
    {
     
     return $this->dievalue2;
                       
    }
    
    public function WhoWin()
    {
     
       
     if($this->dievalue2>$this->dievalue)
     {
     
     return true;
     }
     else{
     return false;
     }
     
     
    }
    public function AutomaticWinLose($rollvalues)    // check role who is throwing who                           
    {
    $rankvalue = 3;
    foreach($rollvalues as $pairs)
    {
     $this->WinDice[] = $pairs;
    }
    $result = false;
    if($this->currentplayer == 0)
    {
    $result = $this->gotflush();
    $result = $this->gotDeadflush($rollvalues);
   $result = $this->checkTriple($rollvalues);
    }
    
    else if($this->currentplayer == 1)
    {
    $result =$this->gotflush();
    $result = $this->gotDeadflush();
    $result = $this->checkTriple($rollvalues);
    
    }
    
    if ($this->currentplayer == 0)
        $this->currentplayer = 1;
     else
        $this->currentplayer = 0;
     return $result;   
     
    }
    
    public function gotflush()                  //4-5-6//
    {
    if( ($this->WinDice[0] == 4 && $this->WinDice[1] == 5 && $this->WinDice[2] == 6)
      ||
      ($this->WinDice[0] == 6 && $this->WinDice[1] == 5 &&  $this->WinDice[2] == 4)
      ||
      ($this->WinDice[0] == 4 && $this->WinDice[1] == 6 && $this->WinDice[2] == 5) 
      || ($this->WinDice[0] == 5 && $this->WinDice[1] == 6 && $this->WinDice[2] == 4))
            {
             return true;
            }
            else {
             return false;
            }
    }
    
    public function gotDeadflush()                          //1-2-3//
    {
       if(($this->WinDice[0] == 1 && $this->WinDice[1] == 2 && $this->WinDice[2] == 3)
       ||
       ($this->WinDice[0] == 3 && $this->WinDice[1] == 2 && $this->WinDice[2] == 1)
       ||
       ($this->WinDice[0] == 1 && $this->WinDice[1] == 3 && $this->WinDice[2] == 2)
       || ($this->WinDice[0] == 2 && $this->WinDice[1] == 3 && $this->WinDice[2] == 1))
    {
    return true;
      
    }
    else 
    {
    return false;
    }
    }
   
}
