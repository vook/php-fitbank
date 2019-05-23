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
}
