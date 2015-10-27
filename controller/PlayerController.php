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
           
                                                                                // if player have roll
        if($this->view->HasUserRoll())                                            // det ska vara en fiende
        {
            foreach($players as $player)
            {
              $this->Roll($player);                  // Player?//
            }
        }
        
        
    }
    
    public function Roll($player)
    { 
        
        
        
        $this->Dicemodel->RollaDice();
        $rollvalues = $this->Dicemodel->GetDiceRolls(); 
         
         
        if (!$this->DiceGame->AutomaticWinLose($rollvalues))
        {
            
            if(!$this->DiceGame->checkTriples($rollvalues))
            {
           $this->DiceGame->checkPair($rollvalues); 
            }
        }
        
        $scores = $this->DiceGame->checkTriples($rollvalues);
        //var_dump($rollvalues);
         // $dc->Highestvalue($rollvalue);
       // $this->DiceGame->Triples($rollvalues);
        
        //view 
        //@param  $role = string name  
        $this->Player->PlayerRole($player,$rollvalues);
       $this->view->setRoll($rollvalues);
        $this->view->checkSession();
         
       
 
       // identifiera spelare
        $roles = $this->Player->getRole();
        
         $this->view->deliverMessage($roles,$rollvalues);
      
        
        
       
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