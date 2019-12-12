 @extends('welcome')
 @section('content')
 <!-- Main Content -->
  <div class="container">
    <div class="row">
      <div class="mx-auto">
        <p> 
        		<a href="{{route('add.category')}}" class="btn btn-danger">Add Category</a>
        		<a href="{{route('all.category')}}" class="btn btn-info">All Category</a>
        </p>
        <hr>	
        <h1>Category Details</h1>
        <hr>
        <div>
          <ol>
            <li>Category Id: {{$cat->id}}</li>
            <li>Category Name: {{$cat->name}}</li>
            <li>Category Slug: {{$cat->slug}}</li>
            <li>Category Created: {{$cat->created_at}}</li>

          </ol>
        </div>
        
       
      </div>
    </div>
  </div>
 
 @endsection