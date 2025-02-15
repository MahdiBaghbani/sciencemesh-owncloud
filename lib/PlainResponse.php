<?php
/**
 * ownCloud - sciencemesh
 *
 * This file is licensed under the MIT License. See the LICENCE file.
 * @license MIT
 * @copyright Sciencemesh 2020 - 2023
 *
 * @author Michiel De Jong <michiel@pondersource.com>
 * @author Mohammad Mahdi Baghbani Pourvahid <mahdi-baghbani@azadehafzar.ir>
 */

namespace OCA\ScienceMesh;

use OCP\AppFramework\Http;
use OCP\AppFramework\Http\Response;

class PlainResponse extends Response
{
    // FIXME: We might as well add a PSRResponse class to handle those;

    /**
     * response data
     * @var array|object
     */
    protected $data;

    /**
     * constructor of PlainResponse
     * @param array|object $data the object or array that should be transformed
     * @param int $statusCode the Http status code, defaults to 200
     */
    public function __construct($data = '', int $statusCode = Http::STATUS_OK)
    {
        $this->data = $data;
        $this->setStatus($statusCode);
        $this->addHeader('Content-Type', 'text/html; charset=utf-8');
    }

    /**
     * Returns the data unchanged
     * @return string the data (unchanged)
     */
    public function render()
    {
        return $this->data;
    }

    /**
     * Used to get the set parameters
     * @return array|object|string data
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Sets the data for the response
     * @return PlainResponse Reference to this object
     */
    public function setData($data): PlainResponse
    {
        $this->data = $data;
        return $this;
    }
}
