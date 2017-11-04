<?php


class AlbumController
{
    public function getData()
    {
        $this->filterData();

        $author_id = $_SESSION['user_id'];
        $title = $_POST['title'];
        $description = $_POST['description'];

        if ($this->checkData($title)) {
            $this->sendContact($author_id, $title, $description);
        } else {
            $notification = new NotificationController('The data is invalid!');
        }
    }

    private function checkData($title)
    {
        if ($title != '' && mb_strlen($title) < 5) {
            return true;
        } else {
            return false;
        }
    }

    private function sendContact($author_id, $title, $description) {
        $album = new AlbumModel();
        $album->writeAlbum($author_id, $title, $description);
        $notification = new NotificationController('The album is published.');
    }

    private function filterData()
    {
        $filter_data = new FilterDataController();
        $filter_data->saveFromTagsPost();
    }
}