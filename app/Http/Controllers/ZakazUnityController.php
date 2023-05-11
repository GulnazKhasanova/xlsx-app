<?php

namespace App\Http\Controllers;

use app\Helpers\Zakaz;
use App\Http\Requests\XlsxRequest;
use App\Imports\ZakazUnityImport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Contracts\Filesystem\FileNotFoundException;


class ZakazUnityController extends Controller
{

    public function import(XlsxRequest $request)
    {
        ini_set('max_execution_time', 900);
        ini_set('memory_limit', '-1');

        try {
        Excel::import(new ZakazUnityImport(), $request->file('files'));
        Zakaz::addZakaz();

        DB::table('zakazunity')->truncate();
        return redirect('/')->with('success', 'All good!');

        }catch (FileNotFoundException $e){
            dd($e->getMessage());
        }
    }
}
