<?php


class User
{
    private $username;
    private $password;
    private $role_id;
    private $email;
    private $first_name = '';
    private $last_name = '';
    private $age = '';

    /**
     * User constructor.
     * @param $username
     * @param $password
     * @param $role
     * @param $email
     */
    public function __construct($username, $password, $email, $role_id)
    {
        $this->username = $username;
        $this->password = $password;
        $this->role_id = $role_id;
        $this->email = $email;
    }

    public function registerUser()
    {
        $db = DB::getInstance();
        $reg_user = $db->prepare("
        INSERT INTO `users`
        (`username`, `password`, `role_id`, `email`, `first_name`, `last_name`, `age`)
        VALUES (?, ?, ?, ?, ?, ?, ?)
        ");
        $reg_user->execute([$this->username, $this->password, $this->role_id, $this->email, $this->first_name, $this->last_name, $this->age]);

        if ($this->checkRegistrationSuccess()) {
            $this->startSession();
        } else {
            $notification = new Notification('Unsuccessful register. Something went wrong! Try to input correct data!');
        }
    }

    private function checkRegistrationSuccess()
    {
        $username = $this->username;
        $db = DB::getInstance();
        $check_reg = $db->prepare("
        SELECT `username`
        FROM `users`
        WHERE `username` = \"$username\";
        ");
        $check_reg->execute();
        $reg = false;
        foreach ($check_reg as $i => $iv) {
            $reg = $iv['username'];
        }
        if ($reg) {
            return true;
        } else {
            return false;
        }
    }

    private function startSession()
    {
        $session = new Session($this->username, $this->role_id);
        $session->sessionStart();
        $notification = new Notification('Success register!');
    }

    /**
     * @param string $first_name
     */
    public function setFirstName(string $first_name)
    {
        $this->first_name = $first_name;
    }

    /**
     * @param string $last_name
     */
    public function setLastName(string $last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @param string $age
     */
    public function setAge(string $age)
    {
        $this->age = $age;
    }
}