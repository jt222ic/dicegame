<?php


class LoginView
{
private static $password = "AdminView::Password";
private static $username = "AdminView::Username";
private static $login = "AdminView::Login";
private static $message;
   


public function response()
{
    $response = $this->HTMLLoginPage();
    return $response;
    
}

     public function HTMLLoginPage()
     {
      return 
      '
       <div id="head">
            <h1>Admin Login</h1>
            <hr>
       </div>
              
          <div id="LoginArea">
          
           <form method="post" > 
           <fieldset>
         
				   <label for="'.self::$username.'">Username:</label>
				   <input type="text" id="' . self::$username . '" name="' . self::$username . '" /> 
				   
				   
				   <label for="' . self::$password . '">Password :</label>
					<input type="password" id="' . self::$password . '" name="' . self::$password . '" /> 
					<input type="submit" name="' . self::$login . '" value="login" />
					'. self::$message .'
			</fieldset>
			
		
			</form>
                  
              </div>
              
              <footer>
              <hr>
              
              </footer>
      '; 
    }
    
    public function setMessage($message)
    {
        self::$message = $message;
    }
    
    public function loginPost()
    {
        if(isset($_POST[self::$login]))
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    public function getPassword()
    {
        return $_POST[self::$password];
    }
      public function getUsername()
    {
        return $_POST[self::$username];
    }
    
   
    
}
