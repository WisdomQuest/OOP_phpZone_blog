<?php

namespace MyProject\View;

class View
{
    private $templatesPath;

    private $extraVars = [];

    public function __construct(string $templatesPath)
    {
        $this->templatesPath = $templatesPath;
    }

    public function setVar(string $name, $value):void
    {
        $this->extraVars[$name] = $value;


    }



    public function renderHtml(string $temlplateName, array $vars = [],int $code=200)
    {
        http_response_code($code); //задает код ответа для страницы
        extract($this->extraVars);
        extract($vars);

//        if (empty($title)) {
//            $title='Мой блог';
//        }

        ob_start();
        include $this->templatesPath . '/' . $temlplateName;
        $buffer = ob_get_contents();
        ob_get_clean();

//        $error = 'В шаблоне была ошибка!';
//
//        if (empty($error)) {
//            echo $buffer;
//        } else {
//            echo $error;
//        }

        echo $buffer;

    }

    public function displayJSON($data, int $code = 200)
    {
        header(' Content-type: application/json; charset=utf-8');
        http_response_code($code);
        echo json_encode($data);

    }

}