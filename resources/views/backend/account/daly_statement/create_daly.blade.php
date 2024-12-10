


@extends('backend.layouts.app')
@section('content')



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6 col-md-6 col-lg-6">
            <h3>Statement Section</h3>
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
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        
                        <!-- /.card-header -->
                        
                            <div class="modal-content">
                               
                                <div class="modal-body">
                                  <form class="form-horizontal form-label-left input_mask" action="{{ route('income_statement.store') }}" method="post">
                                    @csrf

                                          <div class="x_title">
                                            <h2>Daly Income Statement</h2><hr>
                                            <div class="clearfix"></div>
                                          </div>

                                          <div class="row">
                                            <div class="col col-lg-6 col-xl-6">
                                              <div class="form-group">
                                                <label>Date <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" name="income_date" value="{{ old('income_date') }}" required>
                                              </div>
                                            </div>
                                         

                                            <div class="col col-lg-6 col-xl-6">
                                              <div class="form-group">
                                                <label>Particulars <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="income_particulars" placeholder="Particulars" value="{{ old('income_particulars') }}" required>
                                              </div>
                                            </div>
                                          </div>

                                          <div class="row">
                                            <div class="col col-lg-6 col-xl-6">
                                              <div class="form-group">
                                                <label>Reason <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="income_reason" value="{{ old('income_reason') }}" placeholder="Reason" required>
                                              </div>
                                            </div>

                                            <div class="col col-lg-6 col-xl-6">
                                              <div class="form-group">
                                                <label>Amount <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" name="income_amount" value="{{ old('income_amount') }}" placeholder="Amount" required>
                                              </div>
                                            </div>
                                          </div> <hr>

                                          <div class="col col-lg-6 col-xl-6">
                                            <div class="form-group">
                                              <label for="exampleInputFile">Project</label>
                                              <select name="project_status" class="form-control" id="project_status">
                                                  <option disabled selected>== Choose Option ==</option>
                                                  <option value="0">No</option>
                                                  <option value="1">Yes</option>
                                              </select>
                                            </div>
                                          </div>

                                           
                                          <div class="row" id="date" style="display: none">
                                            <div class="col col-lg-6 col-xl-6" >
                                              <div class="form-group">
                                                <label for="">Project Name</label>
                                               
                                                <select name="project_id" id="project-dropdown" class="form-control @error('project_id') is-invalid @enderror">
                                                  <option value="" selected disabled>== Choose Option ==</option>
                                                  @foreach ($project_list as $row)
                                                  <option value="{{ $row->id }}" class="text-info">{{ $row->project_name }} | {{ $row->project_sl }}</option>
                                                  @endforeach
                                              </select>
                                              </div>
                                              @error('project_id')
                                                  <div class="alert alert-danger">{{ $message }}</div>
                                              @enderror
                                            </div>

                                           

                                            <div class="col col-lg-6 col-xl-6">
                                              <div class="form-group">
                                                <label for="exampleInputFile">Billing System</label>
                                                <select name="billing" class="form-control" id="billing">
                                                    <option disabled selected>== Choose Option ==</option>
                                                    <option value="0">Monthly Bill</option>
                                                    <option value="1">Work Bill</option>
                                                </select>
                                              </div>
                                            </div>
                                          </div>


                                          <div class="row" id="monthlyBillingDate" style="display: none">
                                            <div class="col col-lg-6 col-xl-6">
                                              <div class="form-group">
                                                <label for="">Billing ID : <span class="text-danger">*</span></label>
                                                    <input type="text" name="billing_id" class="form-control" value="EEBD/MB/" placeholder="Billing ID" required>
                                              </div>
                                            </div>

                                            <div class="col col-lg-6 col-xl-6">
                                              <div class="form-group">
                                                <label for="">Description</label>
                                                <input type="text" name="description" class="form-control" value="Lift Maintenance & Servicing Charge For" readonly>
                                              </div>
                                            </div>
                                          </div>

                                          <div id="workBillingDate" style="display: none">
                                            <div class="row">
                                              <div class="col col-lg-6 col-xl-6">
                                                <div class="form-group">
                                                  <label for="">Billing Ref : <span class="text-danger">*</span></label>
                                                    <input type="text" name="ref" class="form-control @error('ref') is-invalid @enderror" value="EEBD/WB/">
                                                    @error('ref')
                                                        <samp class="text-danger">{{ $message }}</samp>
                                                    @enderror
                                                </div>
                                              </div>
  
                                             
                                            </div>

                                           
                                          </div>
                                    
                                        <br><hr>

                                            <div class="card-footer">
                                              <div class="ln_solid"></div>
                                              <div class="form-group">
                                                <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                  <a href="{{ route('daly_statement.store') }}" class="btn btn-primary" type="reset">Reset</a>
                                                  <button type="submit" class="btn btn-success">Submit</button>
                                                </div>
                                              </div>
                                            </div>
                                        
                                    </form>
                                </div>
                              </div>
                        <!-- /.card-body -->
                      </div>
                </div>











                <div class="col-sm-12 col-md-6 col-lg-6">
                  <div class="card">
                      
                      <!-- /.card-header -->
                      
                          <div class="modal-content">
                             
                              <div class="modal-body">
                                <form class="form-horizontal form-label-left" action="{{ route('expense_statement_store') }}" method="POST">
                                  @csrf

                                        <div class="x_title">
                                          <h2>Daly Expense Statement</h2><hr>
                                          <div class="clearfix"></div>
                                        </div>

                                        <div class="row">
                                          <div class="col col-lg-6 col-xl-6">
                                            <div class="form-group">
                                              <label>Expense Date  <span class="text-danger">*</span></label>
                                              <input type="date" class="form-control date" name="expense_date" value="{{ old('expense_date') }}" required>
                                            </div>
                                          </div>

                                          <div class="col col-lg-6 col-xl-6">
                                            <div class="form-group">
                                              <label>Particulars <span class="text-danger">*</span></label>
                                              <input type="text" class="form-control" name="expense_particulars" placeholder="Particulars" value="{{ old('expense_particulars') }}" required>
                                            </div>
                                          </div>
                                        </div>


                                        <div class="row">
                                          <div class="col col-lg-6 col-xl-6">
                                            <div class="form-group">
                                              <label>Reason<span class="text-danger">*</span></label>
                                              <input type="text" class="form-control" name="expense_reason" value="{{ old('expense_reason') }}" placeholder="Reason" required>
                                            </div>
                                          </div>

                                          <div class="col col-lg-6 col-xl-6">
                                            <div class="form-group">
                                              <label>Amount <span class="text-danger">*</span></label>
                                              <input type="text" class="form-control" name="expense_amount" value="{{ old('expense_amount') }}" placeholder="Amount" required>
                                            </div>
                                          </div>
                                        </div><hr>

                                        <div class="col col-lg-6 col-xl-6" >
                                          <div class="form-group">
                                            <label for="exampleInputFile">Employee</label>
                                            <select name="employee_status" class="form-control" id="employee_status">
                                                <option disabled selected>== Choose Option ==</option>
                                                <option value="0">No</option>
                                                <option value="1">Yes</option>
                                            </select>
                                          </div>
                                        </div>

                                        <div class="row" id="employee" style="display: none">
                                          <div class="col col-lg-6 col-xl-6">
                                            <div class="form-group">
                                              <label for="">Employee ID : <span class="text-danger">*</span></label>
                                                  <input type="text" name="employee_id" class="form-control" placeholder="Employee id">
                                            </div>
                                          </div>

                                          <div class="col col-lg-3 col-xl-3">
                                            <div class="form-group">
                                              <label for="">Reason : <span class="text-danger">*</span></label>
                                              <select name="reason" id="reason" class="form-control">
                                                <option selected disabled>Choose Reason</option>
                                                <option value="sallary">Sallary</option>
                                                <option value="convenance">Convenance</option>
                                                <option value="over_time">Over Time</option>
                                                <option value="puscles">puscles</option>
                                                <option value="bonus">Bonus</option>
                                                <option value="loan">loan</option>
                                            </select>
                                            @error('reason')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            </div>
                                          </div>

                                          <div class="form-group col-sm-3 col-lg-3 col-md-3" id="sallary" style="display: none">
                                            <div class="form-group">
                                                <label for="">Sallary Month<span class="text-danger">*</span></label>
                                                <input type="text" name="sallary_month" class="form-control" value="{{ old('sallary_month') }}">
                                               
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-3 col-lg-3 col-md-3" id="convenance" style="display: none">
                                            <div class="form-group">
                                                <label for="">Convenance Month<span class="text-danger">*</span></label>
                                                <input type="text" name="convenance_month" class="form-control" value="{{ old('convenance_month') }}">
                                               
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-3 col-lg-3 col-md-3" id="over_time" style="display: none">
                                            <div class="form-group">
                                                <label for="">Over Time Month<span class="text-danger">*</span></label>
                                                <input type="text" name="over_time_month" class="form-control" value="{{ old('over_time_month') }}">
                                               
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-3 col-lg-3 col-md-3" id="bonus" style="display: none">
                                            <div class="form-group">
                                                <label for="">Eid Bonus<span class="text-danger">*</span></label>
                                                <input type="text" name="eid_bonus" class="form-control" value="{{ old('eid_bonus') }}">
                                               
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-3 col-lg-3 col-md-3" id="puscles" style="display: none">
                                            <div class="form-group">
                                                <label for="">Project<span class="text-danger">*</span></label>
                                                <input type="text" name="puscles_project" class="form-control" value="{{ old('puscles_project') }}">
                                               
                                            </div>
                                        </div>

                                        <div class="form-group col-sm-3 col-lg-3 col-md-3" id="loan" style="display: none">
                                            <div class="form-group">
                                                <label for="">Purpose<span class="text-danger">*</span></label>
                                                <input type="text" name="loan_purpose" class="form-control" value="{{ old('loan_purpose') }}">
                                               
                                            </div>
                                        </div>
                                        </div>

                                      <br><hr>

                                          <div class="card-footer">
                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                              <div class="col-md-9 col-sm-9 col-xs-12 col-md-offset-3">
                                                <a href="{{ route('daly_statement.store') }}" class="btn btn-primary" type="reset">Reset</a>
                                                <button type="submit" class="btn btn-success">Submit</button>
                                              </div>
                                            </div>
                                          </div>
                                      
                                  </form>
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

    // General Terams Yes or No Code Start
    $(document).ready(function() {
        $('#project_status').on('change', function() {
            if (this.value === '1') { // 'Yes' selected
                $('#date').show();
            } else { // 'No' selected or default
                $('#date').hide();
            }
        });
    });// General Terams Yes or No Code End

    // Project added
    $(document).ready(function() {
        $('#billing').on('change', function() {
            if (this.value === '0') { // 'Yes' selected
                $('#monthlyBillingDate').show();
            } else { // 'No' selected or default
                $('#monthlyBillingDate').hide();
            }

            if (this.value === '1') { // 'Yes' selected
                $('#workBillingDate').show();
            } else { // 'No' selected or default
                $('#workBillingDate').hide();
            }
        });
    });// Project added


    // Employee Section
     // General Terams Yes or No Code Start
     $(document).ready(function() {
        $('#employee_status').on('change', function() {
            if (this.value === '1') { // 'Yes' selected
                $('#employee').show();
            } else { // 'No' selected or default
                $('#employee').hide();
            }
        });
    });// General Terams Yes or No Code End


    $(document).ready(function() {
        $('#reason').on('change', function() {
            if (this.value === 'sallary') { // 'Yes' selected
                $('#sallary').show();
            }else { // 'No' selected or default
                $('#sallary').hide();
            }

            if (this.value === 'convenance') { // 'Yes' selected
                $('#convenance').show();
            }else { // 'No' selected or default
                $('#convenance').hide();
            }

            if (this.value === 'over_time') { // 'Yes' selected
                $('#over_time').show();
            }else { // 'No' selected or default
                $('#over_time').hide();
            }

            if (this.value === 'bonus') { // 'Yes' selected
                $('#bonus').show();
            } else { // 'No' selected or default
                $('#bonus').hide();
            }

            if (this.value === 'puscles') { // 'Yes' selected
                $('#puscles').show();
            } else { // 'No' selected or default
                $('#puscles').hide();
            }

            if (this.value === 'loan') { // 'Yes' selected
                $('#loan').show();
            } else { // 'No' selected or default
                $('#loan').hide();
            }
        });
    });// General Terams Yes or No Code End

</script>

@endsection