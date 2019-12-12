 @extends('welcome')
 @section('content')
 <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="mx-auto">
        <p> 
        		<a href="{{route('add.category')}}" class="btn btn-danger">Add Category</a>
        		<a href="{{route('all.category')}}" class="btn btn-info">All Category</a>
            <a href="{{route('write.post')}}" class="btn btn-success">Write Post</a>
        </p>
        <hr>	

        <h1>All Post</h1>
        <hr>
      @if(session()->has('success'))
      <div class="alert alert-success">
          {{ session()->get('success') }}
      </div>
      @endif

 
         <table class="table table-dark" style="text-align: center; width: 100%;">
           <tr>
             <th  >Id</th>
             <th  >Category</th>
             <th >Title</th>
             
    
             <th  >Image</th>
            
             <th >Action</th>
           </tr>

           @foreach($posts as $row)
           <tr>
             <td  >{{$row->id}}</td>
              <td  >{{$row->name}}</td>
              <td  >{{$row->title}}</td>
              
              
              <td > <img src="{{URL::to($row->image)}}" height="50px" width="80px"> </td>
              
             <td  >
               <a href="{{URL::to('edit/post/'.$row->id)}}" class="btn btn-success">Edit</a>
               <a href="{{URL::to('view/post/'.$row->id)}}" class="btn btn-success">View</a>
               <a href="{{URL::to('delete/post/'.$row->id)}}" id="delete" class="btn btn-danger">Delete</a>
             </td>
           </tr>
           @endforeach

         </table>
       
      </div>
    </div>
  </div>
 
 @endsection