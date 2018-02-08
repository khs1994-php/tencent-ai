<?php

namespace TencentAI\Module;

use TencentAI\Error\TencentAIError;

trait Translate
{
    /**
     * @param int $type
     *
     * @throws TencentAIError
     */
    public function checkAILabTextType(int $type)
    {
        if ($type > 16 or $type < 0) {
            throw new TencentAIError(90701);
        }
    }
}
