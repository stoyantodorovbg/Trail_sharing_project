<?php


class ContactModel
{
    public function writeContact($content, $first_name, $last_name, $email)
    {
        $db = DB::getInstance();

        $query = $db->prepare("
        INSERT INTO `contact_messages`
        ( `comment`, `first_name`, `last_name`, `email`)
        VALUES (?, ?, ?, ?)
        ");
        $query->execute([$content, $first_name, $last_name, $email]);
    }
}