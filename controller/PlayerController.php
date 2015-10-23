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
        $players = array("Player","Bank");
        $this->view->response();
           
           try{                                                                       // if player have roll
        if($this->view->HasUserRoll())                                            // det ska vara en fiende
        {
            foreach($players as $player)
            {
              $this->Roll($player);                  // Player?//
            }
        }
        
        }
        catch(EXCEPTION $e)
        {
            $this->StatusMessage($e->GetMessage());
        }
    }
    
    public function Roll($player)
    {
        $this->Dicemodel->RollaDice();
        $rollvalues = $this->Dicemodel->GetDiceRolls(); 
         
         
        $this->DiceGame->AutomaticWin($rollvalues);
        $this->DiceGame->AutomaticLoose($rollvalues);                           
        $this->DiceGame->checkPair($rollvalues); 
                                           // $dc->Highestvalue($rollvalue);
        $this->DiceGame->Triples($rollvalues);
        
        //view 
        //@param  $role = string name  
        
        $this->view->setRoll($rollvalues);
        $this->view->checkSession($string);
       
       
       
     
       
       // identifiera spelare
        
        $this->Player->PlayerRole($player,$rollvalues);
        
        
       
       /*$TakeMessage =$dc->ReturnMessage();
       $this->view->GetMessage($TakeMessage);
       */
        /*
        
         $submit = new DomDocument;
         $submit->document.getElementById('Click');
         $submit->disabled = true; */
        
       // var_dump($rollvalue);// instantiera nya värdet in till spelregler DiceGame
        //var_dump($rollvalues);     finding the value in array
         
    }
  
    
    
    
}