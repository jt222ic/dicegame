<?php

class PlayerController{
    
    
    
    private $view;
    private $Dicemodel;
    private $DiceGame;
    
    
    public function __construct($dv,$d, $dg ,$p)
    {
        $this->view = $dv;
        $this->Dicemodel = $d;
        $this->DiceGame = $dg;
        $this->Player =$p;
    }
    
    public function generatehtml()
    {
        $players = array("Player","Banker");
        $this->view->response();                                        
        
        if($this->view->HasUserRoll())                                           
        {
            foreach($players as $player)
            {
              $this->Roll($player);                  
            }
        }
    }
        public function Roll($player)
        { 
            $this->Dicemodel->RollaDice();
            $rollvalues = $this->Dicemodel->GetDiceRolls(); 
            $this->Player->PlayerRole($player,$rollvalues);
            $this->view->setRoll($rollvalues);
            $roles = $this->Player->getRole($player,$rollvalues);
            
        }
        
        }
        
 