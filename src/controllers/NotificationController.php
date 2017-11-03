<?php


class NotificationController
{
    private $content;

    /**
     * NotificationController constructor.
     * @param $content
     */
    public function __construct($content)
    {
        $this->content = $content;
        $this->showNotification();
    }

    private function showNotification()
    {
        $twig = new TwigConfController();
        echo $twig->load('', 'src/templates/notification', 'notification.twig', ['NotificationController' => $this->content]);
    }
}