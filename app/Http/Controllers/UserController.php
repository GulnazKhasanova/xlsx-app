<?php

namespace App\Http\Controllers;

use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Exports\UsersExport;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }


    public function import()
    {
        Excel::import(new UsersImport, 'public/users.xlsx');

        return redirect('/')->with('success', 'All good!');
    }
}
