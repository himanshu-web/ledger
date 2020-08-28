@extends('layout/main')
@section('content')
<style>
  .list-group-item{
    padding: 10px;
}
  }
</style>
<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Blank Page</h1>
          <p>Start a beautiful journey here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
              <div class="list-group">
                <a class="list-group-item list-group-item-action active">
                  <h3>Employee</h3>
                </a>
                @foreach($data as $users)
                <a href="{{route('EmployeeList.show',$users['id'])}}" class="list-group-item list-group-item-action"> {{$users['name']}}</a>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
</main>

@endsection