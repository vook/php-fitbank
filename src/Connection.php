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
    const SANDBOX_URL = 'https://sandbox.fitbank.com.br/hmlapi';
    const SANDBOX_MAIN_REQUEST = 'hmlapi/main/execute';

    const PROD_URL  = 'https://apiv2.fitbank.com.br';
    const PROD_MAIN_REQUEST = '/main/execute';

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
     * @var bool
     */
    private $isSandBox = true;

    /**
     * @var string
     */
    public static $dateParser;

    /**
     * Connection constructor.
     * @param array $config
     */
    public function __construct(array $config) {

        $this->partnerId = $config['partner_id'];
        $this->businessUnitId = $config["business_unit_id"];
        $this->marketPlaceId = $config["market_place_id"];
        $username = $config["username"];
        $password = $config["password"];
        $this->isSandBox = (bool) $username &&  (bool) $password && $config["sandbox"];
        $auth = base64_encode("$username:$password");
        $this->client = new Client([
            'base_uri'          => $this->isSandBox ? self::SANDBOX_URL : self::PROD_URL,
            'timeout'           => $config["timeout"],
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
            $request = $this->client->request(
                'POST',
                $this->isSandBox ? self::SANDBOX_MAIN_REQUEST : self::PROD_MAIN_REQUEST, [
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
