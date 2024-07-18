<?php

return [
    '' => ['HomeController', 'index',],
    'lists' => ['HomeController', 'index',],
    'ideas' => ['HomeController', 'index',],
    'subscribe' => ['UserController', 'index',],
    'login' => ['UserController', 'index',],
    'logout' => ['UserController', 'logout',],
    'dashboard' => ['DashboardController', 'index',],
    'dasboard/infos' => ['DashboardController', 'index',],
    'dasboard/delete' => ['UserController', 'delete',],
    'dasboard/password' => ['UserController', 'password',],
    'dashboard/createlist' => ['ListController', 'create',],
    'dashboard/editlist' => ['ListController', 'edit', ['id']],
    'dashboard/deletelist' => ['ListController', 'delete', ['id']],
    'dashboard/showlist' => ['ListController', 'show', ['id']],
];
