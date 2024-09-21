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

              <form class="form-horizontal form-label-left" action="{{ route('notice.update',$notice->id) }}" method="post" >

                @csrf
                <span class="section">Notice Update Secction </span>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Notice Title </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" class="form-control col-md-7 col-xs-12" name="notice"  value="{{ $notice->notice }}">
                  </div>
                </div>


                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Status</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="status" id="" class="form-control col-md-7 col-xs-12">
                        
                        <option value="1" @if ($notice->status==1) selected @endif>Active</option>
                        <option value="0" @if ($notice->status==0) selected @endif>Deactive</option>
                    </select>
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