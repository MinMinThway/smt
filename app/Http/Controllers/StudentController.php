<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use App\Models\Student;
use Illuminate\Http\Request;
use App\Exports\StudentExport;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\StoreStudentRequest;
use Illuminate\Support\Facades\File;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = Student::all();
        return view('home', compact("students"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name" => "required",
            "nrc" => "required",
            "birth" => "required",
            "phone" => "required",
            "gender" => "required",
            "region" => "required",
            'profile' => 'required',
        ]);

    if($request->file('profile')){
        $image = $request->file("profile");
        $fileName = time() . $image->getClientOriginalName();
     
        $image->move(public_path() . "/image", $fileName);     
    }
       $student = new Student();
       $student->name = $request->name;
       $student->nrc = $request->nrc;
       $student->birthday = $request->birth;
       $student->phone = $request->phone;
       $student->profile = $fileName;
       $student->gender = $request->gender;
       $student->region = $request->region;
       $student->hobbies = json_encode($request->hobbies);
       $student->save(); 

    $detail  = new Detail();
       $detail->stu_id = $student->id;
       $detail->years =json_encode($request->years);
       $detail->marks1 =json_encode($request->mark1s);
    //    dd($request->mark1s);
       $detail->marks2 = json_encode($request->mark2s);
       $detail->marks3 = json_encode($request->mark3s);
       $detail->remarks =json_encode( $request->remarks);
        $detail->save();
      
       return redirect()->route('students.index')->with(["msg" => "Created Success!"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = Student::find($id);
      
        return view('detail', compact('student'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);
      
        return view('edit', compact('student'));
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
        $validated = $request->validate([
            "name" => "required",
            "nrc" => "required",
            "birth" => "required",
            "phone" => "required",
            "gender" => "required",
            "region" => "required",
        ]);

        $student = Student::findOrFail($id);
        $student->name = $request->name;
        $student->nrc = $request->nrc;
        $student->birthday = $request->birth;
        $student->phone = $request->phone;
        // if($request->profile){
        //     unlink(public_path().'/image//'.$student->profile);

        //     $image = $request->file('profile');
        //     $fileName = time().$image->getClientOriginalName();
        //     $image->move(public_path().'/image',$fileName);
        //     $student->image = $fileName;
        // }
        if($request->file('profile')){

            if (File::exists(public_path().'/image//'.$student->profile)) {
                // unlink(public_path().'/image//'.$student->profile);
                File::delete(public_path().'/image//'.$student->profile);
                }

          
            $image = $request->file("profile");
            $fileName = time() . $image->getClientOriginalName();
         
            $image->move(public_path() . "/image", $fileName);    
            $student->profile = $fileName; 
        }
        $student->gender = $request->gender;
        $student->region = $request->region;
        $student->hobbies = json_encode($request->hobbies);
        $student->save(); 
 
     $detail  = Detail::findOrFail($id);
        $detail->stu_id = $student->id;
        $detail->years =json_encode($request->years);
        $detail->marks1 =json_encode($request->mark1s);
     //    dd($request->mark1s);
        $detail->marks2 = json_encode($request->mark2s);
        $detail->marks3 = json_encode($request->mark3s);
        $detail->remarks =json_encode( $request->remarks);
         $detail->save();
       
        return redirect('/students')->with(["msg" => "Updated Success!"]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $detail = Detail::findOrFail($id);
        // dd($detail->stu_id);
        if($student->profile){
            unlink(public_path().'/image//'.$student->profile);
        }
        $student->delete();
        if($detail->stu_id === $student->id){
            $detail->delete();
        }
        
        return redirect()->route('students.index')->with(["msg" => "Deleted Success!"]);
    }
  
}
