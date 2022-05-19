<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exports\StudentExport;
use App\Imports\ImportStudent;
use Maatwebsite\Excel\Facades\Excel;

class StudentExcelController extends Controller
{
    public function export() 
    {
        return Excel::download(new StudentExport, 'students.xlsx');
        // return "HJello";
    }
    public function importForm(){
        return view('importForm');
    }
    public function import(Request $request) 
    {
        // dd($request->all());
        Excel::import(new ImportStudent,$request->file('file'));
        return redirect()->route('students.index');
        // return redirect()->back();
    }


    public function format(){
        return Excel::download(new StudentExport, 'about.xlsx');
    }
}
