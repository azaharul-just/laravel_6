 @extends('welcome')
 @section('content')
 <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p> 
             
            <a href="{{route('all.post')}}" class="btn btn-success">All Post</a>
        </p>
        <hr>
        <h1>Update Post</h1>
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
        
         
        <form action="{{url('update/post/'.$post->id)}}" method="post" enctype="multipart/form-data">
        @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Post Title</label>
              <input type="text" name="title" class="form-control" value="{{$post->title}}" required  >
              
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category</label>
              <select class="form-control"  name="category_id"> 
                  @foreach($category as $row)
                  <option value="{{$row->id}}" <?php if($row->id == $post->category_id) echo "selected";?> >{{$row->name}}</option>
                  @endforeach
              </select>
            </div>
          </div>
          
          <div class="control-group">
            <div class="form-group col-xs-12 floating-label-form-group controls">
              New Image:
              <label>New Image</label>
               <input type="file" name="image" class="form-control">
               Old Image : <img src="{{URL::to($post->image)}}" style="height: 80px;width: 100px;">

               <input type="hidden" name="old_img" value="{{$post->image}}">
            </div>
          </div>
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Message</label>
              <textarea rows="5" name="details" class="form-control"  required> {{$post->details}} </textarea>
               
            </div>
          </div>
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" name="submitButton">Update</button>
          </div>
        </form>
      </div>
    </div>
  </div>
 
 @endsection