<?php


class DiceView{
    
    private $dicegame;
   
    
    private $messager;
    private $value;
    private $roll;
    
    private static $BigText;
    
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
  
  
  public function checkSession()
  {
    //$dicegame = new DiceGame();
   
   if(isset($_SESSION["Pair"]))
   {
      $this->messager = "$role got " .  $this->dicegame->GetSingleDieValue();
      
   }
    if(isset($_SESSION["AutomaticWin"]))
   {
      $this->messager = "$role got StraightFluash";
      
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
 

public function StatusMessage($e)                                               // tar emot exception  och Getmessage finns i Exception klassen
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
      <input type="Submit" name="roll" value="RollaDice" id="Click" >
      self::$BigText
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
       '.$this->messager.'
       
';
        
        
    }
    
}