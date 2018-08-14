<?php

declare(strict_types=1);

use TencentAI\Application;

if (!(function_exists('tencent_ai'))) {
    function tencent_ai()
    {
        return app(Application::class);
    }
}

class TencentAI extends \TencentAI\Facade
{
}
