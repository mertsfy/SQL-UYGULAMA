<?php

require_once __DIR__.'/../init.php';

class Query1
{
    public $recordCount;
    public $table;

    public function __construct($query)
    {
        $this->recordCount = $query->kayitsayisi;
        $this->table = $query->tablo;
    }

    public static function all(): array
    {
        global $connection;

        $stmt = sqlsrv_query($connection, SQL1);

        $result = array();

        while ($obj = sqlsrv_fetch_object($stmt)) {
            $result[] = $obj;
        }

        flashMessage('show_sql', SQL1);
        return array_map(function($item){ return new Query1($item); }, $result);
    }
}