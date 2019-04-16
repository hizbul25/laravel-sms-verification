<?php

namespace Hizbul\SmsVerification\Exceptions;

/**
 * This exception is being used in case of incorrect config data.
 * Class ConfigException
 * @package Hizbul\SmsVerification\Exceptions
 */
class ConfigException extends SmsVerificationException {

    public function getErrorCode(){
        return 200 + min($this->getCode(), 99);
    }

}
