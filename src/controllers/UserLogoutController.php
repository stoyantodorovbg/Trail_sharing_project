<?php


class UserLogoutController
{

    /**
     * UserLogoutController constructor.
     */
    public function __construct()
    {
        $this->logout();
    }

    private function logout()
    {
        $session = new SessionController();
        $session->sessionStop();
        $this->goHome();
    }

    private function goHome()
    {
        header('Location: index.php');
    }

}