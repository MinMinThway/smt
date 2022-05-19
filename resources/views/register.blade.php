@extends('layout')
@section('content')
    <div class="container">
      <div class="w-75 mt-2 m-auto">
        <h3>Register A Student</h3>
        <form action="{{route('students.store')}}"  method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="profile" class="form-label">Profile</label>
                <input type="file" name="profile" id="profile" value="" class="form-control">
                @error('profile')
                        <span class="text-danger text-small">{{$message}}</span>
                 @enderror
            </div>
            <div class="mb-3">
                <label for="stu_name" class="form-label">Name</label>
                <input type="text" name="name" id="stu_name" value="{{old('name')}}" class="form-control">
                @error('name')
                        <span class="text-danger text-small">{{$message}}</span>
                 @enderror
            </div>
            <div class="mb-3">
                <label for="nrc_no" class="form-label">NRC</label>
                <input type="text" name="nrc" id="nrc_no" value="{{old('nrc')}}" class="form-control">
                @error('nrc')
                     <span class="text-danger text-small">{{$message}}</span>
                 @enderror
            </div>
            <div class="mb-3">
                <label for="date" class="form-label">Birthday</label>
                <input type="date" name="birth" id="date" value="{{old('birth')}}" class="form-control">
                @error('birth')
                   <span class="text-danger text-small">{{$message}}</span>
                 @enderror
            </div> 
            <div class="mb-3">
                <label for="number" class="form-label">Phone  Number</label>
                <input type="number" name="phone" id="number" value="{{old('phone')}}" class="form-control">
                @error('phone')
                    <span class="text-danger text-small">{{$message}}</span>
                @enderror
            </div>
            <div class="mb-3">
                <label for="region" class="form-label">Region</label>
                <textarea class="form-control" name="region" id="region" rows="3"></textarea>
                @error('region')
                  <span class="text-danger text-small">{{$message}}</span>
                @enderror
            </div>
           <div class="mb-3">
               <label class="form-label">Gender : </label><br>
               <div class="form-check d-inline-block">
                <input class="form-check-input" type="radio" name="gender" id="male" value="male">
                <label class="form-check-label" for="male">
                  Male
                </label>
              </div>
              <div class="form-check d-inline-block">
                <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                <label class="form-check-label" for="female">
                  Female
                </label>
              </div>
              <div class="form-check d-inline-block">
                <input class="form-check-input" type="radio" name="gender" id="others" value="others">
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
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox1" name="hobbies[]" value="football">
                <label class="form-check-label" for="inlineCheckbox1">Football</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox2" name="hobbies[]" value="reading">
                <label class="form-check-label" for="inlineCheckbox2">Reading</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox3" name="hobbies[]" value="singing">
                <label class="form-check-label" for="inlineCheckbox3">Singing</label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id="inlineCheckbox4" name="hobbies[]" value="others">
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
                    <tr>
                        <td>
                            <input type="text" name="years[]" class="form-control">
                        </td>
                        <td>
                            <input type="text" name="mark1s[]" class="form-control">
                        </td>
                        <td>
                            <input type="text" name="mark2s[]" class="form-control">
                        </td>
                        <td>
                            <input type="text"  name="mark3s[]" class="form-control">
                        </td>
                        <td>
                            <input type="text" name="remarks[]" class="form-control">
                        </td>
                        <td>
                            <a href='javascript:void(0);'  class='remove btn-danger d-inline-block border rounded-pill text-decoration-none p-1'>Remove</a>
                        </td>

                    </tr>
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