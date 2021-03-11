@extends('layouts.vertical', ['title' => 'Datatables'])

@section('css')
<!-- Plugins css -->
<link href="{{asset('assets/libs/datatables/datatables.min.css')}}" rel="stylesheet" type="text/css" />

@endsection

@section('content')
<!-- Start Content-->
<div class="container-fluid">

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">

                    </ol>
                </div>
                <h4 class="page-title">Datatables</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Posts</h4>
                    <p class="text-muted font-13 mb-4">

                        <button class="btn btn-success"><a href="create" style="color:white;" data-toggle="modal" data-target="#exampleModal">Add post</a></button><br><br>
                    </p>

                    <table id="basic-datatable" class="table dt-responsive nowrap w-100">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>User Id</th>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Details</th>

                                <th>Edit</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        @foreach($posts as $post)


                        <tr>

                            <th scope="row">{{$post->id}}</th>
                            <td>{{$post->user_id}}</td>
                            <td>{{$post->name}}</td>
                            <td>{{$post->description}}</td>

                            <td><a class="btn btn-raised btn-info btn-sm" href="{{route('details',$post->id)}}" onclick="onDetail(this)" data-toggle="modal" data-target="#exampleModal2" data-id="{{$post->id}}"><i class="fa fa-eye" aria-hidden="true"></i>
                                </a></td>

                            <td><a class="btn btn-raised btn-primary btn-sm" href="{{route('edit',$post->id)}}" onclick="onEdit(this)" data-toggle="modal" data-target="#exampleModal1" data-id="{{$post->id}}"><i class="icon-pencil" aria-hidden="true"></i>
                                </a></td>

                            <td>
                                <form method="POST" id="delete-form-{{$post->id}}" action="{{route('delete',$post->id)}}" style="display:none;">
                                    @csrf
                                    {{method_field('delete')}}






                                </form>

                                <button onclick="if(confirm('Are you sure to delete this post?')){
                        event.preventDefault();
                        document.getElementById('delete-form-{{$post->id}}').submit();


  


                    }else{
                        event.preventDefault();

                    }" class="btn btn-raised btn-danger btn-sm"><i class="fa fa-trash" aria-hidden="true"></i>
                                </button>
                            </td>
                        </tr>

                        @endforeach



                        <tbody>

                        </tbody>
                    </table>

                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>
    <!-- end row-->

</div> <!-- container -->


Modal Create
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Post</h5>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

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
                            <!-- <h4 class="header-title m-t-0">Create Post</h4> -->
                            <!-- <p class="text-muted font-14 m-b-20"> -->

                            <!-- </p> -->

                            <form action="{{route('store.user')}}" method="POST" class="parsley-examples">
                                @csrf
                                <div class="form-group">
                                    <label>User-Id</label>
                                    <div>
                                        <input name="user_id" type="hidden" class="form-control" value="{{$post->user_id}}" required />
                                    </div>
                                    <label >{{$post->user_id}}</label>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <div>
                                        <input name="name" type="text" class="form-control" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <div>
                                        <input name="description" type="text" class="form-control" required />
                                    </div>
                                </div>


                                <div class="form-group mb-0">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            Add
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect m-l-5" data-dismiss="modal">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div> <!-- end card-box -->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div> <!-- container -->
            ...
        </div>

    </div>
</div>
</div>








<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Post</h5>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
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
                            <!-- <h4 class="header-title m-t-0">Edit Post</h4>
                            <p class="text-muted font-14 m-b-20"> -->


                            <!-- </p> -->

                            <form action="{{route('update',$post->id)}}" method="POST" class="parsley-examples">
                                @csrf
                                <!-- {{method_field('PUT')}} -->
                                <div class="form-group">
                                    <label>Id</label>
                                    <div>
                                        <input name="id" type="hidden" id="Id" class="form-control"  required />
                                    </div>
                                    <label id="idlabel"></label>
                                </div>
                                <div class="form-group">
                                    <label>User-Id</label>
                                    <div>
                                        <input name="user_id" type="hidden" id="editId" class="form-control" required />
                                    </div>
                                    <label id="userlabel"></label>
                                </div>
                                <div class="form-group">
                                    <label>Name</label>
                                    <div>
                                        <input name="name" type="text" id="editname" class="form-control" required />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Description</label>
                                    <div>
                                        <input name="description" type="text" id="editcontent" class="form-control" required />
                                    </div>
                                </div>


                                <div class="form-group mb-0">
                                    <div>
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">
                                            Update
                                        </button>
                                        <button type="reset" class="btn btn-secondary waves-effect m-l-5" data-dismiss="modal">
                                            Cancel
                                        </button>
                                    </div>
                                </div>
                            </form>

                        </div> <!-- end card-box -->
                    </div> <!-- end col -->
                </div>
                <!-- end row -->

            </div>
            <!-- container 

        ...
      </div>
      <!-- <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div> -->
        </div>
    </div>
</div>



<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Post Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="col-lg-12">
                        <div class="card-box">
                            <h1 style="color:blue;">Post name: </h1>
                            <h1 id="detailName"></h1><br><br>
                            <h4 style="color:blue;">Post description: </h4>
                            <h4 id="detailDescription"></h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
<script>
    function onEdit(td) {
        var k = td.parentNode.parentNode.rowIndex;
        i = k;
        selectedRow = td.parentElement.parentElement;
        document.getElementById('Id').value = selectedRow.cells[0].innerHTML;
        document.getElementById('editId').value = selectedRow.cells[1].innerHTML;
        document.getElementById('idlabel').innerHTML = selectedRow.cells[0].innerHTML;
        document.getElementById('userlabel').innerHTML = selectedRow.cells[1].innerHTML;
        document.getElementById('editname').value = selectedRow.cells[2].innerHTML;
        document.getElementById('editcontent').value = selectedRow.cells[3].innerHTML;
    }

    function onDetail(td) {
        var k = td.parentNode.parentNode.rowIndex;
        i = k;
        selectedRow = td.parentElement.parentElement;
        document.getElementById('detailName').innerHTML = selectedRow.cells[2].innerHTML;
        document.getElementById('detailDescription').innerHTML = selectedRow.cells[3].innerHTML;
        //document.getElementById('editcontent').value = selectedRow.cells[2].innerHTML;
    }
</script>
<script src="{{asset('assets/libs/datatables/datatables.min.js')}}"></script>
<script src="{{asset('assets/libs/pdfmake/pdfmake.min.js')}}"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){

});
</script>

<!-- Page js-->
<script src="{{asset('assets/js/pages/datatables.init.js')}}"></script>
@endsection