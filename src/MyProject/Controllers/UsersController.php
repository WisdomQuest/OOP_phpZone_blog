<?php

namespace MyProject\Controllers;

//use MyProject\Exceptions\activiteUserOk;
use MyProject\Exceptions\NotFoundException;
use MyProject\Models\Articles\Article;
use MyProject\Models\Users\UserActivationService;
use MyProject\Models\Users\UsersAuthService;
use MyProject\Services\EmailSender;

//use MyProject\View\View;
use MyProject\Models\Users\User;
use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Exceptions\ActivateExaption;

class UsersController extends AbstractController
{
    /** @var View */
//    private $view;

//    public function __construct()
//    {
//        $this->view = new View(__DIR__ . '/../../../templates');
//    }

    public function signUp()
    {
        if (!empty($_POST)) {
            try {
                $user = User::signUp($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('users/signUp.php', ['error' => $e->getMessage()]);
                return;
            }

            if ($user instanceof User) {
                $code = UserActivationService::createActivationCode($user);

                EmailSender::send($user, 'Активация', 'userActivation.php', [
                    'userId' => $user->getId(),
                    'code' => $code
                ]);

                $this->view->renderHtml('users/signUpSuccessful.php');
                return;
            }
        }

        $this->view->renderHtml('users/signUp.php');
    }

    public function activate(int $userId, string $activationCode)
    {
        try {

            $user = User::getById($userId);

            if ($user === null) {
                throw new ActivateExaption('Пользователь не найден');
            }

            if ($user->isConfirmed()) {
                throw new ActivateExaption('Пользователь уже активирован');
            }


            $isCodeValid = UserActivationService::checkActivationCode($user, $activationCode);
            if (!$isCodeValid) {
                throw new ActivateExaption('Неверный код активации');
            }

            if ($isCodeValid) {
                $user->active();
                $this->view->renderHtml('users/successfulActivation.php');
                UserActivationService::deleteCodeActivation($user);
                return;
            }
        } catch (ActivateExaption $e) {
            $this->view->renderHtml('users/nonexistentCode.php', ['error' => $e->getMessage()]);
        };

        echo 'ok';


    }

    public function successfulActivation(): void
    {
        $this->view->renderHtml('users/successfulActivation.php');
    }

    public function login(): void
    {
        if (!empty($_POST)) {
            try {
                $user = User::login($_POST);
                UsersAuthService::createToken($user);
                header('Location: /');
                exit();
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('users/login.php', ['error' => $e->getMessage()]);
                return;
            }
        }
        $this->view->renderHtml('users/login.php');
    }

//    public function reLogin():void
//    {
//        UsersAuthService::reLogin();
//        $this->view->renderHtml('users/relogin.php');
//
//
//    }
    public static function reLogin()
    {
        setcookie('token', '', -1, '/', '', false, true);
        header('Location: /');
    }

    public function admin()
    {
        $user = $this->user;
        $articles = Article::findALl();

//        foreach ($articles as $article) {
//            $articleText[]= $article->getText();
//        }

        if ($user !== null && $user->isAdmin()) {

                $this->view->renderHtml('users/admin.php', ['article' => $articles]);
            }
         else {
            $this->view->renderHtml('errors/404.php', [], 404);

        }


    }

}






