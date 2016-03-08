<?php


class LayoutView{
  
  
    public function render($v) {
    echo '<!DOCTYPE html> 
      <html>
        <head>
          <meta charset="utf-8">
          <title>Login Example</title>
        </head>
        <body>
          <h1>DiceGame</h1>
          
          <div class="container">
        '.$v->response().'
          </div>
         </body>
      </html>
    ';
    }
}