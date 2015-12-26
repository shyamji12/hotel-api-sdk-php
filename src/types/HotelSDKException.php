<?php
/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 10/21/2015
 * Time: 11:40 PM
 */

namespace hotelbeds\hotel_api_sdk\types;

use hotelbeds\hotel_api_sdk\model\AuditData;

class HotelSDKException extends \Exception
{
    private $auditData;

    public function __construct($message, AuditData $auditData = null)
    {
        parent::__construct($message);
        $this->auditData = $auditData;
    }

    public function getAuditData()
    {
        return $this->auditData;
    }
}