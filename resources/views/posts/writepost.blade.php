 @extends('welcome')
 @section('content')
 <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p> 
        		<a href="{{route('add.category')}}" class="btn btn-danger">Add Category</a>
        		<a href="{{route('all.category')}}" class="btn btn-info">All Category</a>
        		<a href="{{route('all.post')}}" class="btn btn-success">All Post</a>
        </p>
        <hr>
        <h1>Add Post</h1>
        <hr>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
 
        @endif	

        @if(session()->has('success'))
	    <div class="alert alert-success">
	        {{ session()->get('success') }}
	    </div>
    	@endif
        
         
        <form action="{{route('store.post')}}" method="post" enctype="multipart/form-data">
        @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Title</label>
              <input type="text" name="title" class="form-control" placeholder="Title" required  >
              
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category</label>
              <select class="form-control"  name="category_id">	
              		@foreach($category as $row)
              		<option value="{{$row->id}}">{{$row->name}}</option>
              		@endforeach
              </select>
            </div>
          </div>
          
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              <label>Post Image</label>
              <input type="file" name="image" class="form-control">
               
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Message</label>
              <textarea rows="5" name="details" class="form-control" placeholder="Message" required></textarea>
               
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" name="submitButton">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
 
 @endsection