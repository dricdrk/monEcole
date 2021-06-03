<?php

namespace App\Http\Controllers;
use App\ExamResult;
use App\Institution;
use Illuminate\Http\Request;

class allDataController extends Controller
{
    public function index()
    {
        $institu=[];
        $institutions = institution::all();
        foreach ($institutions as $institution) {
            $id=$institution['id'];
            $examresult = ExamResult::find($id);
            $institu[]= $examresult;
        }
        return response()->json([
            "examresult" => $institu,
            "institution" => $institutions
        ]);
    }
}
