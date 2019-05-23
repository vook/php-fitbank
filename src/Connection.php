<?php

namespace Vook\Fitbank;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Vook\Fitbank\Exceptions\FitbankErrorException;
use Vook\Fitbank\Exceptions\FitbankInternalErrorException;

/**
 * Class Connection
 * @package Vook\Service
 */
class Connection
{
    const SANDBOX_URL = 'https://sandbox.fitbank.com.br';
    const PROD_URL  = '';
    const MAIN_REQUEST_URI = '/hmlapi/main/execute';

    /**
     * @var int
     */
    private $partnerId;

    /**
     * @var int
     */
    private $businessUnitId;

    /**
     * @var int
     */
    private $marketPlaceId;

    /**
     * @var Client
     */
    private $client;

    /**
     * Connection constructor.
     * @param null $username
     * @param null $password
     * @param int $timeout
     * @param bool $isSandBox
     */
    public function __construct($username, $password, $partnerId, $businessUnitId, $marketPlaceId, $timeout, $isSandBox = true)
    {
        $this->partnerId = $partnerId;
        $this->businessUnitId = $businessUnitId;
        $this->marketPlaceId = $marketPlaceId;
        if (!$username && !$password) {
            $isSandBox = true;
        }
        $auth = base64_encode("$username:$password");
        $this->client = new Client([
            'base_uri'          => $isSandBox ? self::SANDBOX_URL : self::PROD_URL,
            'timeout'           => $timeout,
            'allow_redirects'   => false,
            'headers'           => [
                'Content-Type'      => 'application/json',
                'X-Requested-With'  => 'XMLHttpRequest',
                'Authorization'     => "Basic {$auth}"
            ]
        ]);
    }

    /**
     * @param $params
     * @return array
     * @throws FitbankErrorException
     * @throws FitbankInternalErrorException,
     */
    public function doRequest(string $method, array $params, bool $hasMarketPlace = false)
    {
        try {
            $request = $this->client->request('POST', self::MAIN_REQUEST_URI, [
                'json' => array_merge($params, [
                    'Method'            => $method,
                    'PartnerId'         => $this->partnerId,
                    'BusinessUnitId'    => $this->businessUnitId
                ], $hasMarketPlace ? [
                    'MktPlaceId'        => $this->marketPlaceId
                ] : [])
            ]);
            if ($request->getStatusCode() > 400) {
                throw new FitbankInternalErrorException();
            }
            $request = json_decode($request->getBody()->getContents(), true);
            if (!$request['Success'] || $request['Success'] == 'false') {
                preg_match('/(.*)\s\-\s(.*)/', $request['Message'], $messages);
                throw new FitbankErrorException($messages[2] ?? null, self::normalizeInt($messages[1]));
            }
            unset($request['Success']);
            return $request;
        } catch (GuzzleException $e) {
            throw new FitbankInternalErrorException($e->getMessage(), $e->getCode(), $e);
        }
    }

    /**
     * @param string $value
     * @return string
     */
    protected static function normalizeNumeric(string $value)
    {
        return preg_replace('/\D/', '', $value);
    }

    /**
     * @param $value
     * @return int
     */
    protected static function normalizeInt($value)
    {
        return (int) self::normalizeNumeric($value);
    }
}
