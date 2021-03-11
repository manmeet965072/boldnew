@extends('layouts.vertical', ['title' => 'Validation | Parsley'])

@section('content')
    <!-- Start Content-->


Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
  Launch demo modal
</button>

 Modal
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="container-fluid">
        
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            
                        </ol>
                    </div>
                   
                </div>
            </div>
        </div>     
        <!-- end page title --> 
           
            <div class="col-lg-12">
                <div class="card-box">
                    <h4 class="header-title m-t-0">Edit Post</h4>
                    <p class="text-muted font-14 m-b-20">
                
                    </p>

                    <form action="{{route('update',$post->id)}}" method="POST" class="parsley-examples">
                          @csrf
                        <div class="form-group">
                            <label>User-Id</label>
                            <div>
                                <input name="user_id" type="text" class="form-control" value="{{$post->user_id}}" required />
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <div>
                                <input name="name" type="text" class="form-control" value="{{$post->name}}" required/>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <div>
                                <input name="description" type="text" class="form-control" value="{{$post->description}}" required/>
                            </div>
                        </div>
                        

                        <div class="form-group mb-0">
                            <div>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">
                                    Submit
                                </button>
                                <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                    Cancel
                                </button>
                            </div>
                        </div>
                    </form>

                </div> <!-- end card-box -->
            </div> <!-- end col -->
        </div>
        <!-- end row -->
        
    </div> <!-- container 
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

   -->





   <!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
    </div>
  </div>
</div>
@endsection

@section('script')
    <!-- Plugins js-->
    <script src="{{asset('assets/libs/parsleyjs/parsleyjs.min.js')}}"></script>

    <!-- Page js-->
    <script src="{{asset('assets/js/pages/form-validation.init.js')}}"></script>
@endsection