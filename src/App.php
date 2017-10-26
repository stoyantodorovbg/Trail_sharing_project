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