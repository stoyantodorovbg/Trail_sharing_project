<?php


class NewsModel
{

    public function writeNews($author_id, $author_name, $source, $subject, $short_content, $content)
    {
        $db = DB::getInstance();

        $query = $db->prepare("
        INSERT INTO `news`
        (`author_id`, `author_name`, `source`, `subject`, `short_content`, `content`)
        VALUES (?, ?, ?, ?, ?, ? )
        ");
        $query->execute([$author_id, $author_name, $source, $subject, $short_content, $content]);
    }
}