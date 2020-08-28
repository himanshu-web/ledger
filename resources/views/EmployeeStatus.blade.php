@extends('layout/main')
@section('content')

@if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
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
            <div class="row">
                <div class="col-md-12">      
                <table style="width:100%"  id='sampleTable' class="table table-striped">
                          <thead>
                            <tr>
                                <th>S.no</th>
                                <th>Name</th>
                                <th>Status</th>
                                
                            </tr>
                          </thead>
                          <tbody>
                          @foreach($status as $st)
                            <tr> 
                                <td>1.</td>
                                <td>{{$st->name}}</td>
                                <td>
                              <form method="POST" action="{{route('EmployeeStatus.update',$st->id)}}">
                              @csrf
                              @method('PUT')
                                @if($st->status == 1)
                                 <button class="btn btn-danger">Deactive</button>
                                @endif
                                @if($st->status == 0)
                                 <button class="btn btn-success">Active</button>
                                @endif
                              </form>
                                </td>
                                
                            </tr>
                            @endforeach                  
                              </tfoot>
                            <tbody>
                        </table>
                </div>
            </div>
            </div>
          </div>
        </div>
      </div>
</main>

@endsection