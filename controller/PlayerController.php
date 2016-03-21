<?php

class PlayerController{
    
    
    
    private $view;
    private $Dicemodel;
    private $DiceGame;
    private $Cash;
    
    public function __construct($dv,$d, $dg ,$p, $c)
    {
        $this->view = $dv;
        $this->Dice = $d;
        $this->DiceGame = $dg;
        $this->Player =$p;
        $this->Cash = $c;
    }
    public function CheckRoll()
    {
        $players = array("Player");    // can change later 
        $this->view->response();  
        
            $valuebet =$this->view->GetValue();
            $this->Cash->bet($valuebet);
            $economy = $this->Cash->GetBankaccount();
            $MoneyBank =  $this->Cash->SessionForBank();
         
          try{  
        if($this->view->HasUserRoll() && $this->view->HasUserCheck())                                           
        {
              $this->Roll($player,$MoneyBank);    
        }
          }
          catch(Exeption $e)
          {
              echo "you forgot to mark in the money";
          }
    }
        public function Roll($player,$MoneyBank)
        { 
            $this->Dice->RollaDice();
            $rollvalues = $this->Dice->GetDiceRolls(); 
            $this->DiceGame->checkPair($rollvalues);
           $this->Cash->PlayerCondition();  // skall bli true
            
            $this->view->showBank($MoneyBank);
            $this->Player->PlayerRole($player,$rollvalues);
            $this->view->setRoll($rollvalues);
            $roles = $this->Player->getRole($player,$rollvalues);
        }
        
        }