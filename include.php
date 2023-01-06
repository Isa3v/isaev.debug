<?php

if (!function_exists('debug')) {
    /**
     * Выводит дамп переменной в читаемом виде
     * Добавлено проверка на админа для битрикса.
     *
     * @param  mixed  $var
     * @param  mixed  $moreVars
     * @return mixed
     */
    function debug(...$vars)
    {
        // composer vendors
        if (!class_exists('\Symfony\Component\VarDumper\VarDumper')) {
            require_once __DIR__ . "/vendor/autoload.php";
        }

        // Проверяем есть ли объект пользователя и он админ
        global $USER;
        if (!class_exists('\Symfony\Component\VarDumper\VarDumper') || !($USER instanceof \CUser) || !$USER->isAdmin()) {
            return false;
        }

        foreach ($vars as $v) {
            \Symfony\Component\VarDumper\VarDumper::dump($v);
        }
    }
}

if (!function_exists('ddebug')) {
    /**
     * Выводит дамп переменной в читаемом виде и заканчивает вывод
     * Добавлено проверка на админа для битрикса.
     *
     * @param  mixed  $var
     * @param  mixed  $moreVars
     * @return mixed
     */
    function ddebug(...$vars)
    {
        // composer vendors
        if (!class_exists('\Symfony\Component\VarDumper\VarDumper')) {
            require_once __DIR__ . "/vendor/autoload.php";
        }

        // Проверяем есть ли объект пользователя и он админ
        global $USER;
        if (!class_exists('\Symfony\Component\VarDumper\VarDumper') || !($USER instanceof \CUser) || !$USER->isAdmin()) {
            return false;
        }

        $application = \Bitrix\Main\Application::getInstance();
        $response = $application->getContext()->getResponse();
        ob_start();
        foreach ($vars as $v) {
            \Symfony\Component\VarDumper\VarDumper::dump($v);
        }
        $output = ob_get_clean();
        $response->setContent($output);
        $application->end(200, $response);
    }
}

