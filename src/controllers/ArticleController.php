<?php


class ArticleController
{
    public function getData()
    {
        $this->filterData();

        $author_id = $_SESSION['user_id'];
        $title = $_POST['title'];
        $subject = $_POST['subject'];
        $short_content = $_POST['short_content'];
        $content = $_POST['content'];

        if ($this->checkData($title, $subject, $short_content, $content)) {
            $this->sendArticle($author_id, $title, $subject, $short_content, $content);
        } else {
            $notification = new NotificationController('The data is invalid!');
        }
    }

    private function checkData($title, $subject, $short_content, $content)
    {
        if ($title != '' && mb_strlen($title) < 251 &&
            $subject != '' && mb_strlen($subject) < 251 &&
            $short_content != '' &&
            $content != '') {
            return true;
        } else {
            return false;
        }
    }

    private function sendArticle($author_id, $title, $subject, $short_content, $content) {
        $article = new ArticleModel();
        $article->writeArticle($author_id, $title, $subject, $short_content, $content);
        $notification = new NotificationController('The article is published.');
    }

    private function filterData()
    {
        $filter_data = new FilterDataController();
        $filter_data->saveFromTagsPost();
    }
}