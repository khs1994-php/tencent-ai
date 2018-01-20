<?php

namespace TencentAI;

class TencentAI
{
    public function __construct(array $config)
    {
        $this->image=new Image($config);
        $this->face=new Face($config);
    }
}
