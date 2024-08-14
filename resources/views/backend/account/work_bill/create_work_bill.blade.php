@extends('backend.layouts.app')
@section('content')


 <!-- page content -->
 <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h4>Work Bill</h4>
        </div>
      </div>
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_content">

                <form action="{{ route('work_bill.store') }}" method="post">
                    @csrf
    
                    <div class="card-body">
    
                        <div class="row">
                            <div class="col col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="">Project Ref : <span class="text-danger">*</span></label>
                                    <input type="text" name="ref" class="form-control" value="EEBD/SNT/WB/" placeholder="EEBD/SNT/WB/1008" required>
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
                                    <label for="">Equipment Name <span class="text-danger">*</span></label>
                                    <input type="text" name="equipment_list" class="form-control" placeholder="Equipment Name" value="{{ old('equipment_list') }}" required> 
                                </div>
                            </div>

                            <div class="col col-lg-2 col-xl-2">
                                <div class="form-group">
                                    <label for="">Quantity <span class="text-danger">*</span></label>
                                    <input type="text" name="quantity" class="form-control" placeholder="Quantity" value="{{ old('quantity') }}" required>
                                </div>
                            </div> 

                            <div class="col col-lg-2 col-xl-2">
                                <div class="form-group">
                                    <label for="">Unit Price <span class="text-danger">*</span></label>
                                    <input type="text" name="unit_price" class="form-control" placeholder="Unit Price" value="{{ old('unit_price') }}" required>
                                </div>
                            </div>
                            <div class="col col-lg-2 col-xl-2">
                                <div class="form-group">
                                    <label for="">Total Price <span class="text-danger">*</span></label>
                                    <input type="text" name="total_price" class="form-control" placeholder="Total Price" value="{{ old('total_price') }}" required>
                                </div>
                            </div>
                        </div>
    
    
                        

                        <div class="row">
                            <div class="col col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="">Supply Date </label>
                                    <input type="text" name="supply_date" class="form-control" placeholder="Supply Date" >
                                </div>
                            </div>
                            <div class="col col-lg-6 col-xl-6">
                                <div class="form-group">
                                    <label for="">Worranty Expire Date</label>
                                    <input type="text" name="expire_date" class="form-control" placeholder="Worranty Expire Date">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">General Terms & Conditions : <span class="text-danger">*</span></label>
                            <select name="general_terms" class="form-control" required>
                                <option value="1">Excluded Local VAT & TAX.</option>
                                <option value="2">Supply Date : </option>
                                <option value="3">Warranty Expire Date : </option>
                            </select>
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