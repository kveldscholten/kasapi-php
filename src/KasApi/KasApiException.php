<?php

namespace KasApi;

use Exception;

/**
 * Exception class which is thrown when an error occurs while the usage of the KAS API
 *
 * Class KasApiException
 * @package KasApi
 */
class KasApiException extends Exception
{
    /**
     * Fault messages of the Soap Call to KAS API
     */
    private $faultcode;
    private $faultstring;
    private $faultactor;
    private $detail;

    /**
     * Constructor for this Exception
     *
     * @param string $message
     * @param string $faultcode
     * @param string $faultstring
     * @param string $faultfactor
     * @param string $detail
     */
    public function __construct($message, $faultcode = "", $faultstring = "", $faultfactor = "", $detail = "")
    {
        parent::__construct($message);
        $this->faultcode = $faultcode;
        $this->faultstring = $faultstring;
        $this->faultactor = $faultfactor;
        $this->detail = $detail;
    }

    /**
     * @return string
     */
    public function getDetail()
    {
        return $this->detail;
    }

    /**
     * @return string
     */
    public function getFaultactor()
    {
        return $this->faultactor;
    }

    /**
     * @return mixed
     */
    public function getFaultcode()
    {
        return $this->faultcode;
    }

    /**
     * @return string
     */
    public function getFaultstring()
    {
        return $this->faultstring;
    }
} 