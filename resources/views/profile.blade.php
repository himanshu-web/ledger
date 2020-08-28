@extends('layout.main')
@section('content')

<main class="app-content">
      <div class="app-title">
        <div>
          <h1><i class="fa fa-dashboard"></i> Blank Page</h1>
          <p>Start a beautiful journey here</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="{{route('VenderListing.index')}}">Back</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <div class="tile-body">
            <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Vertical Form</h3>
            <div class="tile-body">
              <form action="{{route('Profile.update',$shopName)}}" method='post'>
                @method('PUT')
                @csrf
                  <div class="form-group">
                  <label class="control-label">Name Of Shop <b style='color:red' >*</b></label>
                      <input name='shopName' value='{{$data[0]->shopName}}' class="form-control" type="text" placeholder="Enter Shop Name" required>
                  </div>
                  <div class="form-group">
                    <label for="sel1">Select list:</label>
                    <select name='type' class="form-control" id="sel1" required>
                      <option value='{{$data[0]->type}}'>{{$data[0]->type}}</option>
                      <option value='seller'>Seller</option>
                      <option value='buyer'>Buyer</option>
                    </select>
                  </div>
                  <div class="form-group">
                      <label class="control-label">Email</label>
                  <input name='email' value='{{$data[0]->email}}' class="form-control" type="email" placeholder="Enter email ">
                  </div>
                  <div class="form-group">
                  <label class="control-label">Address <b style='color:red' >*</b></label>
                        <input name='address' value='{{$data[0]->address}}' class="form-control" type="text" placeholder="Enter address" required>
                  </div>
                  <div class="form-group">
                  <label class="control-label">GST</label>
                      <input name='gst' value='{{$data[0]->gst}}' class="form-control" type="text" placeholder="Enter GST">
                  </div>
                  <div class="form-group">
                  <label class="control-label">Phone</label>
                      <input name='phone' value='{{$data[0]->phone}}' class="form-control" type="text" placeholder="Enter Phone">
                  </div>
                  <div class="tile-footer">
                      <button class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="registration"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                  </div>
              </form> 
            </div>
            </div>
          </div>
        </div>
      </div>
    </main>

@endsection