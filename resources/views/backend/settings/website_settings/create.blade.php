@extends('backend.layouts.app')
@section('content')


 <!-- page content -->
 <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3> Website Settings Section</h3>
        </div>
      </div>
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_content">

              <form class="form-horizontal form-label-left" action="{{ route('website_setting.store') }}" method="post" enctype="multipart/form-data">

                @csrf
               

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Website Title <span>*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="name" class="form-control col-md-7 col-xs-12" name="website_name" placeholder="Website Title" required value="{{ old('website_name') }}">
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Main Number <span>*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" name="phone_one" required="required" class="form-control col-md-7 col-xs-12" placeholder="01XXXXXXXXX" value="{{ old('phone_one')}}">
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Support Number <span>*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" name="phone_two" required class="form-control col-md-7 col-xs-12" placeholder="01XXXXXXXXX" value="{{ old('phone_two')}}">
                  </div>
                </div>

                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Main E-mail <span>*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="email" name="main_email" required="required" class="form-control col-md-7 col-xs-12" placeholder="example@gmail.com" value="{{ old('main_email')}}">
                    </div>
                </div>

                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Support E-mail <span>*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="email" name="support_email" class="form-control col-md-7 col-xs-12" placeholder="example@gmail.com" value="{{ old('support_email')}}">
                    </div>
                </div>
            
               
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Address</label>
                  <div class="col-md-6 col-sm-6 col-xs-12" >
                    <textarea id="textarea" name="address" class="form-control col-md-7 col-xs-12"  value="{{ old('address') }}">
                      
                    </textarea>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Description </label>
                  <div class="col-md-6 col-sm-6 col-xs-12" >
                    <textarea id="textarea" name="description" class="form-control col-md-7 col-xs-12"  value="{{ old('description') }}">
                      
                    </textarea>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Logo </label>
                  <div class="col-md-6 col-sm-6 col-xs-12" >
                    <input type="file"  name="logo" class="form-control col-md-7 col-xs-12" required >
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Favicon </label>
                  <div class="col-md-6 col-sm-6 col-xs-12" >
                    <input type="file"  name="favicon" class="form-control col-md-7 col-xs-12" required >
                  </div>
                </div>

               
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                    <button id="send" type="submit" class="btn btn-success">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->

@endsection