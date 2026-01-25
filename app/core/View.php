<?php

namespace App\Core;

use Smarty\Smarty;

class View
{
    public static function render($template, $params = [])
    {
        $smarty = new Smarty();

        $smarty->setTemplateDir(__DIR__ . '/../../templates');
        $smarty->setCompileDir(__DIR__ . '/../../templates_c');

        foreach ($params as $key => $value) {
            $smarty->assign($key, $value);
        }

        $smarty->display($template);
    }
}
