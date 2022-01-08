<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index(){
        $users = User::latest('id')->paginate(10);
        return view('user.index',compact('users'));
    }
    public function fileImportExport()
    {
       return view('file-import');
    }
    public function fileImport(Request $request) 
    {
        Excel::import(new UsersImport, $request->file('file')->store('storage/excel'));
        return back();
    }
    public function fileExport() 
    {
        return Excel::download(new UsersExport, 'users-collection.xlsx');
    }  
}
