<?php

namespace Hizbul\SmsVerification\Exceptions;

/**
 * This exception is basic exception of Hizbul\SmsVerification
 * Class SmsVerificationException
 * @package Hizbul\SmsVerification\Exceptions
 */
abstract class SmsVerificationException extends \RuntimeException {

    abstract public function getErrorCode();

}
