<?php

require_once __DIR__.'/../init.php';

class Query3
{
    public $recordCount;
    public $language;

    public function __construct($query)
    {
        $this->recordCount = $query->aday;
        $this->language = $query->DilAdi;
    }

    public static function all(): array
    {
        global $connection;

        $stmt = sqlsrv_query($connection, SQL3);

        $result = array();

        while ($obj = sqlsrv_fetch_object($stmt)) {
            $result[] = $obj;
        }

        flashMessage('show_sql', SQL3);
        return array_map(function($item){ return new Query3($item); }, $result);
    }
}