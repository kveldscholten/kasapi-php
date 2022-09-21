<?php

namespace KasApi;

/**
 * Contains configuration values for the KAS API
 *
 * @package KasApi
 */
class KasConfiguration
{
    /**
     * KAS login
     *
     * @var string
     */
    public $_login;

    /**
     * KAS password
     *
     * @var string
     */
    public $_authData;

    /**
     * Auth Type
     *
     * @var string
     */
    public $_authType = "plain";

    /**
     * Automatic Delay for Api Calls
     * Manages whether KasApi should use sleep to automagically manage kasFloodDelay
     *
     * @var bool
     */
    public $_autoDelayApiCalls;

    /**
     * WSDL file for KAS API
     *
     * @var string
     */
    public $wsdl_api = 'https://kasapi.kasserver.com/soap/wsdl/KasApi.wsdl';

    /**
     * Creates a new Configuration object with the given parameters
     *
     * @param string $login
     * @param string $authData
     * @param string $authType
     * @param bool $autoDelayApiCalls
     */
    function __construct($login, $authData, $authType, $autoDelayApiCalls = true)
    {
        $this->_login = $login;
        $this->_authData = $authData;
        $this->_authType = $authType;
        $this->_autoDelayApiCalls = $autoDelayApiCalls;
    }
}