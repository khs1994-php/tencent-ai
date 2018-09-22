# Tencent AI SDK

[![GitHub stars](https://img.shields.io/github/stars/khs1994-php/tencent-ai.svg?style=social&label=Stars)](https://github.com/khs1994-php/tencent-ai) [![PHP from Packagist](https://img.shields.io/packagist/php-v/khs1994/tencent-ai.svg)](https://packagist.org/packages/khs1994/tencent-ai) [![GitHub (pre-)release](https://img.shields.io/github/release/khs1994-php/tencent-ai/all.svg)](https://github.com/khs1994-php/tencent-ai/releases) [![Build Status](https://travis-ci.org/khs1994-php/tencent-ai.svg?branch=master)](https://travis-ci.org/khs1994-php/tencent-ai) [![StyleCI](https://styleci.io/repos/115306597/shield?branch=master)](https://styleci.io/repos/115306597) [![codecov](https://codecov.io/gh/khs1994-php/tencent-ai/branch/master/graph/badge.svg)](https://codecov.io/gh/khs1994-php/tencent-ai)

- [Tencent AI](https://ai.qq.com)

- [Official Documents](https://ai.qq.com/doc/index.shtml)

- [Documents](https://khs1994-php.github.io/tencent-ai/)

> 本项目为本人 PHP 练手项目，仅供参考！

## Require

* **PHP 7.1+**

# Installation

To Use Tencent AI SDK, simply:

```bash
$ composer require khs1994/tencent-ai
```

For latest commit version:

```bash
$ composer require khs1994/tencent-ai dev-master
```

## Usage

```php
<?php
require __DIR__.'/vendor/autoload.php';

use TencentAI\TencentAI;
use TencentAI\Exception\TencentAIException;

const APP_ID = 1106560031;
const APP_KEY = 'ZbRY9cf72TbDO0xb';

# you can set return format and request timeout

$ai = TencentAI::getInstance(APP_ID, APP_KEY, false, 10);

$image = __DIR__.'/path/name.jpg';

// must try-catch exception

try {
    $result = $ai->face()->detect($image);
} catch (TencentAIException $e) {
    $result = $e->getExceptionAsArray();
}

// default return array

var_dump($result);
```

## Laravel

```bash
$ php artisan vendor:publish --tag=config
```

Then edit config in `config/tencent-ai.php`

```php
use TencentAI;
use TencentAI\Exception\TencentAIException;

$image = __DIR__.'/path/name.jpg';

try {
    // call by facade
    $result = TencentAI::face()->detect($image);

    // call by helper function
    // tencent_ai()->face()->detect($image);
} catch (TencentAIException $e) {
    $result = $e->getExceptionAsArray();
}

// default return array

var_dump($result);

// use DI

class AI
{
    public $tencent_ai;

    public function __construct(\TencentAI\TencentAI $tencent_ai)
    {
        $this->tencent_ai=$tencent_ai;
    }

    public function demo()
    {
        $image = __DIR__.'/path/name.jpg';

        return $this->tencent_ai->face()->detect($image);
    }
}

```

## PHP CaaS

**Powered By [khs1994-docker/lnmp](https://github.com/khs1994-docker/lnmp)**
