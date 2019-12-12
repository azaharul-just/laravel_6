@extends('welcome')
@section('content')
  <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        @foreach($post as $row)
        <div class="post-preview">
          <h2>
            <a href="{{URL::to('view/post/'.$row->id)}}"> 
              {{$row->title}} 
          </a>
          </h2>
          <p>
          <a href=""> <img src="{{URL::to($row->image)}}" style="width: 100%;height: 400px"> </a><br><br>
          <b>More Details: </b>
            <a href="#"> {{$row->name}}</a>
             on slug <a href="">{{$row->slug}}</a>
            </p>
        </div>
        <hr>
        @endforeach
         
        <!-- Pager -->
        <div class="clearfix">
          {{$post->links()}}
        </div>
      </div>
    </div>
      
@endsection