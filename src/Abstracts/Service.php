<?php

namespace Vook\Fitbank\Abstracts;

use Vook\Fitbank\Connection;

/**
 * Class AbstractService
 * @package Vook\Fitbank\Service
 */
abstract class Service
{
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
    public function __construct(Connection $connection)
    {
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
