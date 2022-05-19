@extends('layout')
@section('content')
<div class="container">
    <div class="w-75 mt-2 m-auto">
      <h3>့History Of Student</h3>
      <form action="#"  method="POST">
          @csrf
          <div class="mb-3">
            <img src="{{asset('image/'.$student->profile)}}" width="120" class="border rounded-circle" height="120" alt="">
        </div>
          <div class="mb-3">
              <label for="stu_name" class="form-label">Student Name</label>
              <input type="text" name="name" id="stu_name" class="form-control outline-none"   value="{{$student->name}}">
          </div>
          <div class="mb-3">
              <label for="nrc_no" class="form-label">Student NRC</label>
              <input type="text" name="nrc" id="nrc_no" class="form-control" value="{{$student->nrc}}">
          </div>
          <div class="mb-3">
              <label for="date" class="form-label">Student Date of Birth</label>
              <input type="date" name="birth" id="date" class="form-control" value="{{$student->birthday}}">
          </div> 
          <div class="mb-3">
              <label for="number" class="form-label">Student Phone  Number</label>
              <input type="number" name="phone" id="number" class="form-control" value="{{$student->phone}}">
          </div>
          <div class="mb-3">
            <label for="region" class="form-label">Region</label>
            <textarea class="form-control" name="region" id="region" rows="3">{{$student->region}}</textarea>
            @error('region')
              <span class="text-danger text-small">{{$message}}</span>
            @enderror
        </div>
       <div class="mb-3">
           <label class="form-label">Gender : </label><br>
           <div class="form-check d-inline-block">
            <input class="form-check-input" type="radio" name="gender" id="male" value="male" {{$student->gender == "male" ? "checked" : ""}}>
            <label class="form-check-label" for="male">
              Male
            </label>
          </div>
          <div class="form-check d-inline-block">
            <input class="form-check-input" type="radio" name="gender" id="female" value="female"  {{$student->gender == "female" ? "checked" : ""}}>
            <label class="form-check-label" for="female">
              Female
            </label>
          </div>
          <div class="form-check d-inline-block">
            <input class="form-check-input" type="radio" name="gender" id="others" value="others" {{$student->gender == "others" ? "checked" : ""}}>
            <label class="form-check-label" for="others">
              Others
            </label>
        </div>
          <br>
          @error('gender')
             <span class="text-danger text-small">{{$message}}</span>
           @enderror
       </div>
       <div class="mb-3">
           <label for="" class="form-label">Hobbies</label><br>
           @php
               $hobby = json_decode($student->hobbies);
               
            //    var_dump()
           @endphp
        <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox1"   name="hobbies[]" value="football" {{ in_array('football', $hobby) ? 'checked' : '' }}>
            <label class="form-check-label" for="inlineCheckbox1">Football</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="hobbies[]" value="reading" {{in_array('reading', $hobby) ? "checked" : ""}}>
            <label class="form-check-label" for="inlineCheckbox2">Reading</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="hobbies[]" value="singing" {{ in_array('singing', $hobby) ? 'checked' : '' }}>
            <label class="form-check-label" for="inlineCheckbox3">Singing</label>
          </div>
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="checkbox" id="inlineCheckbox4" name="hobbies[]" value="others" {{ in_array('others', $hobby) ? 'checked' : '' }}>
            <label class="form-check-label" for="inlineCheckbox4">Others</label>
          </div>
       </div>
          <h4>Add Student Detail</h4>
          <div>
              <table class="table table-striped table-hover" id="tb">
                <tr>
                  <th>Acdimetic Year</th>
                  <th>Mark1</th>
                  <th>Mark2</th>
                  <th>Mark3</th>
                  <th>Remark</th>
              </tr>
                  @foreach ($student->details as $data)
                  @php
                      $years = json_decode($data->years);
                      $marks1 = json_decode($data->marks1);
                      $marks2 = json_decode($data->marks2);
                      $marks3 = json_decode($data->marks3);
                      $remarks = json_decode($data->remarks);
                      ;
                  @endphp
                  @for ($i = 0; $i < count($years); $i++)
                  <tr>
                      <td>
                     
                          <input type="text" name="years[]" value="  {{$years[$i]}}" class="form-control" >
                         
                      </td>
                      <td>
                         
                             
                           <input type="text" name="mark1s[]" class="form-control" value="{{$marks1[$i]}}">
                     
                         
                      </td>
                      <td>
                     
                             
                          <input type="text" name="mark2s[]" class="form-control" value="{{$marks2[$i]}}">
                        
                      </td>
                      <td>
                      
                             
                          <input type="text" name="mark3s[]" class="form-control" value="{{$marks3[$i]}}">
                     
                      </td>
                      <td>
                     
                             
                          <input type="text" name="remarks[]" class="form-control" value="{{$remarks[$i]}}">
                      </td>
                     </tr>    
                     
                  @endfor
                 
                  @endforeach   
      
              
              </table>
          </div>
          <div>
              <a href="{{route('students.index')}}" class="btn btn-warning">Back</a>
          </div>
      </form>
    </div>
  </div>
@endsection