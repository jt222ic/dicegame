<?php


class DiceView{
    
    private $dicegame;
    private $value;
    private $roll;
    private $Player;
    private $Banker;
    
   
    
    private static $BigText = "";
    
  public function HasUserRoll()    
  {
      if(isset($_POST["roll"]))
      {
          return true;
      }
      return false;
  }
  
  
  public function __construct($d, $dg ,$p)
  {
     $this->dicegame = $dg;
     $this->player = $p;
  }
  
 /* 
  public function checkSession()
  {
    //$dicegame = new DiceGame();
   
   if(isset($_SESSION["Pair"]))
   {
     // $this->messager = $this->dicegame->GetSingleDieValue();
      
   }
    if(isset($_SESSION["AutomaticWin"]))
   {
      //$this->messager = "$role got StraightFluash";
      
   }
   if(isset($_SESSION["AutomaticLoose"]))
   {
      $this->messager = "$role got Bankruptcy";
   }
    if(isset($_SESSION["Triples"]))
   {
      $this->messager = "$role got Triples of ". $this->roll[0];
      
   }
   if(isset($_SESSION["setPoint"]))
   {
    $this->messager = "$role got none re-roll";
   }
   return false;
  }
  */
 public function setRoll($roll)
 {  
     foreach($roll as $rolls)
     {
        $this->roll[]= $rolls;
        
     }
     
     for ($i = 0; $i < count($this->roll); $i++) {                                      // loopa igenom array id i roll 
         if($this->roll[$i] == 1)                                  // det finns bättre alternativ
         {
           $this->Pics[$i] = '<img src="model/pic/dice1.png"alt = dice1';
         }
         if($this->roll[$i] == 2)
         {
           $this->Pics[$i] = '<img src="model/pic/dice2.png"alt = dice2';
         }
         if($this->roll[$i] == 3)
         {
           $this->Pics[$i] = '<img src="model/pic/dice3.png"alt = dice3';
         }
         if($this->roll[$i] == 4)
         {
           $this->Pics[$i] = '<img src="model/pic/dice4.png"alt = dice4';
         }
         if($this->roll[$i] == 5)
         {
           $this->Pics[$i] = '<img src="model/pic/dice5.png"alt = dice5';
         }
          if($this->roll[$i] == 6)
         {
           $this->Pics[$i] = '<img src="model/pic/dice6.png"alt = dice6';
         }
     }

 }
 
 public function deliverMessage($roles,$rollvalues){

   foreach($roles as $role)
   {
    $this->test[] = $role;
   }
   

    if($this->dicegame->gotflush() && !$this->dicegame->WhoWin())
    {
    $this->Player = $this->test[0].": gets StraightFluash";
    $this->Banker = $this->test[1].": Give up";
    }
    else if($this->dicegame->gotDeadflush())
    {
    $this->Player = $this->test[0].": Gets Bankruptcy";
     $this->Banker = $this->test[1].": Winner";
    }
    else if($this->dicegame->GetTriple())
    {
     $this->Player = $this->test[0].": Gets Triple of ".$this->dicegame->GetSingleDieValue2();
     $this->Banker = $this->test[1].": Give up";
    }
      
   
    else{
    $this->Player = $this->test[0].": gets ".$this->dicegame->GetSingleDieValue2();
    $this->Banker = $this->test[1].": gets ".$this->dicegame->GetSingleDieValue();
    }
    
    if($this->dicegame->WhoWin()&& ! $this->dicegame->gotflush() &&! $this->dicegame->GetTriple() && !$this->dicegame->gotDeadflush())
    {
     $this->messager = $this->test[0]."Wins $$$";
    }
    else if($this->dicegame->GetSingleDieValue2 == $this->dicegame->GetSingleDieValue() && !$this->dicegame->getTriple() && !$this->dicegame->gotDeadflush())
    {
       $this->messager = " It's Draw, Re-roll!Even if you can do this all the time";
    }
    else if($this->dicegame->gotflush()||$this->dicegame->getTriple()|| $this->dicegame->GetSingleDieValue2()>$this->dicegame->GetSingleDieValue())
    {
     $this->messager = "ULTIMATE VICTORY";
    }
    else 
    {
     $this->messager =$this->test[1]."Wins $$$";
    }

  }
 
public function StatusMessage($e)                                               
	 {
	 	 self::$BigText = $e;
	 	 
	 }
    public function response()
    
    {
       $response = $this->generateDicePlatformHTML();
       
        return $response;
    }
    public function generateDicePlatformHTML()
    {
        return '<form action="index.php?DiceGame" method="POST">
        <img src="../model/pic/Ceelow.jpeg" ><br>
      <input type="Submit" name="roll" value="RollaDice" id="Click" >
      '.self::$BigText.'
      
       <p>Dice1</p>
       '.$this->roll[0].'
       '.$this->Pics[0].'
      </form>
      
      <form>
      <p>Dice2</p>
       '.$this->roll[1].'
       '.$this->Pics[1].'
        
        </form>
      
      <form>
      <p>Dice3</p>
       '.$this->roll[2].'
      '.$this->Pics[2].'
      
      </form>
      
       <br>
       <br>
       <br>
       '.$this->Player.'
       
       <br>
       <br>
       '.$this->Banker.'
       <br>
       <br>
       '.$this->messager.'
       
       
       
';
        
        
    }
    
}