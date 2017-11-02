<?php


class UserLogout
{

    /**
     * UserLogout constructor.
     */
    public function __construct()
    {
        $this->logout();
    }

    private function logout()
    {
        $session = new Session();
        $session->sessionStop();
        $this->goHome();
    }

    private function goHome()
    {
        header('Location: index.php');
    }

}