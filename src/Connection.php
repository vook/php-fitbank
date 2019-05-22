<?php

namespace Vook\Fitbank;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;

/**
 * Class Connection
 * @package Vook\Service
 */
class Connection
{
    const SANDBOX_URL = 'https://sandbox.fitbank.com.br';
    const PROD_URL  = '';
    const MAIN_REQUEST_URI = 'hmlapi/main/execute';

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
    public function __construct($username, $password, $timeout, $isSandBox = true)
    {
        if (!$username && !$password) {
            $isSandBox = true;
        }
        $auth = base64_encode("$username:$password");
        $this->client = new Client([
            'base_uri'          => $isSandBox ? self::SANDBOX_URL : self::PROD_URL,
            'timeout'           => $timeout,
            'allow_redirects'   => false,
            'headers'           => [
                'content-type'      => 'application/json',
                'x-requested-with'  => 'XMLHttpRequest',
                'authorization'     => "Basic {$auth}"
            ]
        ]);
    }

    /**
     * @param $params
     * @return array
     * @throws \FitbankErrorException
     * @throws \FitbankInternalErrorException,
     */
    public function doRequest($params)
    {
        try {
            $request = $this->client->request('POST', self::MAIN_REQUEST_URI, [
                'json' => $params
            ]);
            if ($request->getStatusCode() > 400) {
                throw new \FitbankInternalErrorException();
            }
            $request = json_decode($request->getBody()->getContents(), true);
            if (!$request['Success']) {
                throw new \FitbankErrorException($request['Message'] ?? '');
            }
            unset($request['Success']);
            return $request;
        } catch (GuzzleException $e) {
            throw new \FitbankInternalErrorException($e->getMessage(), $e->getCode(), $e);
        }

    }
}
