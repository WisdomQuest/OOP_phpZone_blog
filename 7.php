<?php

class User
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }


    public function getName(): string
    {
        return $this->name;
    }


}

class  Article
{
    private $title;
    private $text;
    private $author;

    public function __construct(string $title, string $text, User $author)
    {
        $this->text = $text;
        $this->title = $title;
        $this->author = $author;
    }

    public function getText()
    {
        return $this->text;
    }


    public function getTitle()
    {
        return $this->title;
    }


    public function getAuthor()
    {
        return $this->author;
    }
}

$author = new User('Vano');
$article = new Article('Заголовок', 'Текст',$author);
//var_dump($article);

echo 'Имя автора: ' . $article->getAuthor()->getName();
