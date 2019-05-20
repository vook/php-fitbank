<?php

namespace Vook\Fitbank\Service;

use Vook\Fitbank\Connection;

/**
 * Class AbstractService
 * @package Vook\Fitbank\Service
 */
abstract class Service
{
    /**
     * @var int
     */
    protected $partnerId;

    /**
     * @var int
     */
    protected $businessUnitId;

    /**
     * @var int
     */
    protected $marketId;

    /**
     * @var connection
     */
    protected $connection;

    /**
     * Transferencia constructor.
     * @param Connection $connection
     * @param $parceiroId
     * @param $businessUnitId
     */
    public function __construct(Connection $connection, $parceiroId, $businessUnitId, $marketId)
    {
        $this->partnerId        = $parceiroId;
        $this->businessUnitId   = $businessUnitId;
        $this->marketId         = $marketId;
        $this->connection       = $connection;
    }

    /**
     * @param string $value
     * @return string
     */
    protected function normalizeNumeric(string $value)
    {
        return preg_replace('/\D/', '', $value);
    }

    /**
     * @param $value
     * @return int
     */
    protected function normalizeInt($value)
    {
        return (int) $this->normalizeNumeric($value);
    }

    /**
     * @param $date
     * @return \DateTime|null
     */
    protected function parseDateTime($date)
    {
        return $date ? new \DateTime($date) : null;
    }

}
