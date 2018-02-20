# Tencent AI SDK

[![GitHub stars](https://img.shields.io/github/stars/khs1994-php/tencent-ai.svg?style=social&label=Stars)](https://github.com/khs1994-php/tencent-ai) [![PHP from Packagist](https://img.shields.io/packagist/php-v/khs1994/tencent-ai.svg)](https://packagist.org/packages/khs1994/tencent-ai) [![GitHub (pre-)release](https://img.shields.io/github/release/khs1994-php/tencent-ai/all.svg)](https://github.com/khs1994-php/tencent-ai/releases)

- [Tencent AI](https://ai.qq.com)

- [Official Documents](https://ai.qq.com/doc/index.shtml)

# Installation

Exec `composer` command

```bash
# For latest commit version:
$ composer require khs1994/tencent-ai @dev

# TODO Don't exec this command

# $ composer require khs1994/tencent-ai
```

# Usage

```php
<?php
require __DIR__.'/vendor/autoload.php';

use TencentAI\TencentAI;
use TencentAI\Error\TencentAIError;

const APP_ID = 1106560031;
const APP_KEY = 'ZbRY9cf72TbDO0xb';

$ai = TencentAI::tencentAI(APP_ID, APP_KEY, false);

$image = __DIR__.'/path/name.jpg';

// must try-catch

try {
    $output = $ai->face()->detect($image);
} catch (TencentAIError $e) {
    $output = $e->getArray();
}

// default return array

var_dump($output);
```
