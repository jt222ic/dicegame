<?php


class StartView{
  
  public static $GetInGame = "DiceGame";
  
     public function response()
     {
        $response=$this->generateRegisterFormHTML();
        $response.=$this->hyperlinktoGame();
        return $response;
    }
 public function generateRegisterFormHTML()
{
    	return "
    	<img src = '../pic/CeeLo.jpg'  >
    	<ul>
    	<li> The Banker rolls the dice. There are four outcomes </li>
    	<li> Automatic win </li>
    	<li> Automatic loss </li>
    	<li> set point : If the banker role a pair and a single, the points are counted on the single dice</li>
    	<li> re-roll </li>
    	</ul>
    	<ul>
    	<li> The Player rolls the dice. There are four outcomes </li>
    	<li> Automatic win </li>
    	<li> Automatic loss </li>
    	<li> set point :  If the banker role a pair and a single, the points are counted on the single dice </li>
    	<li> re-roll </li>
    	</ul>
    	
    	<p>version 0.0.3 Jan Bananis 1/2  need fix on A.I, Cashflow, login on much later iteration</p>
		";
}
public function hyperlinktoGame()
{
    if(!isset($_GET[self::$GetInGame]))
    {
 $response= "<a href='?".self::$GetInGame."'>Link to the Game?</a>";
    }
    else{ 
$response = "<a href='?'>Back to Main Menu?</a>"; 
    }
  return $response;
}
public function GetGame()
{  
    return isset($_GET[self::$GetInGame]);
}

}
