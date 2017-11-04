<?php


class ContactController
{

    public function getData()
    {
       $this->filterData();

        $content = $_POST['comment'];
        $first_name = $_POST['first_name'];
        $last_name = $_POST['last_name'];
        $email = $_POST['email'];

        if ($this->checkData($content)) {
            $this->sendContact($content, $first_name, $last_name, $email);
        } else {
            $notification = new NotificationController('The comment field cannot be empty!');
        }
    }

    private function checkData($content)
    {
        if ($content != '') {
            return true;
        } else {
            return false;
        }
    }

    private function sendContact($content, $first_name, $last_name, $email) {
        $contact = new ContactModel();
        $contact->writeContact($content, $first_name, $last_name, $email);
        $notification = new NotificationController('Thank you for this feedback! It is useful for us.');
    }

    private function filterData()
    {
        $filter_data = new FilterDataController();
        $filter_data->saveFromTagsPost();
    }

}