# tencent-ai

[![GitHub stars](https://img.shields.io/github/stars/khs1994-php/tencent-ai.svg?style=social&label=Stars)](https://github.com/khs1994-php/tencent-ai) [![PHP from Packagist](https://img.shields.io/packagist/php-v/khs1994/tencent-ai.svg)](https://packagist.org/packages/khs1994/tencent-ai) [![GitHub (pre-)release](https://img.shields.io/github/release/khs1994-php/tencent-ai/all.svg)](https://github.com/khs1994-php/tencent-ai/releases)

# Usage

Exec `composer` command

```bash
$ composer require khs1994/tencent-ai:dev-master
```

Or edit `composer.json`

```json
{
    "require": {
        "khs1994/tencent-ai": "dev-master"
    }
}
```

```php
<?php

require_once 'vendor/autoload.php';

use TencentAI\TencentAI;

$config = [
    'app_id' => 1106560000,
    'app_key' => 'ZbRY9cf72TbDO0aa',
];

$ai=new TencentAI($config);

$image='/image/path';

$output=$ai->face->detect($image);

// 返回结果是一个数组

var_dump($output);
```
