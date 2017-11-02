<?php


class UserRegisterModel
{
    private $username;
    private $password;
    private $role_id;
    private $email;
    private $first_name = '';
    private $last_name = '';
    private $age = '';

    /**
     * UserRegisterModel constructor.
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
        $register_success = false;

        try {
        $reg_user = $db->prepare("
        INSERT INTO `users`
        (`username`, `password`, `role_id`, `email`, `first_name`, `last_name`, `age`)
        VALUES (?, ?, ?, ?, ?, ?, ?)
        ");
        $reg_user->execute([$this->username, $this->password, $this->role_id, $this->email, $this->first_name, $this->last_name, $this->age]);
        $register_success = true;
        } catch (PDOException $e) {
            echo 'erorrrrrrrrrrrrrrr'.$e;
        }

        if ($register_success === true) {
            $get_id = $db->prepare("
            SELECT LAST_INSERT_ID()
            FROM `users`
            ");
            $get_id->execute();
            $get_id_arr = $get_id->fetchAll(PDO::FETCH_ASSOC);
            return [true, $this->username, $get_id_arr[0]['LAST_INSERT_ID()']];
        } else {
            return [false];
        }
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