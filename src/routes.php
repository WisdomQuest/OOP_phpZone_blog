<?php
return [
//    '~^hello/(.*)$~'=>[\MyProject\Controllers\MainController::class, 'sayHello'],
    '~^$~'=>[MyProject\Controllers\MainController::class, 'main'],
//    '~^bye/(.*)$~'=>[\MyProject\Controllers\MainController::class, 'sayBye'],

//для изменения статей сделаем отдельный роут
    '~^articles/(\d+)/edit$~' => [\MyProject\Controllers\ArticlesController::class, 'edit'],
    '~^articles/(\d+)$~'=>[\MyProject\Controllers\ArticlesController::class, 'view'],
    //для добавления статей сделаем отдельный роут
    '~^articles/add$~' => [\MyProject\Controllers\ArticlesController::class, 'add'],
    //для удаления статей сделаем отдельный роут
    '~^articles/(\d+)/delete$~' => [\MyProject\Controllers\ArticlesController::class, 'delete'],
    '~^users/register$~' => [\MyProject\Controllers\UsersController::class, 'signUp'],
    '~^users/(\d+)/activate/(.+)$~' => [\MyProject\Controllers\UsersController::class, 'activate'],
    '~^users/successfulActivation$~' => [MyProject\Controllers\UsersController::class, 'successfulActivation'],
    '~^users/login$~' => [\MyProject\Controllers\UsersController::class, 'login'],
    '~^users/relogin$~' => [\MyProject\Controllers\UsersController::class, 'relogin'],
    '~^articles/(\d+)/comments$~' => [\MyProject\Controllers\ArticlesController::class, 'comments'],
    '~^comments/(\d+)/edit$~' => [\MyProject\Controllers\ArticlesController::class, 'commentsEdit'],
    '~^admin$~' => [\MyProject\Controllers\UsersController::class, 'admin'],
    '~^(\d+)$~' =>[\MyProject\Controllers\MainController::class, 'page'],

];