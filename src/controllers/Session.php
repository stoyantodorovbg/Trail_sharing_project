<?php


class Session
{
    public function sessionStart($username, $user_id, $role_id)
    {
        $_SESSION['username'] = $username;
        $_SESSION['user_id'] = $user_id;
        $_SESSION['role_id'] = $role_id;
    }

    public function sessionStop()
    {
        session_destroy();
    }
}