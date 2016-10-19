<?php

class PlayerController{
    
    
    
    private $view;
    private $Dicemodel;
    private $DiceGame;
    private $Cash;
    
    public function __construct($dv,$d, $dg, $c)
    {
        $this->view = $dv;
        $this->Dice = $d;
        $this->DiceGame = $dg;
        $this->Cash = $c;
    }
    public function CheckRoll()
    {
        
        $this->view->response();
        $valuebet = $this->view->GetValue();
        $this->Cash->bet($valuebet);
          try{  
        if($this->view->HasUserRoll() && $this->view->HasUserCheck())                                           
        {
              $this->Roll();   
              $this->renderRollNCASH();
        }
          }
          catch(Exeption $e)
          {
              echo "you forgot to mark in the money";
          }
    }
        public function Roll()
        { 
            $this->Dice->RollaDice();
            $DicetoRule = $this->Dice->GetDiceRolls();
            $this->DiceGame->Condition($DicetoRule);
        }
        
        public function renderRollNCASH()
        {
            $this->view->setRoll();         
            $this->view->showBank();
            $this->view->viewPlayercondition();
            
        }
        }