<?php

require_once __DIR__.'/../init.php';

class Query2
{
    public $recordCount;

    public function __construct($query)
    {
        $this->recordCount = $query->igumezun;
    }

    public static function all(): array
    {
        global $connection;

        $stmt = sqlsrv_query($connection, SQL2);

        $result = array();

        while ($obj = sqlsrv_fetch_object($stmt)) {
            $result[] = $obj;
        }

        flashMessage('show_sql', SQL2);
        return array_map(function($item){ return new Query2($item); }, $result);
    }
}