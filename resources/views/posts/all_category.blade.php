 @extends('welcome')
 @section('content')
 <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="mx-auto">
        <p> 
        		<a href="{{route('add.category')}}" class="btn btn-danger">Add Category</a>
        		<a href="{{route('all.category')}}" class="btn btn-info">All Category</a>
            <a href="{{route('all.post')}}" class="btn btn-success">All Post</a>
        </p>
        <hr>	
      <h1>All Category</h1>
        <hr>
         <table class="table table-dark" style="text-align: center; width: 100%;">
           <tr>
             <th>Id</th>
             <th>Category Name</th>
             <th>Slug Name</th>
             <th>Created at</th>
             <th>Action</th>
           </tr>

           @foreach($category as $row)
           <tr>
             <td>{{$row->id}}</td>
              <td>{{$row->name}}</td>
              <td>{{$row->slug}}</td>
              <td>{{$row->created_at}}</td>
             <td>
               <a href="{{URL::to('edit/category/'.$row->id)}}" class="btn btn-info">Edit</a>
               <a href="{{URL::to('view/category/'.$row->id)}}" class="btn btn-success">View</a>
               <a href="{{URL::to('delete/category/'.$row->id)}}" id="delete" class="btn btn-danger">Delete</a>
             </td>
           </tr>
           @endforeach

         </table>
       
      </div>
    </div>
  </div>
 
 @endsection