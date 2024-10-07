<?php

require_once __DIR__.'/../init.php';

class Query10
{
    public $name;
    public $age;
    public $phone;
    public $salary;
    public $adate;
    public $firm;
    public $city;

    public function __construct($query)
    {
        $this->name = $query->Adi.' '.$query->Soyadi;
        $this->age = $query->yasi;
        $this->phone = $query->TelefonNo;
        $this->salary = $query->TalebEdilenMaas;
        $this->adate = $query->BasvuruTarihi->format('d-m-Y');
        $this->firm = $query->SirketAdi;
        $this->city = $query->SehirAdi;
    }

    public static function all(): array
    {
        global $connection;

        $stmt = sqlsrv_query($connection, SQL10);

        $result = array();

        while ($obj = sqlsrv_fetch_object($stmt)) {
            $result[] = $obj;
        }

        flashMessage('show_sql', SQL10);
        return array_map(function($item){ return new Query10($item); }, $result);
    }
}