<?php

class LogController
{
    public function __construct(LoginView $lv, LoginModel $lm, LayoutView $l)
    {
    $this->LoginView = $lv;
    $this->LoginModel = $lm;
    $this->LayoutView = $l;
    }
    public function initLogin()
    {
        $this->adminWantsToLogin();
    }
    public function renderLoginLayout()
    {
      $this->LayoutView->render($this->LoginView);
    }
    public function adminWantsToLogin()
    {
     if($this->LoginView->loginPost())
    {
        try
        {
        $this->LoginModel->checkLogin($this->LoginView->getUsername(),$this->LoginView->getPassword());
        }
        catch(Exception $e)
        {
            $this->LoginView->setMessage($e);
        }
    }
    }
    
    public function isLoggedin()
    {
        return $this->LoginModel->CheckSession();
    }
    
}