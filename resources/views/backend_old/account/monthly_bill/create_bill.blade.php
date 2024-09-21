@extends('backend.layouts.app')
@section('content')


 <!-- page content -->
 <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h4>Monthly Bill</h4>
        </div>
      </div>
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_content">

                <form action="{{ route('monthly_bill.store') }}" method="post">
                    @csrf
    
                    <div class="card-body">
    
                        <div class="row">
                            <div class="col col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="">Billing ID : <span class="text-danger">*</span></label>
                                    <input type="text" name="billing_id" class="form-control" value="EEBD/MB/" placeholder="Billing ID" required>
                                </div>
                            </div>
                            <div class="col col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="exampleInputFile">Project Name / SL Number <span class="text-danger">*</span></label>
                                    <select name="project_id" class="form-control" required>
                                        <option disabled selected><= Choose Project Name =></option>
                                        @foreach ($project_list as $row)
                                            
                                        <option value="{{ $row->id }}" class="text-info">{{ $row->project_name }} | {{ $row->project_sl }}</option>
                                        @endforeach
                                       
                                    </select>
                                </div>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="">Lift Quanitiy</label>
                                    <input type="text" name="lift_quanitiy" class="form-control" placeholder="Lift Quanitiy" >
                                </div>
                            </div>

                            <div class="col col-lg-2 col-xl-2">
                                <div class="form-group">
                                    <label for="">Date<span class="text-danger">*</span></label>
                                    <input type="text" name="date" class="form-control" placeholder="DD/MM/YYYY" value="{{ old('date') }}" required> 
                                </div>
                            </div> 

                            <div class="col col-lg-2 col-xl-2">
                                <div class="form-group">
                                    <label for="">Month Name <span class="text-danger">*</span></label>
                                    <input type="text" name="month_name" class="form-control" placeholder="Month Name" value="{{ old('month_name') }}" required>
                                </div>
                            </div>
                            <div class="col col-lg-2 col-xl-2">
                                <div class="form-group">
                                    <label for="">No Of Month <span class="text-danger">*</span></label>
                                    <input type="text" name="no_month" class="form-control" placeholder="No Of Month" value="{{ old('no_month') }}" required>
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