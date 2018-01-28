# Tencent AI SDK

[![GitHub stars](https://img.shields.io/github/stars/khs1994-php/tencent-ai.svg?style=social&label=Stars)](https://github.com/khs1994-php/tencent-ai) [![PHP from Packagist](https://img.shields.io/packagist/php-v/khs1994/tencent-ai.svg)](https://packagist.org/packages/khs1994/tencent-ai) [![GitHub (pre-)release](https://img.shields.io/github/release/khs1994-php/tencent-ai/all.svg)](https://github.com/khs1994-php/tencent-ai/releases)

- [Tencent AI](https://ai.qq.com)

- [Official Documents](https://ai.qq.com/doc/index.shtml)

- [SDK Documents](https://github.com/khs1994-php/tencent-ai/tree/master/docs)

# Installation

Exec `composer` command

```bash
# For latest commit version:
$ composer require khs1994/tencent-ai @dev

# TODO Don't exec this command

# $ composer require khs1994/tencent-ai
```

Or edit `composer.json`

```json
{
    "require": {
        "khs1994/tencent-ai": "@dev"
    }
}
```

Then exec `$ composer update`

# Usage

```php
<?php

require_once 'vendor/autoload.php';

use TencentAI\TencentAI;

$config = [
  'app_id' => 1106560000,
  'app_key' => 'ZbRY9cf72TbDO0aa',
];

$ai = new TencentAI($config);

$image = '/path/image/name.jpg';

$output = $ai->face->detect($image);

// return Array

var_dump($output);
```
