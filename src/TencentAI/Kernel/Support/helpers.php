<?php

declare(strict_types=1);

if (!class_exists(\Illuminate\Support\Facades\Facade::class)) {
    return;
}

if (!(function_exists('tencent_ai'))) {
    function tencent_ai()
    {
        return app('tencent-ai');
    }
}

class TencentAI extends TencentAI\Kernel\Facade
{
}
