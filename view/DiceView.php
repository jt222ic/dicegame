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
  
  public function HasUserCheck()
  {
   if(isset($_POST["formDoor1"]))
   {
    return true;
   }
   else
   {
   return false;
   }
  }
   public function GetValue()
   {
    return $_POST["formDoor1"];
   }
  public function __construct($d, $dg ,$p)
  {
     $this->dicegame = $dg;
     $this->player = $p;
  }
 public function setRoll($roll)     
 {  
     foreach($roll as $rolls)
     {
        $this->roll[]= $rolls;
     }
       // to write out and specify array in each and place them with img src //
     for ($i = 0; $i < count($this->roll); $i++) {                                       
         if($this->roll[$i] == 1)                                  
         {
           $this->Pics[$i] = '<img src="pic/dice1.png"alt = dice1';
         }
         if($this->roll[$i] == 2)
         {
           $this->Pics[$i] = '<img src="pic/dice2.png"alt = dice2';
         }
         if($this->roll[$i] == 3)
         {
           $this->Pics[$i] = '<img src="pic/dice3.png"alt = dice3';
         }
         if($this->roll[$i] == 4)
         {
           $this->Pics[$i] = '<img src="pic/dice4.png"alt = dice4';
         }
         if($this->roll[$i] == 5)
         {
           $this->Pics[$i] = '<img src="pic/dice5.png"alt = dice5';
         }
          if($this->roll[$i] == 6)
         {
           $this->Pics[$i] = '<img src="pic/dice6.png"alt = dice6';
         }
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
    public function showBank($MoneyBank)
    {
      echo "Bank Account:".$MoneyBank;
     
    }

    
    public function generateDicePlatformHTML()
    {
    return '
     
    <form action="index.php?DiceGame" method="POST">
    
    <input type="radio" name="formDoor1" value="50$" />50$$ 
    <input type="radio" name="formDoor1" value="100$" />100$$
    <input type="radio" name="formDoor1" value="200$" />200$<br>
    
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


  