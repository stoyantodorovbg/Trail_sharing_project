<?php


class UserLoginController
{

    public function getData()
    {
        $this->filterData();

        $username = $_POST['username'];
        $password = $_POST['password'];
        $hashed_password = $this->hashPassword($password);

        $this->login($username, $hashed_password);
    }

    private function login($username, $password)
    {
        $login = new UserLoginModel($username, $password);
        $try_login = $login->login();
        if ($try_login[0] === true) {
            $this->startSession($try_login[1], $try_login[2], $try_login[3]);
        } else {
            $notification = new NotificationController('Unsuccessful login. Try to input correct data!');
        }
    }

    private function startSession($username, $user_id, $role_id)
    {
        $session = new SessionController();
        $session->sessionStart($username, $user_id,  $role_id);
        $notification = new NotificationController('Success login!');
    }

    private function hashPassword($password)
    {
        return hash('sha256', $password);
    }

    private function filterData()
    {
        $filter_data = new FilterDataController();
        $filter_data->saveFromTagsPost();
    }

}