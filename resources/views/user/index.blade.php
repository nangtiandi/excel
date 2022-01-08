@extends('master')
@section('content')
<div class="container">
   <div class="row">
      <div class="d-flex my-3">
         <a href="{{route('file-export')}}" class="btn btn-info mx-2">Export Users</a>
         <button class="btn btn-light" id="importBtn">Import Users</button>
         <form action="{{route('file-import')}}" method="POST" enctype="multipart/form-data" id="importForm" class="d-none">
            @csrf
            <input type="file" class="d-none" name="file" id="importFile">
            <button class="btn btn-light">Import Users</button>
         </form>
      </div>
      <div class="col-md-12">
         <div class="card">
            <div class="card-body">
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Password</th>
                        <th>Created At</th>
                        <th colspan="2">Option</th>
                     </tr>
                  </thead>
                  <tbody>
                     @foreach ($users as $user)
                     <tr>
                       <td>{{$user->id}}</td>
                       <td>{{$user->name}}</td>
                       <td>{{$user->email}}</td>
                       <td>{{$user->password}}</td>
                       <td>{{$user->created_at->format('h:i:a')}}</td>
                       <td>
                          <a href="" class="btn btn-warning">Edit</a>
                       </td>
                       <td>
                          <a href="" class="btn btn-danger">Delete</a>
                       </td>
                    </tr>
                     @endforeach
                  </tbody>
               </table>
            </div>
         </div>
      </div>
   </div>
</div>
@endsection
@section('footer') 
<script>
   let importBtn = document.getElementById('importBtn');
   let importFile = document.getElementById('importFile');
   let importForm = document.getElementById('importForm');

   importBtn.addEventListener('click',()=>{
      importFile.click();
   })
   importFile.addEventListener('change',()=>{
      importForm.submit();
   })

 </script> 
 @endsection