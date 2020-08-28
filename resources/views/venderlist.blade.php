 @extends('layout.main')
@section('content')

<main class="app-content">
      <!-- <div class="app-title">
        <div>
           <h1><i class="fa fa-dashboard"></i></h1> 
          <p></p>
        </div> -->
       <!--  <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item"><a href="#">Blank Page</a></li>
        </ul> -->
      </div>
      @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
      <div class="row">
        <div class="col-md-12">
        <div class='card-header bg-info' ><h5><i class="fa fa-square-o" aria-hidden="true" data-toggle="collapse" data-target="#demo"></i>&nbsp Buyer Shop List:<i class="fa fa-plus-circle pull-right" aria-hidden="true" style='font-size: xx-large;' data-toggle="modal" data-target="#myModal" ></i></h5></div>
        <!-- Modal -->
        <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Add Seller</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
            <!-- Buyer form -->
            <form action="{{route('VenderListing.store')}}" method='post'>
            @csrf
                <div class="form-group">
                    <input name='type' type='hidden' value='buyer'>
                  <label class="control-label">Name Of Shop <b style='color:red' >*</b></label>
                    <input name='shopName' class="form-control" type="text" placeholder="Enter Shop Name">
                </div>
                <div class="form-group">
                  <label class="control-label">Email</label>
                    <input name='email' class="form-control" type="email" placeholder="Enter email ">
                </div>
                <div class="form-group">
                  <label class="control-label">Address <b style='color:red' >*</b></label>
                    <input name='address' class="form-control" type="text" placeholder="Enter address">
                </div>
                <div class="form-group">
                  <label class="control-label">GST</label>
                    <input name='gst' class="form-control" type="text" placeholder="Enter GST">
                </div>
                <div class="form-group">
                  <label class="control-label">Phone</label>
                    <input name='phone' class="form-control" type="text" placeholder="Enter Phone">
                </div>
                <input name="userId" type="hidden" value="{{Auth::user()->id}}">
                <div class="tile-footer">
                  <button class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="registration"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                </div>
              </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
            </div>
              <!-- Buyer Form End -->
        </div>
        </div>
                <div class='card-body collapse show' id="demo" style='overflow: auto;height: 310px;'>
                    <div class="list-group">
                    @php $i = 0;  @endphp
                        @while( $i < count($buyerName) )
                        <a href="{{ route('Ledger.show',$buyerName[$i]) }}" class="list-group-item list-group-item-action flex-column align-items-start ">
                            <div class="d-flex w-100 justify-content-between">
                            <h5  class="" style='margin-bottom: 0px !important;'>{{$buyerName[$i]}}</h5>
                            </div>
                            <small><b style='color:red'>Balance: </b>{{$buyer[$i][0]->balance}}</small>
                            
                            <!-- <p class="mb-1 pull-right"><b>Balance:2500</b></p> -->
                            @role('Admin')
                            <a data-vender-id="{{$buyerName[$i]}}" php class="text-danger btn p-0 delete buyer">Delete</a>
                            @endrole
                            @php $i++; @endphp
                        </a>
                        @endwhile
                    </div>
            </div><br>
            <div class='card-header bg-info'><h5><i class="fa fa-square-o" aria-hidden="true"  data-toggle="collapse" data-target="#demo1"></i>&nbsp Seller Shop List:<i class="fa fa-plus-circle pull-right" aria-hidden="true" style='font-size: xx-large;' data-toggle="modal" data-target="#myModal1"></i></h5></div>
            <!-- Modal -->
            <div class="modal fade" id="myModal1" role="dialog">
                <div class="modal-dialog">
                <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                        <h4 class="modal-title">Add Buyer</h4>
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                        </div>
                        <div class="modal-body">
                        <!-- Buyer Form -->
                        <form action="{{route('VenderListing.store')}}" method='post'>
                          @csrf
                            <div class="form-group">
                            <input name='type' type='hidden' value='seller'>
                            <label class="control-label">Name Of Shop <b style='color:red' >*</b></label>
                                <input name='shopName' class="form-control" type="text" placeholder="Enter Shop Name" required>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Email</label>
                            <input name='email' class="form-control" type="email" placeholder="Enter email ">
                            </div>
                            <div class="form-group">
                            <label class="control-label">Address <b style='color:red' >*</b></label>
                                 <input name='address' class="form-control" type="text" placeholder="Enter address" required>
                            </div>
                            <div class="form-group">
                            <label class="control-label">GST</label>
                                <input name='gst' class="form-control" type="text" placeholder="Enter GST">
                            </div>
                            <div class="form-group">
                            <label class="control-label">Phone</label>
                                <input name='phone' class="form-control" type="text" placeholder="Enter Phone">
                            </div>
                            <div class="tile-footer">
                                <button class="btn btn-primary"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>&nbsp;&nbsp;&nbsp;<a class="btn btn-secondary" href="registration"><i class="fa fa-fw fa-lg fa-times-circle"></i>Cancel</a>
                            </div>
                        </form> 
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                        <!-- Seller Form End -->
                    </div>
                </div>
            </div>
            </div>
                <div class='card-body collapse show' id="demo1" style='overflow: auto;height: 310px;' >
                    <div class="list-group ">
                    @php $i = 0;  @endphp
                        @while( $i < count($sellerName) )
                        <a href="{{ route('Ledger.show',$sellerName[$i]) }}" class="list-group-item list-group-item-action flex-column align-items-start ">
                            <div class="d-flex w-100 justify-content-between">
                            <h5  class="" style='margin-bottom: 0px !important;'>{{$sellerName[$i]}}</h5>
                            </div>
                            <small><b style='color:red'>Balance: </b>{{$seller[$i][0]->balance}}</small>
                            
                            <!-- <p class="mb-1 pull-right"><b>Balance:2500</b></p> -->
                            <!-- <small>Donec id elit non mi porta.</small> -->
                            @role('Admin')
                            <a data-vender-id="{{$sellerName[$i]}}" php class="text-danger btn p-0 delete buyer">Delete</a>
                            @endrole
                            @php $i++; @endphp
                        </a>
                        @endwhile
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </main>
<script>
$(document).ready(function(){
  $('.buyer').click(function(){
    if (confirm("Confirm TO Delete!")) {
      
    } else {
      return false;
    }
    var id = $(this).attr('data-vender-id');
    $.ajax({
      type:'POST',
      url:'delete_vender/'+id,
      // beforeSend:function(){
      //   $()
      // },
      data:{'_token': '{{ csrf_token() }}' },
      success: function(response)
      {
        alert(response);
      },
      error: function(response)
      {
        alert(response);
      }
    });
  });
});

</script>
@endsection