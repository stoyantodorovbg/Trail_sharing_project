<?php

class App
{
    public function main()
    {
        $twig = new TwigConfController();

        if (isset($_GET['action'])) {
            $action = $_GET['action'];
            switch ($action) {
                case 'register_form':
                    echo $twig->load('', 'src/templates', 'register/register_form.twig');
                    break;
                case 'login_form':
                    echo $twig->load('', 'src/templates', 'login/login_form.twig');
                    break;
                case 'exit':
                    $logout = new UserLogoutController();
                    break;
                case 'contact_form':
                    echo $twig->load('', 'src/templates', 'contact/contact__form.twig');
                    break;
                case 'home':
                    echo $twig->load('', 'src/templates', 'home.twig');
                    break;
                case 'articles_view':
                    echo $twig->load('', 'src/templates', 'articles/articles_view.twig');
                    break;
                case 'forum_view':
                    echo $twig->load('', 'src/templates', 'forum/forum_view.twig');
                    break;
                case 'albums_view':
                    echo $twig->load('', 'src/templates', 'albums/albums_view.twig');
                    break;
                case 'trails_view':
                    echo $twig->load('', 'src/templates', 'trails/trails_view.twig');
                    break;
                case 'team_view':
                    echo $twig->load('', 'src/templates', 'team/team_view.twig');
                    break;
                case 'about_view':
                    echo $twig->load('', 'src/templates', 'about/about_view.twig');
                    break;
                case 'news_view':
                    echo $twig->load('', 'src/templates', 'news/news_view.twig');
                    break;
                case 'news_create':
                    echo $twig->load('', 'src/templates', 'news/news_create.twig');
                    break;
                case 'trail_create':
                    echo $twig->load('', 'src/templates', 'trails/trail_create.twig');
                    break;
                case 'album_create':
                    echo $twig->load('', 'src/templates', 'albums/album_create.twig');
                    break;
                case 'article_create':
                    echo $twig->load('', 'src/templates', 'articles/article_create.twig');
                    break;



            }
        } else {
            echo $twig->load('', 'src/templates', 'home.twig');
        }

        if (isset($_POST['submit'])) {
            if (isset($_POST['form_type'])) {
                $form_type = $_POST['form_type'];
                switch ($form_type) {
                    case 'register':
                        $user = new UserRegisterController();
                        $user->getData();
                        break;
                    case 'login':
                        $user = new UserLoginController();
                        $user->getData();
                        break;
                    case 'contact':
                        $contact = new ContactController();
                        $contact->getData();
                        break;
                    case 'news_create':
                        $news = new NewsController();
                        $news->getData();
                        break;
                    case 'trail_create':
                        $trail = new TrailController();
                        $trail->getData();
                        break;
                    case 'album_create':
                        $album = new AlbumController();
                        $album->getData();
                        break;
                    case 'article_create':
                        $article = new ArticleController();
                        $article->getData();
                        break;


                }
            }
        }
    }

}