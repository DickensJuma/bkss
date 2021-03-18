@extends('layouts.admin.design')
@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Your Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item"><a href="#">Property</a></li>
            <li class="breadcrumb-item active">Profile</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <section class="content">
      <div class="container-fluid">
          <div class="row">
              <div class="col-12">
                  <p>This info can be shown to potential guests on our website and is an opportunity to help your property stand out.</p>
                  <form action="">
                    <div class="form-group">
                        <p>Pick "Host profile" if you personally manage your property or "Company profile" if you're a business.</p>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="host" value="host" class="form-check">
                            <label class="label-check" for="host">Host Profile</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input type="radio" name="company" value="company" class="form-check">
                            <label class="label-check" for="company">Company Profile</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="">Host name</label>
                        <input type="text" name="host_name">
                    </div>
                    <div class="form-group">
                        <label for="">About the Property</label><br>
                        <small>What makes your place unique and how can you help guests feel more welcome? Think about decor, amenities and special features. Don't add House Rules here, this goes under the Policies section.
                        </small>
                        <textarea name="about" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">About Host</label><br>
                        <small>Help guests feel at ease and excited about their trip with a short welcome message. What do you (or your team) enjoy about hosting? Share personal interests or hobbies.</small>
                        <textarea name="about_host" id="about_host" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">About the neighborhood</label><br>
                        <small>What's good to know about the local area and attractions? You can include points of interest like museums and famous landmarks in the "What's nearby" settings.</small>
                        <textarea name="neighborhood" id="neighborhood" cols="30" rows="5" class="form-control"></textarea>
                    </div>
                    <div class="divider">
                        <h3>About Your Property</h3>
                        <p>Additional info about your property (optional)</p>
                    </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="renting_year" class="is-block">When did the property open?</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <select class="form-control inline" name="renting_month">
                                                <!-- Value 0 for "Select month" -->
                                                <?php echo $month_drop_down ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control inline yearpicker" id="renting_year" name="renting_year" value="2015" placeholder="e.g. 1983">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="">When was the property last renovated (if applicable)?</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <select class="form-control inline" name="renting_month">
                                                <!-- Value 0 for "Select month" -->
                                                <?php echo $month_drop_down1 ?>
                                            </select>
                                        </div>
                                        <div class="col-md-6">
                                            <input type="text" class="form-control inline yearpicker" id="rennovation_year" name="renting_year" value="2015" >
                                        <script>$('.yearpicker').yearpicker();</script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="submit" class="form-control btn btn-primary" value="Save">
                  </form>

              </div>
          </div>
      </div>
  </section>
    </div>
    <!--script>
        $.noConflict();
jQuery(document).ready(function ($) {
        $('.yearpicker').yearpicker({
  // Initial Year
  year:null,
  // Start Year
  startYear:null,
  // End Year
  endYear:null,
  // Element tag
  itemTag:'li',
  // Default CSS classes
  selectedClass:'selected',
  disabledClass:'disabled',
  hideClass:'hide',
  // Custom template
  template: `<div class="yearpicker-container">
              <div class="yearpicker-header">
                  <div class="yearpicker-prev" data-view="yearpicker-prev">&lsaquo;</div>
                  <div class="yearpicker-current" data-view="yearpicker-current">SelectedYear</div>
                  <div class="yearpicker-next" data-view="yearpicker-next">&rsaquo;</div>
              </div>
              <div class="yearpicker-body">
                  <ul class="yearpicker-year" data-view="years">
                  </ul>
              </div>
          </div>`,
//});
//});

    </script-->
@endsection