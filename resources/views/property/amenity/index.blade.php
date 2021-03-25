@extends('layouts.super.design')
@section('content')
 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sub Categories</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sub Categories</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Sub Categories</h3>&nbsp;<button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#category-modal"><i class="far fa-plus-square"></i></button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                  <th>#</th>
                  <th>Category</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Date Created</th>
                  <th>Creator </th>
                  <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                 <?php echo $columns ?>
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Category</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Date Created</th>
                    <th>Creator </th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
              <!--Add modal-->
              <div class="modal fade" id="category-modal">
                <div class="modal-dialog">
                    <form action="{{ route('sub_category') }}" method="POST">
                        @csrf
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">New Sub Category</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="category" class="form-label">Category</label>
                        <select name="category" id="category" class="form-control">
                          <?php echo $categories_dropdown ?>
                        </select>
                      </div>
                      <br>
                        <div class="form-group">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control">
                            <p class="error text-center alert alert-danger hidden" hidden></p>
                        </div>
                        <div class="form-group">
                            <label for="descr" class="form-label">Description</label>
                            <textarea name="description" id="description" cols="30" rows="5" class="form-control"></textarea>
                            <p class="error text-center alert alert-danger hidden" hidden></p>
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                      <button type="submit" id="save_cat_btn" class="btn btn-primary">Save changes</button>
                    </div>
                  </div>
                  <!-- /.modal-content -->
                </form>
                </div>
                <!-- /.modal-dialog -->
              </div>
              <!-- /.modal -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper >
  <script>
      $("#save_cat_btn").click(function(){
      $.ajax({
        type : 'POST',
        url : 'category',
        data : {
          '_token' : $('input[name=_token]').val(),
          'name' : $('input[name=name]').val(),
          'description':$('input[name=description]').val(),
          },
          success : function(data){
            if((data.errors)){
              $('.error').show();
              $('.error').prop('hidden',false);
              $('.error').text(data.errors.name);
              $('.error').text(data.errors.description);
            }else{
              $('.error').remove();
              $('#example1').append(" <tr>"+
                      "<td>" + data.id + "</td>"+
                      "<td>" + data.name + "</td>"+
                      "<td>" + data.description + "</td>"+
                      "<td>" + data.created_at + "</td>"+
                      "<td>" + data.updated_at + "</td>"+
                      "<td><a href='' class='btn btn-sm btn-primary'><i class='fa fa-eye' aria-hidden='true'></i></a></td>"+
                      "</tr>")
            }
          },
      });
    });
  </script-->

@endsection