<?php


class TwigConf
{
    public function load($cachePath, $templatePath, $fileName, $array = [])
    {
        $loader = new Twig_Loader_Filesystem($templatePath);
        $twig = new Twig_Environment($loader);

        $twig->addGlobal('_post', $_POST);
        $twig->addGlobal('_get', $_GET);
        $twig->addGlobal('_session', $_SESSION);

        return $twig->render($fileName, $array);
    }
}