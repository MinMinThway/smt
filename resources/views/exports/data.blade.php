
<table style="text-align: center;" border="1">
    @foreach ($students as $student)
    <thead>
      <tr style="background-color: #6b6666;">
        <th align="center">No</th>
        <th align="center">Name</th>
        <th align="center">Nrc</th>
        <th align="center">Birthday</th>
        <th align="center">Phone</th>
        <th align="center">Gender</th>
        <th align="center">Region</th>
        <th align="center">Hobbies</th>
    </tr>
    </thead>
   <tbody style="text-align: center">  
    <tr>
        <td align="center">{{$student->id}}</td>
        <td align="center">{{$student->name}}</td>
        <td align="center">{{$student->nrc}}</td>
        <td align="center">{{$student->birthday}}</td>
        <td align="center">{{$student->phone}}</td>
        <td align="center">{{$student->gender}}</td>
        <td align="center">{{$student->region}}</td>
        @php
            $detail = json_decode($student->hobbies);
            // var_dump($detail);
            // die();
        @endphp
    

        <td align="center">{{implode(",",$detail) }}</td>

    </tr>
   </tbody>
   @php
    //   echo "<pre>";
    //    $arr = json_decode($student->details);
    //    $data =  array_map(function ($length) {
    //         return $length;
    //     }, $arr);
    //     var_dump(count($data->years));
    //     die();
    //     // for ($i=0; $i < ; $i++) { 
    //     //     # code...
    //     // }
      

   @endphp
   {{-- @if ($student->details == ) --}}
   <tfoot>
    <tr style="text-align: center">
        <td colspan="8" align="center">Detail</td>
    </tr>
    <tr>
        <th align="center" colspan="2">Acdimetic Year</th>
        <th align="center">Mark1</th>
        <th align="center">Mark2</th>
        <th align="center">Mark3</th>
        <th align="center" colspan="3">Remark</th>
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
        @if ($years[$i])
            <td align="center" colspan="2">
                {{$years[$i]}}                   
            </td>
        @else
            <td align="center" colspan="2"><i>No data</i></td>
        @endif
        @if ($marks1[$i])
        <td align="center" >
            {{$marks1[$i]}}                   
        </td>
        @else
            <td><i>No data</i></td>
        @endif
        @if ($marks2[$i])
            <td align="center">
                {{$marks2[$i]}}                   
            </td>
        @else
            <td align="center"><i>No data</i></td>
        @endif
        @if ($marks3[$i])
        <td align="center">
            {{$marks3[$i]}}                   
        </td>
        @else
            <td><i>No data</i></td>
        @endif
        @if ($remarks[$i])
        <td align="center" colspan="3">
            {{$remarks[$i]}}                   
        </td>
        @else
            <td colspan="3"><i>No data</i></td>
        @endif
       </tr>    
       
    @endfor
   
    @endforeach   

</tfoot>

   <tr></tr>
   @endforeach
   
  </table>
