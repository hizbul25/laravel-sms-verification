<?php
return [
    /*
    |--------------------------------------------------------------------------
    | ONNOROKOM_USERNAME
    |--------------------------------------------------------------------------
    |
    | Your OnnoRokom Username #
    |
    */
    'username' => '01711362168',
    /*
    |--------------------------------------------------------------------------
    | OnnoRokom Password
    |--------------------------------------------------------------------------
    |
    | Password that you will get by sms.
    |
    */
    'password' => '16435',
    /*
    |--------------------------------------------------------------------------
    | Type
    |--------------------------------------------------------------------------
    |
    | SMS format Text or Ucs
    |
    */
    'type' => env('ONNOROKOM_SMS_TYPE', 'TEXT'),
    /*
    |--------------------------------------------------------------------------
    | Delivery Type
    |--------------------------------------------------------------------------
    |
    | OneToOne - Single Sms Send Method
    | OneToOneBulk - Each and every number contains individual message
    | OneToMany - Bulk Sms Method
    |
    */
    'delivery_type' => env('ONNOROKOM_DELIVERY_TYPE', 'OneToOne'),
    /*
    |--------------------------------------------------------------------------
    | Mask Name
    |--------------------------------------------------------------------------
    |
    | Mask Name which is allowed to your client panel
    |
    */
    'mask_name' => env('ONNOROKOM_MASK_NAME', 'DemoMask'),
    /*
    |--------------------------------------------------------------------------
    |Campaign
    |--------------------------------------------------------------------------
    |
    | Campaign Name
    |
    */
    'campaign_name' => env('ONNOROKOM_CAMPAIGN', ''),
];
