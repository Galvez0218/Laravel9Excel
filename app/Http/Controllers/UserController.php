<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\ImportUser;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function importView()
    {
        return view('importFile');
    }

    public function import(Request $request)
    {
        Excel::import(new ImportUser, $request->file('file'));
        return redirect()->back();
    }

    public function exportUsers(Request $request)
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
