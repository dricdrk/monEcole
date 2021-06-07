<?php

namespace App\Http\Controllers\API;
use App\ExamResult;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ExamResultController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $examresult = ExamResult::all();
        return response()->json([
            "examresult" => $examresult
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
   { 
            $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'number_of_people' => 'string|max:255',
            'number_of_people_received' => 'string|max:255',
            'institution_id' => 'required|string|max:255',
        ]);
    $cat= $validatedData['number_of_people']/20;
    $cat=(int)$cat;
    $cat++;
    switch ($cat) {
        case 1:
            $categorie=10;
            break;
        case 2:
            $categorie=9;
            break;
        case 3:
            $categorie=8;
            break;
        case 4:
            $categorie=7;
            break;
        case 5:
            $categorie=6;
            break;
        case 6:
            $categorie=5;
            break;
        case 7:
            $categorie=4;
            break;
        case 8:
            $categorie=3;
            break;
        case 9:
            $categorie=2;
            break;
        case 10:
            $categorie=1;
            break;
    }
        $examresult = ExamResult::create([
            'name' => $validatedData['name'],
            'number_of_people' => $validatedData['number_of_people'],
            'number_of_people_received' => $validatedData['number_of_people_received'],
            'institution_id'  => $validatedData['institution_id' ],
            'categories'  => $categorie,
            
        ]);
        if(!is_null($examresult)) {
            return response()->json([
                "status" => "success",
                "message" => "examresult data have been create",
                "data you create" => $examresult
            ]);
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($examresult = ExamResult::find($id)){
            return response()->json([
                "ExamResult" => $examresult
            ]);
            }else{
                return response()->json([
                    "Error" => "this examresult you want get doesn't exist"
                ]);
             }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $examresult = ExamResult::find($id);
        if($examresult->update($request->all())){
            $examresult->save();
            return response()->json([
            'success'=> 'your update has done',
            "Data"=> $examresult
            ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $examresult = ExamResult::find($id);
        if($examresult->delete()){
            return response()->json([
            'success'=> 'Exam result has been delete succefully'
        ], 204);
        }
    }
}
