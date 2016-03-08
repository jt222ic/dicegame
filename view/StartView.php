<?php


class StartView{
  
  
     public function response()
     {
       
        $response = $this->generateRegisterFormHTML();
             // will switch response if clicking on the hyperlink
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
    	
    	<a href=?Dice>link to what?</a>
    	<p>version 0.0.3 Jan Bananis 1/2  need fix on A.I, Cashflow, login on much later iteration</p>
		";
}

public function hyperlinktoGame()
{
    
    if(isset($_GET["Dice"]))
    {
        return true;
    }
    else {
            return false;
    }
    
}

}
