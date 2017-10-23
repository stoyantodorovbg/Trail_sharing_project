<?php

class App
{
    public function main()
    {
       echo $this->load('', 'src/templates', 'home.twig');

        $db_test = DB::getInstance();

        $query = $db_test->prepare("
       INSERT INTO `forum`
       (`title`)
       VALUES (?)
       ");
        $query->execute(['test_value']);

    }

    private function load($cachePath, $templatePath, $fileName, $array = [])
    {
        $loader = new Twig_Loader_Filesystem($templatePath);
        $twig = new Twig_Environment($loader);

        return $twig->render($fileName, $array);
    }
}