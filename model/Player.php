<?php




class Player{
     
    
    private $score;
    private $role;
    
            public function PlayerRole($player,$rollvalues)
            {
        $this->role = array();
        $this->score = $rollvalues;
        array_push($this->role, $player);
        
        
        for($p = 0; $p < count($this->role); $p++)          
                {
             $this->score;
                }
            } 
            public function getRole()
            {  
            return $this->role;
            }
        } 

   


