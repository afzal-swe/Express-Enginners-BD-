@extends('backend.layouts.app')
@section('content')


 <!-- page content -->
 <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Update Section</h3>
        </div>
      </div>
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_content">

              <form class="form-horizontal form-label-left" action="{{ route('banner.update',$banner_edit->id) }}" method="post" enctype="multipart/form-data">

                @csrf
                <span class="section">Banner Update Secction </span>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Banner </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="file" class="form-control col-md-7 col-xs-12" name="banner">
                  </div>
                </div>


                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Status</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="status" id="" class="form-control col-md-7 col-xs-12">
                        
                        <option value="1" @if ($banner_edit->status==1) selected @endif>Active</option>
                        <option value="0" @if ($banner_edit->status==0) selected @endif>Deactive</option>
                    </select>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea"></label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <img src="{{ asset($banner_edit->banner) }}" class="form-control col-md-7 col-xs-12" style="height: 150px; width:350px;">
                    <input type="hidden" name="oldbanner" value="{{ $banner_edit->banner }}">
                     
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