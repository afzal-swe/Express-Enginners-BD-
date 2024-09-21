












@extends('backend.layouts.app')
@section('content')



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Work Bill</h3>
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
                          <h3 class="card-title"> Add Work Bill</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="modal-content">
                               
                                <div class="modal-body">
                                    <form action="{{ route('work_bill.store') }}" method="post">
                                        @csrf
                    
                                        <div class="card-body">
                    
                                            <div class="row">
                                                <div class="form-group col-sm-6 col-lg-6 col-md-6">
                                                    <label for="">Project Ref : <span class="text-danger">*</span></label>
                                                    <input type="text" name="ref" class="form-control" value="EEBD/SNT/WB/{{ mt_rand(0, 100) }}" placeholder="EEBD/SNT/WB/1008" required>
                                                </div>
    
                                                <div class="form-group col-sm-6 col-lg-6 col-md-6">
                                                    <label for="exampleInputFile">Project Name / SL Number <span class="text-danger">*</span></label>
                                                    <select name="project_id" class="form-control" required>
                                                        <option disabled selected><= Choose Project Name =></option>
                                                        @foreach ($project_list as $row)
                                                            
                                                        <option value="{{ $row->id }}" class="text-info">{{ $row->project_name }} | {{ $row->project_sl }}</option>
                                                        @endforeach
                                                       
                                                    </select>
                                                    
                                                </div>
                                            </div>


                                            <div class="row">

                                                <div class="form-group col-sm-6 col-lg-6 col-md-6">
                                                    <label for="">Equipment Name <span class="text-danger">*</span></label>
                                                    <input type="text" name="equipment_list" class="form-control" placeholder="Equipment Name" value="{{ old('equipment_list') }}" required> 
                                                </div>

                                                <div class="form-group col-sm-6 col-lg-6 col-md-6">
                                                    <label for="">Quantity <span class="text-danger">*</span></label>
                                                    <input type="text" name="quantity" class="form-control" placeholder="Quantity" value="{{ old('quantity') }}" required>
                                                </div>

                                            </div>


                                            <div class="row">

                                                <div class="form-group col-sm-6 col-lg-6 col-md-6">
                                                    <label for="">Unit Price <span class="text-danger">*</span></label>
                                                    <input type="text" name="unit_price" class="form-control" placeholder="Unit Price" value="{{ old('unit_price') }}" required>
                                                </div>

                                                <div class="form-group col-sm-6 col-lg-6 col-md-6">
                                                    <label for="">Total Price <span class="text-danger">*</span></label>
                                                    <input type="text" name="total_price" class="form-control" placeholder="Total Price" value="{{ old('total_price') }}" required>
                                                </div>

                                            </div>


                                            <div class="row">

                                                <div class="form-group col-sm-6 col-lg-6 col-md-6">
                                                    <label for="">Supply Date </label>
                                                    <input type="date" name="supply_date" class="form-control" placeholder="Supply Date" >
                                                </div>

                                                <div class="form-group col-sm-6 col-lg-6 col-md-6">
                                                    <label for="">Worranty Expire Date</label>
                                                    <input type="date" name="expire_date" class="form-control" placeholder="Worranty Expire Date">
                                                </div>

                                            </div>


                                            <div class="row">

                                                <div class="form-group col-sm-6 col-lg-6 col-md-6">
                                                    <label for="">Supply Date </label>
                                                    <input type="date" name="supply_date" class="form-control" placeholder="Supply Date" >
                                                </div>

                                                <div class="form-group col-sm-6 col-lg-6 col-md-6">
                                                    <label for="">Worranty Expire Date</label>
                                                    <input type="date" name="expire_date" class="form-control" placeholder="Worranty Expire Date">
                                                </div>
                                                
                                            </div>

                                            <div class="form-group col-sm-6 col-lg-6 col-md-6">
                                                <label for="exampleInputFile">General Terms & Conditions : <span class="text-danger">*</span></label>
                                                <select name="general_terms" class="form-control" required>
                                                    <option value="1">Excluded Local VAT & TAX.</option>
                                                    <option value="2">Supply Date : </option>
                                                    <option value="3">Warranty Expire Date : </option>
                                                </select>
                                            </div>


                                       <br><hr>

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Ok</button>
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

@endsection
    
