@extends('backend.layouts.app')
@section('content')



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Website Setting Table</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><- Go To Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
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
                          <h3 class="card-title">Website Modify</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Website info Insert</h4>
                                  {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                  </button> --}}
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('website_setting.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                    
                                        <div class="card-body">

                                            <div class="form-group">
                                                <label for="">Website Name</label>
                                                <input type="text" name="website_name" class="form-control" value="{{ old('website_name') }}" placeholder="Website Name" required>
                                            </div>

                                        
                                            <div class="form-group">
                                                <label for="">Main Number <span class="text-danger">*</span></label>
                                                <input type="number" name="phone_one" class="form-control" value="{{ old('phone_one') }}" placeholder="01XXXXXXXXX" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Support Number <span class="text-danger">*</span></label>
                                                <input type="number" name="phone_two" class="form-control" value="{{ old('phone_two') }}" placeholder="01XXXXXXXXX" required>
                                            </div>

                                            <div class="form-group">
                                                <label for="">Main Email</label>
                                                <input type="email" name="main_email" class="form-control" value="{{ old('main_email') }}" placeholder="example@gmail.com">
                                            </div>


                                            <div class="form-group">
                                                <label for="">Support Email<span class="text-danger">*</span></label>
                                                <input type="email" name="support_email" class="form-control" value="{{ old('support_email') }}" placeholder="support@gmail.com">
                                            </div>



                                            <div class="form-group">
                                                <label for="">Address</label>
                                                <input type="text" name="address" class="form-control">
                                                
                                            </div>

                                           

                                            <div class="form-group">
                                                <label for="">Description</label>
                                                <textarea name="description" id="summernote" cols="30" rows="10"  class="form-control"></textarea>
                                            </div>




                                            <div class="row">

                                              <div class="col sm-6">
                                                <div class="form-group">
                                                  <label for="">Website Logo</label>
                                                  <input type="file" name="logo" id="logo" class="form-control">
                                                </div>

                                                <div class="mb-3 row">
                                                    <label for="example-text-input" class="col-form-label"> </label>
                                                    <div class="col-sm-6">
                                                        <img id="showLogo" class="rounded avatar-lg" src="{{ (!empty($website_setting->logo)) ? 
                                                            url($setting->logo):url('image/No_Image_Available.jpg') }}" alt="Card image cap" style="width: 130px;">
                                                    </div>
                                                </div>
                                              </div>

                                              <div class="col sm-6"> 
                                                <div class="form-group">
                                                    <label for="">Website Favicon</label>
                                                    <input type="file" name="favicon" id="favicon" class="form-control">
                                                </div>

                                                <div class="mb-3 row">
                                                  <label for="example-text-input" class="col-form-label"> </label>
                                                  <div class="col-sm-6">
                                                      <img id="show_favicon" class="rounded avatar-lg" src="{{ (!empty($website_setting->favicon)) ? 
                                                          url($setting->favicon):url('image/No_Image_Available.jpg') }}" alt="Card image cap" style="width: 32px; height:32px;">
                                                  </div>
                                                </div>
                                              </div>
                                            </div>


                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Insert Data</button>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                              </div>
                        </div>
                        <!-- /.card-body -->
                      </div>
                </div>
            </div>
        </div>
    </section>
  </div>


  <script type="text/javascript">
    $(document).ready(function(){
        $('#logo').change(function(e){
            var reader = new FileReader();
            reader.onload=function(e){
                $('#showLogo').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
  <script type="text/javascript">
    $(document).ready(function(){
        $('#favicon').change(function(e){
            var reader = new FileReader();
            reader.onload=function(e){
                $('#show_favicon').attr('src',e.target.result);
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
          

@endsection