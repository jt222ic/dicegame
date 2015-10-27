<?php




class Player{
     
    private $name;
    private $score;
    private $role;


    

    
    public function PlayerRole($player,$rollvalues)
    {
    $this->role = array();
    $this->score = $rollvalues;
    
    
    array_push($this->role, $player);
  
    

   
    
    for($p = 0; $p < count($this->role); $p++)          //Length of player array eller $role inre array
        {
            
         $this->score;
        }
                                                         //  array_push($this->role,$this->score);                                                       //var_dump($rollvalues);                  // varför inte foreach? //
    } 
   
    public function getRole()
    {  
        return $this->role;
    }
    
/*    public function Brah()
    {
        
        return $this->role;
        
    }
    public function nah()
    {
        return $this->score;
    }
    
    
    */

   
}

