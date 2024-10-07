<?php

require_once __DIR__.'/../init.php';

class Query8
{
    public $recordCount;
    public $desc;

    public function __construct($query)
    {
        $this->recordCount = $query->basvuru;
        $this->desc = $query->sehir;
    }

    public static function all(): array
    {
        global $connection;

        $stmt = sqlsrv_query($connection, SQL8);

        $result = array();

        while ($obj = sqlsrv_fetch_object($stmt)) {
            $result[] = $obj;
        }

        flashMessage('show_sql', SQL8);
        return array_map(function($item){ return new Query8($item); }, $result);
    }
}