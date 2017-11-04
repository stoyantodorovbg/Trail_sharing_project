<?php


class AlbumModel
{
    public function writeAlbum($author_id, $title, $description)
    {
        $db = DB::getInstance();

        $query = $db->prepare("
        INSERT INTO `albums`
        (`author_id`, `title`, `description`)
        VALUES (?, ?, ?)
        ");
        $query->execute([$author_id, $title, $description]);
    }
}