 @extends('welcome')
 @section('content')
 <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <p> 
        		<a href="{{route('add.category')}}" class="btn btn-danger">Add Category</a>
        		<a href="{{route('all.category')}}" class="btn btn-info">All Category</a>
            <a href="{{route('write.post')}}" class="btn btn-success">Write Post</a>
        </p>
        <hr>	
        <h1>Add Category</h1>
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
        
      
        <form action="{{route('store.category')}}" method="post">
          @csrf
          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Category Name</label>
              <input type="text" class="form-control" name="name" placeholder="Category name" required  >
              
            </div>
          </div>

          <div class="control-group">
            <div class="form-group floating-label-form-group controls">
              <label>Slug Name</label>
               <input type="text" class="form-control" name="slug" placeholder="Slug name" required  >

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