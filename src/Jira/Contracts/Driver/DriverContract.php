<?php
namespace Invigor\Jira\Contracts\Driver;
/**
 * Created by PhpStorm.
 * User: ivan.li
 * Date: 10/5/2016
 * Time: 4:59 PM
 */
interface DriverContract
{
    /**
     * Set multiple request headers
     *
     * @param array $headers
     * @return mixed
     */
    public function setHeaders(array $headers);

    /**
     * Set single request method
     *
     * @param $key
     * @param $value
     * @return mixed
     */
    public function setHeader($key, $value);

    /**
     * Set multiple other options or parameters depending on different drivers
     *
     * @param array $others
     * @return mixed
     */
    public function setOthers(array $others);

    /**
     * Set single other option or parameter depending on different drivers
     *
     * @param $key
     * @param $value
     * @return mixed
     */
    public function setOther($key, $value);

    /**
     * Enable debug mode
     *
     * @return mixed
     */
    public function enableDebug();

    /**
     * Disable debug mode
     *
     * @return mixed
     */
    public function disableDebug();

    /**
     * Show response header in result
     *
     * @return mixed
     */
    public function showHeader();

    /**
     * Hide response header in result
     *
     * @return mixed
     */
    public function hideHeader();

    /**
     * Set request method: (default) GET, POST, PUT, DELETE
     *
     * @param $method
     * @return mixed
     */
    public function setMethod($method);

    /**
     * Set request data type
     *
     * @param $type
     * @return mixed
     */
    public function setDataType($type);

    /**
     * Set elastic IP address
     *
     * @param $ip
     * @return mixed
     */
    public function setIpAddress($ip);

    /**
     * Set request data, data format should be based on request method
     *
     * @param $rawData
     * @return mixed
     */
    public function setData($rawData);

    /**
     * Set request destination
     *
     * @param $url
     * @return mixed
     */
    public function setURL($url);

    /**
     * Send request
     *
     * @return mixed
     */
    public function request();

    /**
     * Get response after request
     *
     * @return mixed
     */
    public function getResponse();
}