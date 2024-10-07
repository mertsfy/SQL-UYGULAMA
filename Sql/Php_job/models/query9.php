<?php

require_once __DIR__.'/../init.php';

class Query9
{
    public $recordCount;
    public $month;
    public $year;

    public function __construct($query)
    {
        $this->recordCount = $query->basvuru;
        $this->month = $query->basvuruay;
        $this->year = $query->basvuruyil;
    }

    public static function all(): array
    {
        global $connection;

        $stmt = sqlsrv_query($connection, SQL9);

        $result = array();

        while ($obj = sqlsrv_fetch_object($stmt)) {
            $result[] = $obj;
        }

        flashMessage('show_sql', SQL9);
        return array_map(function($item){ return new Query9($item); }, $result);
    }
}