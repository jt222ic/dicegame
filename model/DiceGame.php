<?php




class DiceGame{
    
  
  
  private $dievalue;
  private $rankvalue;
  //dead code//
 /* public function Highestvalue($rollvalues)
  { 
     
     foreach($rollvalues as $new)
     {
         $roll[] = $new;                                                                                        
     }
     $Highest= max(array($roll[0],$roll[1],$roll[2]));
     
     //var_dump($Highest);
     
    echo "Banker gets ".$Highest." points   :";
      
  }
  
  // dead code//
  public function Lowestvalue($rollvalues)
  {
      foreach($rollvalues as $new)
     {
         $roll[] = $new;                                                                                        
     }
      $Lowest=min(array($roll[0],$roll[1],$roll[2]));
     
   //  var_dump($Lowest); 
  }
  */
  public function checkPair($rollvalues)                          // if you get pair you count the number of the single value such as   4-4-1 you get value points 1 or  3-3-6 you get value 6
  {
      foreach($rollvalues as $pairs)
      {                                                       // removed all string
          $PairDice[] = $pairs;
      }
     // ($_SESSION["Pair"])
      //{
      
      unset($_SESSION["setPoint"]);
      if($PairDice[0] == $PairDice[1] )                  
      {
          $PairDice[2];
          $this->dievalue = $PairDice[2];
          $_SESSION["Pair"] = true;
          
      }
      else if($PairDice[0] == $PairDice[2] )
      {
            $PairDice[1];
            $this->dievalue = $PairDice[1];
            $_SESSION["Pair"] = true;
            
      }
      else if($PairDice[1] == $PairDice[2])
      {
           $PairDice[0];
           $this->dievalue = $PairDice[0];
           $_SESSION["Pair"] = true;
           
      }
       else if($PairDice[1] == $PairDice[0])
      {
           $PairDice[2];
           $this->dievalue = $PairDice[0];
           $_SESSION["Pair"] = true;
           
      }
      
  }
  
  public function GetSingleDieValue()
  {
          return $this->dievalue;
     // return false;
  }
  
  public function Triples($rollvalues)
  {
    
       foreach($rollvalues as $pairs)
      {
          $TriplesDice[] = $pairs;
      }
      unset($_SESSION["Triples"]);
      
      if($TriplesDice[0] == $TriplesDice[1] && $TriplesDice[0] == $TriplesDice[2])             // 3 of the same
      {
           $_SESSION["Triples"]= true;
      }
      
  }
  
  public function AutomaticWin($rollvalues)                             // works!
  {
      
      foreach($rollvalues as $pairs)
      {
          $WinDice[] = $pairs;
      }
      unset($_SESSION["AutomaticWin"]);
      
      
      if( $WinDice[0] == 4 && $WinDice[1] == 5 && $WinDice[2] == 6
      ||
      $WinDice[0] == 6 && $WinDice[1] == 5 &&  $WinDice[2] == 4
      ||
      $WinDice[0] == 4 && $WinDice[1] == 6 && $WinDice[2] == 5 
      || $WinDice[0] == 5 && $WinDice[1] == 6 && $WinDice[2] == 4
      || $WinDice[0] == 5 && $WinDice[1] == 4 && $WinDice[2] == 6 
      || $WinDice[0] == 6 && $WinDice[1] == 4 &&  $WinDice[2] == 5)
      {
          $_SESSION["AutomaticWin"] =true;
      }
     
      
      
  }
      
      public function AutomaticLoose($rollvalues)                             // works!
  {
      
      foreach($rollvalues as $pairs)
      {
          $WinDice[] = $pairs;
      }
      
      unset($_SESSION["AutomaticLoose"]);
      
      if($WinDice[0] == 1 && $WinDice[1] == 2 && $WinDice[2] == 3           //works!
      ||
      $WinDice[0] == 3 && $WinDice[1] == 2 && $WinDice[2] == 1
      ||
      $WinDice[0] == 1 && $WinDice[1] == 3 && $WinDice[2] == 2 
      || $WinDice[0] == 2 && $WinDice[1] == 3 && $WinDice[2] == 1)
      {
          $_SESSION["AutomaticLoose"] = true;
           
      }
  }
  
 
  
  
 }
  /*
  public function SetPoint($rollvalues)
  {
      if(!$this->AutomaticWin($rollvalues)&&!$this->Triples($rollvalues) &&!$this->checkPair($rollvalues))
      
      echo "got none re-roll";
  }
  */
  
/* wikedia.org
    
    
the banker rolls the dice. There are four outcomes: automatic win, automatic loss, set point, re-roll:

Automatic Win: If the banker rolls 4-5-6, "triples" (all three dice show the same number)
Automatic Loss: If the banker rolls 1-2-3, or a pair (of non-1s) with a 1, he/she instantly loses all bets (the players break the bank).
Set Point: If the banker rolls a pair and a single (2, 3, 4, or 5), then the single becomes the banker's "point." E.g. a roll of 2-2-4 gives the banker a point of 4. Note that you can not set a point of 1 or 6, as those would result in an automatic loss or win, respectively (see above).
Re-roll: If the dice don't show any of the above combinations, then the banker rolls again and keeps rolling until he/she gets an instant win or an instant loss, or sets a point.




The player rolls the dice:

The Players roll the dice
If the banker does not roll an automatic win or loss, they will have rolled a point of 2, 3, 4, or 5. Each player then rolls the dice to settle his individual bet against the banker. 
The player wins with a 4-5-6, triple, or any point higher than the Banker's.
They lose with a 1-2-3, or any point lower than the banker's.
If they tie the banker's point, then it's a "push", no winner or loser, and the player pockets his stake.
If they don't roll win, loss, or point, they continue to roll the dice until they do so.

The first player to win with a 4-5-6 or triple commonly gets the privilege of being the next banker after all the bets of this round are settled.
It's also often the case that 4-5-6 pays double, triples pay three times, and triple 1s pay five times the wager, 
though different betting systems may be agreed upon.



*/
    
