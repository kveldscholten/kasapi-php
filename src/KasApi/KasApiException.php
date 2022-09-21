<?php

namespace KasApi;

use Exception;

/**
 * Exception class which is thrown when an error occurs while the usage of the KAS API
 *
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
     * @param string $faultcode
     * @param string $faultstring
     * @param ?string $faultactor
     * @param mixed $detail
     */
    public function __construct($faultcode = "", $faultstring = "", $faultactor = null, $detail = null)
    {
        $this->faultcode = $faultcode;
        $this->faultstring = $faultstring;
        $this->faultactor = $faultactor;
        $this->detail = $detail;

        parent::__construct($faultstring);
    }

    /**
     * @return string
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

    /**
     * @return ?string
     */
    public function getFaultactor()
    {
        return $this->faultactor;
    }

    /**
     * @return mixed
     */
    public function getDetail()
    {
        return $this->detail;
    }
} 