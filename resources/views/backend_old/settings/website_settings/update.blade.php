@extends('backend.layouts.app')
@section('content')


 <!-- page content -->
 <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3> Website Settings Update</h3>
        </div>
      </div>
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_content">

              <form class="form-horizontal form-label-left" action="{{ route('website_setting.update',$website_setting->id) }}" method="post" enctype="multipart/form-data">

                @csrf
               

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Website Title </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="website_name"   value="{{ $website_setting->website_name }}">
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Main Number</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" name="phone_one" class="form-control col-md-7 col-xs-12" value="{{ $website_setting->phone_one }}">
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Support Number</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" name="phone_two" class="form-control col-md-7 col-xs-12" value="{{ $website_setting->phone_two }}">
                  </div>
                </div>

                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Main E-mail</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="email" name="main_email" class="form-control col-md-7 col-xs-12" value="{{ $website_setting->main_email }}">
                    </div>
                </div>

                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Support E-mail </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="email" name="support_email" class="form-control col-md-7 col-xs-12" value="{{ $website_setting->support_email }}">
                    </div>
                </div>
            
               
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Address</label>
                  <div class="col-md-6 col-sm-6 col-xs-12" >
                    <textarea id="textarea" name="address" class="form-control col-md-7 col-xs-12" >
                      {!!  $website_setting->address !!}
                    </textarea>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Description </label>
                  <div class="col-md-6 col-sm-6 col-xs-12" >
                    <textarea id="textarea" name="description" class="form-control col-md-7 col-xs-12" >
                        {!!  $website_setting->description !!}
                    </textarea>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Logo </label>
                  <div class="col-md-6 col-sm-6 col-xs-12" >
                    <input type="file"  name="logo" class="form-control col-md-7 col-xs-12" >
                  </div>
                </div>
                
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea"></label>
                  <div class="col-md-6 col-sm-6 col-xs-12" >
                    <img src="{{ asset($website_setting->logo) }}" alt="" style="height: 80px; width:190px;">
                        <input type="hidden" name="oldlogo" value="{{ $website_setting->logo }}">
                    
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Favicon </label>
                  <div class="col-md-6 col-sm-6 col-xs-12" >
                    <input type="file"  name="favicon" class="form-control col-md-7 col-xs-12" >
                  </div>
                </div>

                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea"></label>
                    <div class="col-md-6 col-sm-6 col-xs-12" >
                      <img src="{{ asset($website_setting->favicon) }}" alt="" style="height: 30px; width:30px;">
                          <input type="hidden" name="oldfavicon" value="{{ $website_setting->favicon }}">
                      
                    </div>
                  </div>

               
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                    <button id="send" type="submit" class="btn btn-success">Update</button>
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