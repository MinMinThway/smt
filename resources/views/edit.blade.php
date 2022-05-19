@extends('layout')
@section('content')
    <div class="container">
      <div class="w-75 mt-2 m-auto">
        <h3>Editing  Student</h3>
        <form action="{{route('students.update', $student->id)}}"  method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            <div class="mb-3">
                <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Profile</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">New Profile</button>
                    </li>
                  </ul>
                  <div class="tab-content" id="pills-tabContent">
                    <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                        <img src="{{asset('image/'.$student->profile)}}" alt="" width="120px" height="120px">
                    </div>
                    <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                        <input type="file" name="profile" id="profile" value="" class="form-control">
                    </div>                  
                </div>
            </div>
            <div class="mb-3">
                <label for="stu_name" class="form-label">Student Name</label>
                <input type="text" name="name" id="stu_name" class="form-control outline-none"   value="{{$student->name}}">
                @error('name')
                    <span class="text-danger text-small">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="nrc_no" class="form-label">Student NRC</label>
                <input type="text" name="nrc" id="nrc_no" class="form-control" value="{{$student->nrc}}">
                @error('nrc')
                    <span class="text-danger text-small">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Student Date of Birth</label>
                <input type="date" name="birth" id="date" class="form-control" value="{{$student->birthday}}">
                @error('birth')
                    <span class="text-danger text-small">{{$message}}</span>
                @enderror
            </div> 
            <div class="mb-3">
                <label for="number" class="form-label">Student Phone  Number</label>
                <input type="text" name="phone" id="number" class="form-control" value="{{$student->phone}}">
                @error('phone')
                    <span class="text-danger text-small">{{$message}}</span>
                @enderror
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
                        <th><a href="javascript:void(0);" style="font-size:18px;" class="btn d-inline-block btn-success" id="addMore" title="Add More Person">Add</a></th>

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
                        <td>
                            <a href='javascript:void(0);'  class='remove btn-danger d-inline-block border rounded-pill text-decoration-none p-1'>Remove</a>
                        </td>
                       </tr>    
                       
                    @endfor
                   
                    @endforeach   
        
                
                </table>
            </div>
            <div>
                <button class="btn btn-success">Submit</button>
                <a href="{{route('students.index')}}" class="btn btn-warning">Back</a>
            </div>
        </form>
      </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

    <script>
        $(function(){
            $('#addMore').on('click', function() {
                  var data = $("#tb tr:eq(1)").clone(true).appendTo("#tb");
                  data.find("input").val('');
         });
         $('.remove').on('click', function(){
            var trIndex = $(this).closest("tr").index();
                if(trIndex>1) {
                 $(this).closest("tr").remove();
               } else {
                 alert("Sorry!! Can't remove first row!");
               }
         })
        })
    </script>
@endsection
