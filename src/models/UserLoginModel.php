<?php


class UserLoginModel
{
    private $username;
    private $password;

    /**
     * UserLoginModel constructor.
     * @param $username
     * @param $password
     */
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    public function login()
    {
        $username = $this->username;
        $password = $this->password;
        $db = DB::getInstance();
        $query = $db->prepare("
        SELECT `username`, `password`, `user_id`, `role_id`
        FROM `users`
        WHERE `username` = \"$username\"
        AND `password` = \"$password\"
        ");
        $query->execute();

        $result = $query->fetchAll(PDO::FETCH_ASSOC);
        if(count($result) === 1 &&
        $result[0]['username'] === $this->username &&
        $result[0]['password'] === $this->password) {
            return [true, $result[0]['username'], $result[0]['user_id'], $result[0]['role_id']];
        } else {
            return [false];
        }
    }


}