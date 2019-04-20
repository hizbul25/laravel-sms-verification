<?php

namespace Hizbul\SmsVerification;

use Hizbul\SmsVerification\Exceptions\ConfigException;
use Hizbul\SmsVerification\Exceptions\SenderException;

/**
 * Class Sender
 * @package Hizbul\SmsVerification
 */
class Sender implements SenderInterface
{

    /**
     * Expected HTTP status for successful SMS sending request
     */
    const EXPECTED_HTTP_STATUS = 201;

    /**
     * Singleton instance
     * @var Sender
     */
    private static $instance;

    /**
     * Username for Onnorokomsms.com API
     * @var string
     */
    private $userName;

    /**
     * API password
     * @var string
     */
    private $password;

     /**
     * Sender constructor
     * @throws ConfigException
     */
    private function __construct()
    {
        $this->userName = config('sms-verification.username');
        if (empty($this->userName)) {
            throw new ConfigException('Onnorokom.com username is not specified in config/sms-verification.php');
        }
        $this->password = config('sms-verification.password');
        if (empty($this->password)) {
            throw new ConfigException('Onnorokom.com API Password is not specified in config/sms-verification.php');
        }
    }
    /**
     * Singleton
     * @return Sender
     */
    public static function getInstance()
    {
        if (is_null(static::$instance)) {
            static::$instance = new static();
        }
        return static::$instance;
    }

    /**
     * Send SMS via Onnorokomsms.com API
     * @param string $to
     * @param string $text
     * @return bool
     * @throws SenderException
     */
    public function send($to, $text)
    {
        $soapClient = new \nusoap_client("https://api2.onnorokomSMS.com/sendSMS.asmx?wsdl", 'wsdl');
        $onnorokomArray = [
            'userName'      => $this->userName,
            'userPassword'  => $this->password,
            'mobileNumber'  => $to,
            'smsText'       => $text,
            'type'          => 'TEXT',
            'maskName'      => '',
            'campaignName'  => ''
        ];

        try{
            $value = $soapClient->call('OneToOne', array($onnorokomArray));
        }
        catch (\SoapFault $ex)
        {
            throw new SenderException('SMS sending was failed', null, 0, $ex);
        }
        catch(\Exception $ex) {
            throw new SenderException('What the hell', null, 0, $ex);
        }
        return true;
    }

}
