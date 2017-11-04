<?php


class NewsController
{
    public function getData()
    {
        $this->filterData();

        $author_id = $_SESSION['user_id'];
        $author_name = $_POST['author_name'];
        $source = $_POST['source'];
        $subject = $_POST['subject'];
        $short_content = $_POST['short_content'];
        $content = $_POST['content'];

        if ($this->checkData($author_name, $source, $subject, $short_content, $content)) {
            $this->sendContact($author_id, $author_name, $source, $subject, $short_content, $content);
        } else {
            $notification = new NotificationController('The data is invalid!');
        }
    }

    private function checkData($author_name, $source, $subject, $short_content, $content)
    {
        if ($author_name != '' && mb_strlen($author_name) < 251 &&
            $source != '' && mb_strlen($source) < 251 &&
            $subject != '' && mb_strlen($subject) < 251 &&
            $short_content != '' &&
            $content != '') {
            return true;
        } else {
            return false;
        }
    }

    private function sendContact($author_id, $author_name, $source, $subject, $short_content, $content) {
        $contact = new NewsModel();
        $contact->writeNews($author_id, $author_name, $source, $subject, $short_content, $content);
        $notification = new NotificationController('The news is published.');
    }

    private function filterData()
    {
        $filter_data = new FilterDataController();
        $filter_data->saveFromTagsPost();
    }

}