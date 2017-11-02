<?php


class Session
{
    private $status;

    public function sessionStart($username, $user_id, $role_id)
    {
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['role_id'] = $role_id;
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