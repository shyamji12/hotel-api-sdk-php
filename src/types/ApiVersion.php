<?php
/**
 * Created by PhpStorm.
 * User: Tomeu
 * Date: 10/27/2015
 * Time: 3:14 AM
 */

namespace hotelbeds\hotel_api_sdk\types;

/**
 * Interface ApiVersions. Define all available versions
 * @package hotelbeds\hotel_api_sdk\types
 */
interface ApiVersions {
    const V0_2="0.2";
    const V1_0="1.0";

    public function __construct($version);
    public function getVersion();
}

/**
 * Class ApiVersion. Simple class define API version
 * @package hotelbeds\hotel_api_sdk\types
 */
class ApiVersion implements ApiVersions
{
    /**
     * @var string contains string of version
     */
    private $version;

    /**
     * ApiVersion constructor.
     * @param $version
     */
    public function __construct($version)
    {
        $this->version = $version;
    }

    /**
     * Return version string of version
     * @return mixed
     */
    public function getVersion()
    {
        return $this->version;
    }
}