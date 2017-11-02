<?php


class UserRegister
{
    private $user;

    public function getData()
    {
        $filter_data = new FilterData();
        $filter_data->saveFromTagsPost();

        $username = $_POST['username'];
        $password = $_POST['password'];
        $repeat_password = $_POST['repeat_password'];
        $email = $_POST['email'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $age = $_POST['age'];

        $this->checkData($username, $password, $repeat_password, $email, $first_name, $last_name, $age);
    }

    private function checkData($username, $password, $repeat_password, $email, $first_name = '', $last_name = '', $age = '')
    {
        $checkEmail = $this->checkEmail($email);
        $checkUsername = $this->checkUsername($username);
        $checkPassword = $this->checkPassword($password, $repeat_password);


        if ($checkEmail[0] == 0) {
            $this->createNotification($checkEmail[1]);
        } elseif ($checkUsername[0] == 0) {
            $this->createNotification($checkUsername[1]);
        } elseif ($checkPassword[0] == 0) {
            $this->createNotification($checkPassword[1]);
        } else {
            $hashed_password = $this->hashPassword($password);
            $this->user = new User($username, $hashed_password, $email, 1);
            if ($first_name != '') {
                $this->user->setFirstName($first_name);
            }
            if ($last_name != '') {
                $this->user->setLastName($last_name);
            }
            if ($age != '') {
                $this->user->setAge($age);
            }
            $this->user->registerUser();
        }
    }

    private function hashPassword($password)
    {
           return hash('sha256', $password);
    }

    private function checkPassword($password, $repeat_password) {
        if (mb_strlen($password) < 7 || mb_strlen($password) > 25) {
            return [0, 'Incorrect password!'];
        } else if ($password !== $repeat_password) {
            return [0, 'Repeat your password correctly!'];
        } else {
            return [true];
        }
    }

    private function checkEmail($email)
    {

        $used_email = false;
        $db = DB::getInstance();
        $check_email = $db->prepare("
        SELECT `email`
        FROM `users`
        WHERE `email` = \"$email\"
        ");
        $check_email->execute();
        foreach ($check_email as $i => $iv) {
            $used_email = $iv['email'];
        }
        $check_email->execute();
        if ($used_email) {
            return [0, $used_email.' email is already used!'];
        } elseif (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return [true];
        } else {
                return [0, 'The email is in invalid format!'];
        }

    }

    private function checkUsername($username)
    {
        $used_username = false;
        $db = DB::getInstance();
        $check_username = $db->prepare("
        SELECT `username`
        FROM `users`
        WHERE `username` = \"$username\"
        ");
        $check_username->execute();
        foreach ($check_username as $i => $iv) {
            $used_username = $iv['username'];
        }
        $check_username->execute();
        if (mb_strlen($username) < 5 || mb_strlen($username) > 25) {
            return [0, 'The username must be of 5 to 25 symbols!'];
        } else if ($used_username) {
            return [0, 'This username is already used.'];
        } else {
            return [true];
        }
    }

    private function createNotification($content) {
        return new Notification($content);
    }
}