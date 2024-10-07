<?php

require_once __DIR__.'/../init.php';

class Query7
{
    public $recordCount;
    public $name;

    public function __construct($query)
    {
        $this->recordCount = $query->ilan;
        $this->name = $query->SehirAdi;
    }

    public static function all(): array
    {
        global $connection;

        $stmt = sqlsrv_query($connection, SQL7);

        $result = array();

        while ($obj = sqlsrv_fetch_object($stmt)) {
            $result[] = $obj;
        }

        flashMessage('show_sql', SQL7);
        return array_map(function($item){ return new Query7($item); }, $result);
    }
}