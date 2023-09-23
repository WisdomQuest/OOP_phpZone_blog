<?php

namespace MyProject\Models\Comments;

use MyProject\Exceptions\ArgumentException;
use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Users\User;
use MyProject\Models\Articles\Article;

class Comment extends ActiveRecordEntity
{
    protected $articleId;

    protected $text;
    protected $authorId;


    protected $createdAt;


    public static function getTableName(): string
    {
        return 'comments';
    }


    public static function createComment(array $field, User $author, $article)
    {
        if (empty($field['comments'])) {
            throw new ArgumentException('не передан текст коментария');
        }


        if ($_SERVER['REQUEST_METHOD'] === 'POST') {


            $comment = new Comment();
            $comment->setText($field['comments']);
            $comment->setAuthor($author);
            $comment->setArticleId($article);


            $comment->save();

            return $comment;
        } else {
            throw new ArgumentException('Пост пуст');
        }
    }

    /**
     * @param mixed $text
     */
    public function setText($text): void
    {
        $this->text = $text;
    }

//    public function getAuthor(): User
//    {
////        return (int) $this->authorId;
//        return User::getById($this->authorId);
//    }

    public function setAuthor(User $author): void
    {
        $this->authorId = $author->getId();

    }

    /**
     * @param mixed $createdAt
     */
    public function setCreatedAt(Article $article): void
    {
        $this->createdAt = $article->getId();
    }

    /**
     * @return mixed
     */
    public function getArticleId(): Article
    {
        return Article::getById($this->articleId);

    }

    /**
     * @param mixed $articleId
     */
    public function setArticleId(Article $articleId): void
    {
        $this->articleId = $articleId->getId();
    }

    /**
     * @return mixed
     */
    public function getText()
    {
        return $this->text;
    }

    public function getArtId()
    {
        return $this->articleId;
    }

    /**
     * @return mixed
     */
    public function getAuthorId()
    {
        return $this->authorId;
    }

public function commentUpdate(array $fields): Comment
{
    if (empty($fields['comments'])) {
        throw new ArgumentException('не передан новый текст коментария');
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $this->setText(htmlentities($fields['comments']));

        $this->save();
    }


    return $this;
}

}