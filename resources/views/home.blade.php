@extends('layout')
@section('content')
  <div class="container">
    <div class="w-75 mt-2 m-auto">
    <h3>Student List</h3>
      <a href="{{route('students.create')}}" class="btn btn-outline-success mb-3">Add ++</a>
      <a href="{{route('export')}}" class="btn btn-outline-warning mb-3">Export</a>
      <a href="{{route('importForm')}}" class="btn btn-outline-danger mb-3">Import</a>
      {{-- <a href="{{route('format')}}" class="btn btn-outline-primary mb-3">Format</a> --}}
      @if (Session::get('msg'))
      <div class="alert alert-success" id="msg">
          {{Session::get('msg')}}
      </div>
    @endif
      <table class="table text-center" id="example">
        <thead>
          <tr>
            <th>No</th>
            <th>Name</th>
            <th>Nrc</th>
            <th>Birthday</th>
            <th>Phone</th>
            <th>Action</th>
        </tr>
        </thead>
          @php
            $i=1;
          @endphp
       <tbody>
        @foreach ($students as $student)
        <tr>
            <td>{{$i++}}</td>
            <td>{{$student->name}}</td>
            <td>{{$student->nrc}}</td>
            <td>{{$student->birthday}}</td>
            <td>{{$student->phone}}</td>
            <td>
                <a href="{{route('students.edit', $student->id)}}"><i class="fas fa-edit text-warning"></i></a>
                <form action="{{route('students.destroy', $student->id)}}" class="d-inline" method="POST">
                    @csrf @method('DELETE')
                    <button class="btn"><i class="fas fa-trash text-danger"></i></button>
                </form>
                {{-- <a href="#" class="d-inline-block">view</a> --}}
                <a href="{{route('students.show', $student->id)}}"><i class="fas fa-eye"></i></a>
            </td>
        </tr>
    @endforeach
       </tbody>
      </table>
      {{-- {!! $students->links() !!} --}}
    </div>
  </div>
  <script>
    let msg = document.querySelector("#msg");
    setInterval(() => {
      msg.style.display="none";
    }, 1000)
   


</script>
  @endsection

</body>
</html