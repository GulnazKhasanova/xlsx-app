<?php

namespace App\Imports;

use App\Models\ZakazUnity;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use PhpOffice\PhpSpreadsheet\Shared\Date;


class ZakazUnityImport implements ToCollection
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function collection(Collection $rows)
    {
        foreach ($rows as $row){

        if(preg_match("/[А-Яа-я]/", $row[0]) ){
            continue;
        }
           ZakazUnity::create([
            'id'          => null,
            'num'         => $row[0],
            'created_at'  => Date::excelToDateTimeObject($row[1])->format('Y-m-d h:m:s'),
            'status'      => $row[2],
            ]);
        }
    }





}
