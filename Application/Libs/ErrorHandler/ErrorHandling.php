<?php
namespace Libs\ErrorHandler;

set_error_handler(function(int $number, string $message) {
    echo "Handler captured error $number: '$message'" . PHP_EOL  ;
});