<?php


namespace Core;


class View
{
    /**
     * @throws \Exception
     */
    public static function render($view, $args = [])
    {
        extract($args, EXTR_SKIP);

        $file = self::getViewDirPath() . $view;
        if (is_readable($file)) {
            require_once self::getViewDirPath() . 'header.php';
            require_once $file;
            require_once self::getViewDirPath() . 'footer.php';
        } else {
            throw new \Exception("$file not found or cannot be read");
        }
        return true;
    }

    protected static function getViewDirPath()
    {
        return dirname(__DIR__) . '/App/Views/';
    }
}