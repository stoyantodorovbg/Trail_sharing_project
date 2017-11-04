<?php


class ArticleModel
{
    public function writeArticle($author_id, $title, $subject, $short_content, $content)
    {
        $db = DB::getInstance();

        $query = $db->prepare("
        INSERT INTO `articles`
        (`author_id`, `title`, `subject`, `short_content`, `content`)
        VALUES (?, ?, ?, ?, ?)
        ");
        $query->execute([$author_id, $title, $subject, $short_content, $content]);
    }
}