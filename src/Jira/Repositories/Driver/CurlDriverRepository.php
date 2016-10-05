<?php
namespace Invigor\Jira\Repositories\Driver;

use Invigor\Jira\Contracts\Driver\DriverContract;

/**
 * Created by PhpStorm.
 * User: ivan.li
 * Date: 10/5/2016
 * Time: 5:12 PM
 */
class CurlDriverRepository implements DriverContract
{
    protected $ch;
    protected $headers = array();
    protected $dataType = "json";
    protected $response;

    public function __construct()
    {
        $this->ch = curl_init();
    }

    public function getCh()
    {
        return $this->ch;
    }

    /**
     * Set multiple request headers
     *
     * @param array $headers
     * @return mixed
     */
    public function setHeaders(array $headers)
    {
        foreach ($headers as $key => $value) {
            $this->headers[$key] = $value;
        }
        return $this->headers;
    }

    /**
     * Set single request method
     *
     * @param $key
     * @param $value
     * @return mixed
     */
    public function setHeader($key, $value)
    {
        $this->headers[$key] = $value;
        return $this->headers;
    }

    /**
     * Set multiple other options or parameters depending on different drivers
     *
     * @param array $others
     * @return void
     */
    public function setOthers(array $others)
    {
        foreach ($others as $key => $value) {
            /* set cookie */
            switch ($key) {
                case "cookie":
                    curl_setopt($this->ch, CURLOPT_COOKIEFILE, $value);
                    curl_setopt($this->ch, CURLOPT_COOKIEJAR, $value);
                    break;
            }
        }
    }

    /**
     * Set single other option or parameter depending on different drivers
     *
     * @param $key
     * @param $value
     * @return void
     */
    public function setOther($key, $value)
    {
        /* set cookie */
        switch ($key) {
            case "cookie":
                curl_setopt($this->ch, CURLOPT_COOKIEFILE, $value);
                curl_setopt($this->ch, CURLOPT_COOKIEJAR, $value);
                break;
        }
    }

    /**
     * Enable debug mode
     *
     * @return void
     */
    public function enableDebug()
    {
        // TODO: Implement enableDebug() method.
    }

    /**
     * Disable debug mode
     *
     * @return void
     */
    public function disableDebug()
    {
        // TODO: Implement disableDebug() method.
    }

    /**
     * Show response header in result
     *
     * @return void
     */
    public function showHeader()
    {
        curl_setopt($this->ch, CURLOPT_HEADER, 0);
    }

    /**
     * Hide response header in result
     *
     * @return void
     */
    public function hideHeader()
    {
        curl_setopt($this->ch, CURLOPT_HEADER, 0);
    }

    /**
     * Set request method: (default) GET, POST, PUT, DELETE
     *
     * @param $method
     * @return void
     */
    public function setMethod($method)
    {
        switch (strtolower($method)) {
            case "post":
                curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, "POST");
                break;
            case "put":
                curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, "PUT");
                break;
            case "delete":
                curl_setopt($this->ch, CURLOPT_CUSTOMREQUEST, "DELETE");
                break;
            case "get":
            default:
        }
    }

    /**
     * Set elastic IP address
     *
     * @param $ip
     * @return void
     */
    public function setIpAddress($ip)
    {
        curl_setopt($this->ch, CURLOPT_INTERFACE, $ip);
    }

    /**
     * Set request data type
     *
     * @param $type
     * @return void
     */
    public function setDataType($type)
    {
        $this->dataType = strtolower($type);
        switch ($this->dataType) {
            case "json":
                $this->setHeader('Content-Type', "application/json");
        }
    }

    /**
     * Set request data, data format should be based on request method
     *
     * @param $rawData
     * @return void
     */
    public function setData($rawData)
    {
        switch ($this->dataType) {
            case "json":
            default:
                curl_setopt($this->ch, CURLOPT_POSTFIELDS, json_encode($rawData));
                $this->setHeader('Content-Length', strlen(json_encode($rawData)));
        }
    }

    /**
     * Set request destination
     *
     * @param $url
     * @return void
     */
    public function setURL($url)
    {
        curl_setopt($this->ch, CURLOPT_URL, $url);
    }

    /**
     * set all unrelated but curl specific options
     */
    private function finaliseOptions()
    {
        $curlHeaders = array();
        foreach ($this->headers as $key => $value) {
            $curlHeaders[] = "$key: $value";
        }
        curl_setopt($this->ch, CURLOPT_HTTPHEADER, $curlHeaders);
        curl_setopt($this->ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($this->ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($this->ch, CURLOPT_VERBOSE, true);
        curl_setopt($this->ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($this->ch, CURLOPT_TIMEOUT, 120);
        curl_setopt($this->ch, CURLOPT_SSL_VERIFYPEER, 0);
    }

    /**
     * Send request
     *
     * @return void
     */
    public function request()
    {
        $this->finaliseOptions();
        $this->response = curl_exec($this->ch);
        curl_close($this->ch);
    }

    /**
     * Get response after request
     *
     * @return mixed
     */
    public function getResponse()
    {
        return $this->response;
    }
}