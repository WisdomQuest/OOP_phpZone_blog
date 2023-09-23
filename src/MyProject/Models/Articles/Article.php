<?php

namespace MyProject\Models\Articles;

use http\Exception\InvalidArgumentException;
use MyProject\Exceptions\NotRightException;
use MyProject\Exceptions\UnauthorizedException;
use MyProject\Models\ActiveRecordEntity;
use MyProject\Models\Users\User;
use MyProject\Exceptions\ArgumentException;

class Article extends ActiveRecordEntity
{


    /** @var string */
    protected $name;

    /** @var string */
    protected $text;

    /** @var int */
    protected $authorId;

    /** @var string */
    protected $createdAt;


    public function getText(): string
    {
        return $this->text;
    }

    /**
     * @param string $text
     */
    public function setText(string $text): void
    {
        $this->text = $text;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }


    //указываем имя таблицы
    protected static function getTableName(): string
    {
        return 'articles';
    }


    /**
     * @return int
     */
//    public function getAuthorId(): User
//    {
//        return (int) $this->authorId;
//       return User::getById( $this->authorId);
//    }

    public function getAuthor(): User
    {
//        return (int) $this->authorId;
        return User::getById($this->authorId);
    }

//добавим сеттер автора
    public function setAuthor(User $author): void
    {
        $this->authorId = $author->getId();
    }


//    private $title;
////    private $text;
//    private $author;
//
//    public function __construct(string $title, string $text, User $author)
//    {
//        $this->title = $title;
//        $this->text = $text;
//        $this->author = $author;
//    }
//
//    public function getTitle(): string
//    {
//        return $this->title;
//    }
//
////    public function getText(): string
////    {
////        return $this->text;
////    }
//
//    public function getAuthor(): User
//    {
//        return $this->author;
//    }
    /**
     * @return string
     */


    /**
     * @param string $createdAt
     */
    public function setCreatedAt(string $createdAt): void
    {
        $this->createdAt = $createdAt;
    }

    public static function createFromArray(array $fields, User $author): Article
    {
        if (empty($fields['name'])) {
            throw new ArgumentException('Не передано название статьи');


        }

        if (empty($fields['text'])) {
            throw new ArgumentException('Не передан текст статьи');
        }

        if (!$author->isAdmin()) {
            throw new NotRightException('Для доступа к этой странице нужно обладать правами администратора');
        }

        $article = new Article();

        $article->setAuthor($author);
        $article->setName($fields['name']);
        $article->setText($fields['text']);

//        var_dump($author);
        $article->save();

        return $article;
    }

    public function updateFromArray(array $fields, $user): Article
    {
        if (empty($fields['name'])) {
            throw new ArgumentException('Не передано название статьи');
        }

        if (empty($fields['text'])) {
            throw new ArgumentException('Не передан текст статьи');
        }
        $author = $this->getAuthor();

        if ($author->getId() !== $user->getId()) {
            if (!$user->isAdmin()) {
                throw new NotRightException('Для обновления страницы нужно обладать правами администратора');
            }
        }
        $this->setName($fields['name']);
        $this->setText($fields['text']);

        $this->save();

        return $this;
    }

    public function shortLink(): string
    {
        $shortText = $this->text;
        $shortText = mb_substr($shortText, 0, 100);
        if (mb_strlen($shortText) == 100) {
            $shortText .= '...';
        }
        return $shortText;

    }

    public function getParsedText(): string
    {
        $parser = new \Parsedown();
//        $parser->setBreaksEnabled(true);
        return $parser->text($this->getText());

    }

}