<?php


class TrailController
{
    public function getData()
    {
        $this->filterData();

        $author_id = $_SESSION['user_id'];
        $trail_name = $_POST['trail_name'];
        $country = $_POST['country'];
        $region = $_POST['region'];
        $approaches = $_POST['approaches'];
        $difficulty = $_POST['difficulty'];
        $description = $_POST['description'];

        if ($this->checkData($trail_name, $country, $region, $approaches, $difficulty, $description)) {
            $this->sendTrail($author_id, $trail_name, $country, $region, $approaches, $difficulty, $description);
        } else {
            $notification = new NotificationController('The data is invalid!');
        }
    }

    private function checkData($trail_name, $country, $region, $approaches, $difficulty, $description)
    {

        if ($trail_name != '' && mb_strlen($trail_name) < 51 &&
            $country != '' && mb_strlen($country) < 51 &&
            $region != '' && mb_strlen($region) < 51 &&
            $this->checkDifficulty($difficulty) &&
            $approaches != '' &&
            $description != '') {
            return true;
        } else {
            return false;
        }
    }

    private function checkDifficulty($difficulty)
    {

        $difficulties = [
            'easy',
            'intermediate',
            'difficult',
            'very difficult',
            'advanced',
            'extreme',
            'craziness'];

        if (in_array($difficulty, $difficulties)) {
            return true;
        } else {
            return false;
        }

    }

    private function sendTrail($author_id, $trail_name, $country, $region, $approaches, $difficulty, $description) {
        $trail = new TrailModel();
        $trail->writeTrail($author_id, $trail_name, $country, $region, $approaches, $difficulty, $description);
        $notification = new NotificationController('The trail is published.');
    }

    private function filterData()
    {
        $filter_data = new FilterDataController();
        $filter_data->saveFromTagsPost();
    }

}