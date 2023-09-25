<?php

namespace MyProject\Controllers;

use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Articles\Article;
//use MyProject\Models\Users\UsersAuthService;
//use MyProject\Services\Db;
//use MyProject\View\View;

class MainController extends AbstractController
{
//    private $view;

//    private $db;

//    private $user;


//    public function __construct()
//    {
//        $this->user = UsersAuthService::getUserByToken();
//        $this->view = new View(__DIR__ . '/../../../templates');
//        $this->view->setVar('user', $this->user);
////        $this->db= Db::getInstanse();
//    }

    public function main()
    {
        $this->page(1);
//        $articles = Article::findALl();
//
////        var_dump($articles);
////        return;
////        var_dump($articles);
////        $articles = [
////            ['name' => 'Статья 1', 'text' => 'Текст статьи 1'],
////            ['name' => 'Статья 2', 'text' => 'Текст статьи 2'],
////        ];
//
//        $this->view->renderHtml('main/main.php', [
//            'articles' => $articles,
//            'pagesCount' => Article::getPagesCount(5),
////            'user'=>UsersAuthService::getUserByToken()
//        ]);
//        include __DIR__ . '/../../../templates/main/main.php';
    }

    public function sayHello(string $name)
    {

        $this->view->renderHtml('main/hello.php', ['name' => $name, 'title' => 'Страница приветствия']);
    }

    public function sayBye(string $name)
    {
        echo 'Пока, ' . $name;
    }

    public function page(int $pageNum)
    {
        $itemPerPage =ActiveRecordEntity::itemPerPage();
        $pageCount =Article::getPagesCount($itemPerPage);
        if ($pageNum > Article::getPagesCount($itemPerPage)) {

            $this->view->renderHtml('errors/404.php', [], 404);
        }else {

            $this->view->renderHtml('main/main.php', [
                'articles' => Article::getPage($pageNum, $itemPerPage),
                'pagesCount' => Article::getPagesCount($itemPerPage),
                'currentPageNum' => $pageNum,
                'previousPageLink' => $pageNum > 1
                ? '/'. ($pageNum -1)
                    : null,
                'nextPageLink' => $pageNum < $pageCount
                ? '/' . ($pageNum +1)
                    :null

            ]);
        }
    }

//    public function page(int $pageNum)
//    {
//        $pagesCount = Article::getPagesCount(5);
//
//    }

}