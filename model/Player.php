<?php




class Player{
     
    private $name;
    private $score;
    private $role;

    public function __construct()
    {
    $this->role = array();
    }
    public function PlayerRole($player,$rollvalues)
    {
    $this->score = $rollvalues;
    
    
    array_push($this->role, $player);
    for($p = 1; $p < count($this->role); $i++)       // Length of player array eller $role inre array
        {
       $this->score[$p];
        }
    
    $this->name = $player;
    

                                                                   // varför inte foreach? //
    }
    
   
    public function GetRole()
    {
        return $this->name;
    }
    
    public function GetScore()
    {
        return $this->score;
    }







}
