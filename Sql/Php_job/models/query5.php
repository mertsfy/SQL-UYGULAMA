<?php

require_once __DIR__.'/../init.php';

class Query5
{
    public $recordCount;
    public $name;

    public function __construct($query)
    {
        $this->recordCount = $query->sirket;
        $this->name = $query->SektorAdi;
    }

    public static function all(): array
    {
        global $connection;

        $stmt = sqlsrv_query($connection, SQL5);

        $result = array();

        while ($obj = sqlsrv_fetch_object($stmt)) {
            $result[] = $obj;
        }

        flashMessage('show_sql', SQL5);
        return array_map(function($item){ return new Query5($item); }, $result);
    }
}