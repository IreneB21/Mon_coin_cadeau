<?php

return [
    '' => ['HomeController', 'index',],
    'lists' => ['HomeController', 'index',],
    'ideas' => ['HomeController', 'index',],
    'subscribe' => ['IdentificationController', 'subscribe',],
    'login' => ['IdentificationController', 'login',],
    'logout' => ['IdentificationController', 'logout',],
    'dashboard' => ['DashboardController', 'index',],
    'dasboard/infos' => ['DashboardController', 'index',],
    'dasboard/delete' => ['IdentificationController', 'delete',],
    'dasboard/password' => ['IdentificationController', 'password',],
    'dashboard/createlist' => ['ListController', 'create',],
    'dashboard/editlist' => ['ListController', 'edit', ['id']],
    'dashboard/deletelist' => ['ListController', 'delete', ['id']],
    'dashboard/showlist' => ['ListController', 'show', ['id']],
];
