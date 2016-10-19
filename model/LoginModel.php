<?php



class LoginModel
{
    
    public function checkLogin($username,$password)
    {
        $correctUsername ="Jan";
        $correctPW = "Tran";
        
        if($correctPW == $password && $correctUsername == $username)
        {
            $_SESSION['isLoggedIn'] = true;
           
            $this->CheckSession();
            return true;
        }
        else
        {
            throw new Exception("Wrong Password or Username");
        }
    }
    
    public function CheckSession()
    {
        if(isset($_SESSION['isLoggedIn']))
        {
            return $_SESSION['isLoggedIn'];
        }
        else
    {
        return false;
    }
    }
    
}