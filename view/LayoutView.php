<?php


class LayoutView{
    
    
    public function render($dv) {
    echo '<!DOCTYPE html> 
      <html>
        <head>
          <meta charset="utf-8">
          <title>Login Example</title>
        </head>
        <body>
          <h1>DiceGame</h1>
          ' . $this->HyperLinkbutton($dv) . '
          
          <div class="container">
  
        '.$dv->response().'
             
          </div>
         </body>
      </html>
    ';
    }
    
    private function HyperLinkbutton($dv)
    
    {
          if(isset($_GET["DiceGame"]))
          {
              return '<a href=?>Return Home</a>';
              
          }
          else 
          {
          
              return '<a href=?DiceGame>Play Game</a>';
          }
        
        
    }
}