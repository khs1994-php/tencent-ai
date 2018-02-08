<?php
/**
 * Created by PhpStorm.
 * User: khs1994
 * Date: 08/02/2018
 * Time: 11:54 AM.
 */

namespace TencentAI\Module;


use TencentAI\Error\TencentAIError;

trait OCR
{
    /**
     * @param int $type
     * @throws TencentAIError
     */
    public function checkType(int $type)
    {
        if ($type !== 0 && $type !== 1) {
            throw new TencentAIError(90011);
        }
    }
}