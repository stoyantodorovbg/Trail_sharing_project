<?php

class App
{
    public function main()
    {


        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            switch ($action) {
                case 'register_form':
                    echo $this->load('', 'src/templates', 'register/register_form.twig');
                    break;
                case 'login_form':
                    echo $this->load('', 'src/templates', 'login/login_form.twig');
                    break;
                case 'contact_form':
                    echo $this->load('', 'src/templates', 'contact/contact__form.twig');
                    break;
                case 'home':
                    echo $this->load('', 'src/templates', 'home.twig');
                    break;
                case 'articles_view':
                    echo $this->load('', 'src/templates', 'articles/articles_view.twig');
                    break;
                case 'forum_view':
                    echo $this->load('', 'src/templates', 'forum/forum_view.twig');
                    break;
                case 'albums_view':
                    echo $this->load('', 'src/templates', 'albums/albums_view.twig');
                    break;
                case 'trails_view':
                    echo $this->load('', 'src/templates', 'trails/trails_view.twig');
                    break;
                case 'news_view':
                    echo $this->load('', 'src/templates', 'news/news_view.twig');
                    break;
            }
        } else {
            echo $this->load('', 'src/templates', 'home.twig');
        }




    }

    private function load($cachePath, $templatePath, $fileName, $array = [])
    {
        $loader = new Twig_Loader_Filesystem($templatePath);
        $twig = new Twig_Environment($loader);

        return $twig->render($fileName, $array);
    }
}