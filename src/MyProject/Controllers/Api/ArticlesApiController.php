<?php

namespace MyProject\Controllers\Api;

use MyProject\Controllers\AbstractController;
use MyProject\Exceptions\NotFoundException;
use MyProject\Models\Articles\Article;
use MyProject\Models\Users\User;

class ArticlesApiController extends AbstractController
{
    public function view(int $articledId)
    {
        $article = Article::getById($articledId);

        if ($article == null) {
            throw new NotFoundException();
        }

        $this->view->displayJSON([
            'articles' => [$article]
        ]);

    }

    public function add()
    {
        $input = $this->getInputData();
        $articleFromRequest = $input['articles'][0];

        $authorId = $articleFromRequest['author_id'];
        $author = User::getById($authorId);

        $article = Article::createFromArray($articleFromRequest, $author);
        $article->save();

        header('Location: /api/articles/' . $article->getId(), true, 302);
    }

}