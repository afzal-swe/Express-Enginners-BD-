@extends('backend.layouts.app')
@section('content')


 <!-- page content -->
 <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h4> Update Project Info : <span class="text-success">{{ $project_edit->project_name }} - ({{ $project_edit->project_sl }})</span></h4>
        </div>
      </div>
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_content">

                <form action="{{ route('project.update',$project_edit->id) }}" method="post">
                    @csrf
    
                    <div class="card-body">
    
                        <div class="row">
                            <div class="col col-lg-8 col-xl-8">
                                <div class="form-group">
                                    <label for="">Project Name</label>
                                    <input type="text" name="project_name" class="form-control" value="{{ $project_edit->project_name ?? "" }}">
                                </div>
                            </div>
                            <div class="col col-lg-4 col-xl-4">
                                <div class="form-group">
                                    <label for="">Project SL/Number (4)</label>
                                    <input type="text" name="project_sl" class="form-control" value="{{ $project_edit->project_sl ?? "" }}" readonly>
                                </div>
                            </div> 
                        </div>
    
                        <div class="row">
                            <div class="col col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="">Phone</label>
                                    <input type="text" name="phone" class="form-control" value="{{ $project_edit->phone ?? "" }}"> 
                                </div>
                            </div>
                            <div class="col col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="">Address</label>
                                    <input type="text" name="address" class="form-control" value="{{ $project_edit->address ?? "" }}">
                                </div>
                            </div> 
                        </div>
    
    
                        <div class="row">
                            <div class="col col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="">Monthly Bill (৳)</label>
                                    <input type="text" name="monthly_bill" class="form-control" value="{{ $project_edit->monthly_bill ?? "" }} ">
                                </div>
                            </div>
                            <div class="col col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="exampleInputFile">Publication</label>
                                    <select name="status" id="" class="form-control">
                                        <option value="1" @if ($project_edit->status=="1") selected @endif>Active</option>
                                        <option value="0" @if ($project_edit->status=="0") selected @endif>Deactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                       <hr>
                           
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
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