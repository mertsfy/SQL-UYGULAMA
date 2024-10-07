<?php

require_once __DIR__.'/../init.php';

class Query4
{
    public $id;
    public $name;
    public $bdate;
    public $blocation;
    public $email;
    public $phone;

    public function __construct($query)
    {
        $this->id = $query->AdayId;
        $this->name = $query->Adi.' '.$query->Soyadi;
        $this->bdate = $query->DogumTarihi->format('d-m-Y');
        $this->blocation = $query->DogumYeri;
        $this->email = $query->Email;
        $this->phone = $query->TelefonNo;
    }

    public static function all(): array
    {
        global $connection;

        $stmt = sqlsrv_query($connection, SQL4);

        $result = array();

        while ($obj = sqlsrv_fetch_object($stmt)) {
            $result[] = $obj;
        }

        flashMessage('show_sql', SQL4);
        return array_map(function($item){ return new Query4($item); }, $result);
    }
}