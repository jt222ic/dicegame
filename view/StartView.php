<?php


class StartView{
  
  
     public function response()
     {
        $this->message = $this->generateRegisterFormHTML();
        return $this->message;
    }
 

 public function generateRegisterFormHTML()
{
    	return '
    	<p>nejj</p>
		';
}

}
