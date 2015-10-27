<?php




class DiceGame{



private $dievalue;
private $rankvalue;
private $currentplayer = 0;
private $WinDice;
private $Triples =6;
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

public function checkTriples($rollvalues)
{
$number = 0;
foreach($rollvalues as $triple)
{                                                      // removed all string
if ($number == 0)
$number = $triple;
if ($number != $triple)
return 0;
}

return $number;


}

public function checkPair($rollvalues)                          // if you get pair you count the number of the single value such as   4-4-1 you get value points 1 or  3-3-6 you get value 6
{
// $rankvalue = 1;
// var_dump($rollvalues);

foreach($rollvalues as $pairs)
{                                                       // removed all string
 $PairDice[] = $pairs;
}

if($PairDice[0] == $PairDice[1] )                  
{
 $PairDice[2];
 if ($this->currentplayer == 0)
    $this->dievalue = $PairDice[2];
 else
    $this->dievalue2 = $PairDice[2];
//  $_SESSION["Pair"] = true;
 
}
else if($PairDice[0] == $PairDice[2] )
{
   $PairDice[1];
 if ($this->currentplayer == 0)
    $this->dievalue = $PairDice[1];
 else
    $this->dievalue2 = $PairDice[1];
 //  $_SESSION["Pair"] = true;
   
}
else if($PairDice[1] == $PairDice[2])
{
  $PairDice[0];
 if ($this->currentplayer == 0)
    $this->dievalue = $PairDice[0];
 else
    $this->dievalue2 = $PairDice[0];
  //$_SESSION["Pair"] = true;
  
} 
}

public function GetSingleDieValue()
{      return $this->dievalue;

}
public function GetSingleDieValue2()
{
 return $this->dievalue2;
                   
}



public function AutomaticWinLose($rollvalues)                             // works!
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
$result = $this->gotDeadflush();

}

else if($this->currentplayer == 1)
{
$result =$this->gotflush();
$result = $this->gotDeadflush();
}

if ($this->currentplayer == 0)
    $this->currentplayer = 1;
 else
    $this->currentplayer = 0;
 return $result;   
}


public function gotflush(){
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

public function gotDeadflush()                          
{
if(($this->WinDice[0] == 1 && $this->WinDice[1] == 2 && $this->WinDice[2] == 3)||
($this->WinDice[0] == 3 && $this->WinDice[1] == 2 && $this->WinDice[2] == 1)||
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








/**if( $this->WinDice[0] == 4 && $this->WinDice[1] == 5 && $this->WinDice[2] == 6
                                                                         ||
                                                                         $this->WinDice[0] == 6 && $this->WinDice[1] == 5 &&  $this->WinDice[2] == 4
                                                                         ||
                                                                         $this->WinDice[0] == 4 && $this->WinDice[1] == 6 && $this->WinDice[2] == 5 
                                                                         || $this->WinDice[0] == 5 && $this->WinDice[1] == 6 && $this->WinDice[2] == 4)
                                                                               {
                                                                                echo "straight flush for player";
                                                                               }**/
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

/*

public function Triples($rollvalues)
{

foreach($rollvalues as $pairs)
{
 $TriplesDice[] = $pairs;
}
// unset($_SESSION["Triples"]);

if($TriplesDice[0] == $TriplesDice[1] && $TriplesDice[0] == $TriplesDice[2])             // 3 of the same
{
//    $_SESSION["Triples"]= true;
}
}

*/