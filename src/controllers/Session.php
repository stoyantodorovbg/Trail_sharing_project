<?php


class Session
{
    private $status;
    private $username;
    private $role_id;

    /**
     * Session constructor.
     * @param $username
     * @param $role_id
     */
    public function __construct($username, $role_id)
    {
        $this->username = $username;
        $this->role_id = $role_id;
    }


    public function sessionStart()
    {
        $_SESSION['username'] = $this->username;
        $_SESSION['role_id'] = $this->role_id;
        $this->status = true;
    }

    public function sessionStop()
    {
        session_destroy();
        $this->status = false;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->status;
    }


}