 @extends('welcome')
 @section('content')
 <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="mx-auto">
        <p> 
        		<a href="{{route('write.post')}}" class="btn btn-danger">Write Post</a>
        		<a href="{{route('all.post')}}" class="btn btn-info">All Post</a>
            
        </p>
        <hr>	
        <h1>Post Details</h1>
        <hr>
        <div>
          <ul>
            <li><b>Post Id : </b> {{$post->id}}</li><br>
            <li><b>Category : </b> {{$post->name}}</li><br>
            <li><b>Title : </b> {{$post->title}}</li><br>
            <li><b>Image: </b> <img src="{{URL::to($post->image)}}" style="height: 400px;width:400px;"></li><br>
            <li style="text-align: justify;"><b>Description : </b> {{$post->details}}</li><br>
            
            <li><b>Created at : </b> {{$post->created_at}}</li><br>

          </ul>
        </div>
        
       
      </div>
    </div>
  </div>
 
 @endsection