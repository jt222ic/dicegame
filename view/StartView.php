<?php


class StartView{
  
  
     public function response()
     {
        $this->message = $this->generateRegisterFormHTML();
        return $this->message;
    }
 public function generateRegisterFormHTML()
{
    	return "
    	<img src = '../model/pic/CeeLo.jpg'  >
    	
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

}
