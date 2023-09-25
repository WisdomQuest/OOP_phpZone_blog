<?php

namespace MyProject\Controllers;

use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Exceptions\NotFoundException;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Models\Articles\Article;
use MyProject\Exceptions\ArgumentException;
use MyProject\Models\Comments\Comment;

use MyProject\Models\Users\User;

//use MyProject\Models\Users\UsersAuthService;
//use MyProject\View\View;

class ArticlesController extends AbstractController
{

//    private $view;
//
//    private $user;

//    public function __construct()
//    {
//        $this->user = UsersAuthService::getUserByToken();
//        $this->view = new View(__DIR__ . '/../../../templates');
//        $this->view->setVar('user', $this->user);
//    }


    public function view(int $articleId)
    {
        $article = Article::getById($articleId);

//        $reflector = new \ReflectionObject($article);
//        $properties = $reflector->getProperties();
//        $propertiesName=[];
//        foreach ($properties as $property) {
//            $propertiesName[]=$property->getName();
//        }
//        var_dump($propertiesName);
//        return;


        if ($article === null) {
            throw new NotFoundException();

        }


//        $articleAuthor = User::getById($article->getAuthorId());

        $this->view->renderHtml('articles/view.php', [
            'article' => $article,
            'comment'=> Comment::findALl()


//            'user'=>UsersAuthService::getUserByToken()
        ]);

    }


    //экшн edit, в котором мы пока просто будем получать статью
    public function edit(int $articleId): void
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            throw new NotFoundException();
        }

        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        if (!empty($_POST)) {
            try {
                $article->updateFromArray($_POST,$this->user);
            } catch (ArgumentException $e) {
                $this->view->renderHtml('articles/edit.php', ['error' => $e->getMessage(), 'article' => $article]);
                return;
            }

            header('Location: /articles/' . $article->getId(), true, 302);
            exit();
        }


        $this->view->renderHtml('articles/edit.php', ['article' => $article]);


//        $article->setName('Новое название статьи');
//        $article->setText('Новый текст статьи');
//
//        $article->save();

    }

    // Добавим новый экшн в контроллере

    public function add(): void
    {
        if ($this->user === null) {
            throw new UnauthorizedException();
        }

        if (!empty($_POST)) {
            try {
                $article = Article::createFromArray($_POST, $this->user);
            } catch (ArgumentException $e) {
                $this->view->renderHtml('articles/add.php', ['error' => $e->getMessage()]);
                return;
            }

            header('Location: /articles/' . $article->getId(), true, 302);
            exit();
        }

        $this->view->renderHtml('articles/add.php');
    }

    public function delete(int $articled): void
    {
        $article = Article::getById($articled);

        if ($article === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }
        $article->delete();
        var_dump($article);

    }

    public function comments(int $article): void
    {

        try {
            $article = Article::getById($article);
            $comment = Comment::createComment($_POST, $this->user, $article);
        }catch (ArgumentException $e) {
            $this->view->renderHtml('articles/view.php', [
                'error' => $e->getMessage(),
                'article' => $article,
                'comment' => Comment::findALl()
            ]);
            return;
        }


        if (!empty($_POST)) {

            header('Location: /articles/' . $article->getId() . '#comment' . $comment->getId(), true, 302);
            exit;
        }

        $this->view->renderHtml('articles/comments.php');
    }

    public function commentsEdit(int $commentsId)
    {
        $comments = Comment::getById($commentsId);
        if ($comments === null) {
            throw new NotFoundException();
        }
        if (!empty($_POST)) {
            try {

                $comments->commentUpdate($_POST);
            } catch (ArgumentException $e) {
                $this->view->renderHtml('articles/comments.php', ['commentsId' => $commentsId, 'error' => $e->getMessage()]);
                return;
            }
            header('Location: /comments/' . $comments->getId() . '/edit', true, 302);
            exit;
        }

        $this->view->renderHtml('articles/comments.php',
            [


            'commentsId' => $commentsId,
                'comment' => $comments

        ]
        );

    }



//    public function create(): void
//    {
//        $article2 = new Article();
//        $article2->setName('Новая статья 2');
//        $article2->setText('Новый текст 2');
//        $article2->setAuthorId(1);
//        $article2->save();
//    }


}