@extends('layouts.super.design')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Amenities</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Amenities</li>
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
                <h3 class="card-title">Amenities</h3>&nbsp;<button type="button" class="btn btn-success btn-md" data-toggle="modal" data-target="#category-modal"><i class="far fa-plus-square"></i></button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="table" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Sub Category</th>
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
                      <th>Sub Category</th>
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
                    <form action="{{ route('property.amenity') }}" method="POST">
                        @csrf
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title">New Amenity</h4>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <div class="form-group">
                        <label for="category" class="form-label">Category</label>
                        <select id="category" class="form-control">
                          <?php echo $categories_dropdown ?>
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="category" class="form-label">Sub Category</label>
                        <select name="sub_category" id="sub_category" class="form-control">
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
  <!-- /.content-wrapper -->
  <script>
    $('#category').on('change',function(){
      var checkValue = $(this).children('option:selected').val();
      $.ajax({
                url: "{{ route('sub_category_by_category') }}?cat_id=" + $(this).val(),
                method: 'GET',
                success: function(data) {
                    $('#sub_category').html(data.subcategories_dropdown);
                }
            });
    });
  </script>
@endsection