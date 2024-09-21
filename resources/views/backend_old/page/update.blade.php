@extends('backend.layouts.app')
@section('content')


 <!-- page content -->
 <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3> Page Information Update</h3>
        </div>
      </div>
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_content">

              <form class="form-horizontal form-label-left" action="{{ route('page.update',$page_edit->slug) }}" method="post" enctype="multipart/form-data">
                @csrf
                      <div class="row">
      
                        <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                          <input type="text"  class="form-control" name="page_name" value="{{ $page_edit->page_name }}">
                        </div>

                        <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                          <input type="text" class="form-control" name="page_title" value="{{ $page_edit->page_title }}"> 
                        </div>

                        <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                          <input type="file" class="form-control" name="banner">
                        </div>

                        <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                            <img src="{{ asset($page_edit->banner) }}" alt="" style="height: 50px; width:150px;">
                          <input type="hidden" class="form-control" name="oldbanner" value="{{ $page_edit->banner }}">
                        </div>
      
                        <div class="col-md-6 col-sm-12 col-xs-12 form-group">
                            <select name="status" id="" class="form-control col-md-7 col-xs-12">
                                
                                <option value="1" @if ($page_edit->status==1) selected @endif>Active</option>
                                <option value="0" @if ($page_edit->status==0) selected @endif>Deactive</option>
                            </select>
                        </div>

                        <div class="col-md-12 col-sm-12 col-xs-12 form-group">
                              <textarea id="textarea" name="description" class="form-control col-md-12 col-xs-12" style="height: 150px;" >
                                {!! $page_edit->description !!}
                              </textarea>
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