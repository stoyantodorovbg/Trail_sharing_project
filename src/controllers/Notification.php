<?php


class Notification
{
    private $content;

    /**
     * Notification constructor.
     * @param $content
     */
    public function __construct($content)
    {
        $this->content = $content;
        $this->showNotification();
    }

    private function showNotification()
    {
        $twig = new TwigConf();
        echo $twig->load('', 'src/templates/notification', 'notification.twig', ['notification' => $this->content]);
    }
}