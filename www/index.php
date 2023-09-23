<?php

//spl_autoload_register(function (string $className) {
//
//    require_once __DIR__ . '/../src/' . str_replace('\\', '/', $className) . '.php';
//});

require __DIR__ . '/../vendor/autoload.php';


//require __DIR__ . '/../src/MyProject/Models/Articles/Article.php';
//require __DIR__. '/../src/MyProject/Models/Users/User.php';

//$author = new \MyProject\Models\Users\User('Иван');
//$article = new \MyProject\Models\Articles\Article('Заголовок', 'Текст', $author);


//$controller = new \MyProject\Controllers\MainController();
//
//
//if (!empty($_GET['name'])) {
//    $controller->sayHello($_GET['name']);
//} else {
//    $controller->main();
//}

//$route = $_GET['route'] ?? '';
//$pattern = '~^hello/(.*)$~';
//preg_match($pattern, $route, $mathes);
//
//
//if (!empty($mathes)) {
//    $controller = new MyProject\Controllers\MainController();
//    $controller->sayHello($mathes[1]);
//    return;
//}
//
//$pattern = '~^$~';
//preg_match($pattern, $route, $mathes);
//
//if (!empty($mathes)) {
//    $controller = new \MyProject\Controllers\MainController();
//    $controller->main();
//    return;
//
//} else {
//    echo 'Страница не найдена';
//}
try {
    $route = $_GET['route'] ?? '';
    $routes = require __DIR__ . '/../src/routes.php';

    $isRouteFound = false;
    foreach ($routes as $pattern => $controllerAndAction) {
        preg_match($pattern, $route, $matches);
        if (!empty($matches)) {
            $isRouteFound = true;
            break;
        }
    }

    if (!$isRouteFound) {
        throw new \MyProject\Exceptions\NotFoundException();


    }

    unset($matches[0]);

//var_dump($controllerAndAction);
//var_dump($matches);

    $controllerName = $controllerAndAction[0];
    $actionName = $controllerAndAction[1];

    $controller = new $controllerName();
    $controller->$actionName(...$matches);
} catch (\MyProject\Exceptions\DbException $e) {
    $view = new \MyProject\View\View(__DIR__ . '/../templates/errors');
    $view->renderHtml('500.php',['error'=>$e->getMessage()], 500);
} catch (\MyProject\Exceptions\NotFoundException $e){
    $view = new \MyProject\View\View(__DIR__ . '/../templates/errors');
    $view->renderHtml('404.php',['error'=>$e->getMessage()], 404);
}  catch (\MyProject\Exceptions\UnauthorizedException $e) {
    $view = new \MyProject\View\View(__DIR__ . '/../templates/errors');
    $view->renderHtml('401.php', ['error' => $e->getMessage()], 401);
}catch (\MyProject\Exceptions\NotRightException $e) {
    $view = new \MyProject\View\View(__DIR__ . '/../templates/errors');
    $view->renderHtml('403.php', ['error' => $e->getMessage()], 403);
}




//var_dump(\MyProject\Services\Db::getInstancesCount());
