 @extends('welcome')
 @section('content')
 <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p> 
        		<a href="{{route('add.category')}}" class="btn btn-danger">Add Category</a>
        		<a href="{{route('all.category')}}" class="btn btn-info">All Category</a>
        </p>
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

     <h1>Update Category</h1>
        <hr>
      
        <form action="{{url('update/category/'.$edit_category->id)}}" method="post">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category Name</label>
              <input type="text" class="form-control" name="name" value="{{$edit_category->name}}" required  >
              
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Slug Name</label>
               <input type="text" class="form-control" name="slug" value="{{$edit_category->slug}}" required  >

            </div>
          </div>
          
        
          <br>
          <div id="success"></div>
          <div class="form-group">
            <button type="submit" class="btn btn-primary" id="save">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>
 
 @endsection