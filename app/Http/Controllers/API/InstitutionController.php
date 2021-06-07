<?php

namespace App\Http\Controllers\API;
use App\Institution;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class InstitutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $institution = institution::all();
        return response()->json([
            "institutions" => $institution
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
            'state' => 'required|string|max:255',
            'district' => 'required|string|max:255',
            'adress' => 'required|string|max:255',
            'mail'  => 'required|string|max:255',
            'user_id'  => 'bigInteger|max:255',
            'phone_number' => 'required|string|max:255',
        ]);
        $institution = Institution::create([
            'name' => $validatedData['name'],
            'state' => $validatedData['state'],
            'adress' => $validatedData['adress'],
            'district' => $validatedData['district'],
            'mail'  => $validatedData['mail'],
            'user_id'  => $validatedData['user_id'],
            'phone_number' => $validatedData['phone_number'],
        ]);
        if(!is_null($institution)) {
            return response()->json([
                "status" => "success",
                "message" => "Institution have been create",
                "data you create" => $institution
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
        if($institution = Institution::find($id)){
            return response()->json([
                "Institution" => $institution
            ]);
            }else{
                return response()->json([
                    "Error" => "this institution you want get doesn't exist"
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
        $institution = Institution::find($id);
        if($institution->update($request->all())){
            $institution->save();
            return response()->json([
            'success'=> 'your update has done',
            "Data"=> $institution
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
        $institution = Institution::find($id);
        if($institution->delete()){
            return response()->json([
            'success'=> 'Contact has been delete'
        ], 204);
        }
    }
}

 