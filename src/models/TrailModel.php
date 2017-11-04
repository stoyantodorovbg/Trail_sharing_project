<?php


class TrailModel
{
    public function writeTrail($author_id, $trail_name, $country, $region, $approaches, $difficulty, $description)
    {
        $db = DB::getInstance();
        $query = $db->prepare("
        INSERT INTO `trails`
        (`author_id`, `trail_name`, `country`, `region`, `approaches`, `difficulty`, `description`)
        VALUES (?, ?, ?, ?, ?, ?, ? )
        ");
        $query->execute([$author_id, $trail_name, $country, $region, $approaches, $difficulty, $description]);
    }
}