<?php
/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 12/25/2015
 * Time: 9:31 PM
 */

namespace hotelbeds\hotel_api_sdk\messages;

use hotelbeds\hotel_api_sdk\model\AuditData;

class BookingCancellationRS extends ApiResponse
{
    public function __construct(array $rsData)
    {
        parent::__construct($rsData);
    }

    /**
     * @return AuditData Return class of audit
     */
    public function auditData()
    {
        return new AuditData($this->auditData);
    }
}