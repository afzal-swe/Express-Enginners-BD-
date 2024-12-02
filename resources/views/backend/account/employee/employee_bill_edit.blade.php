

@extends('backend.layouts.app')
@section('content')



{{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script> --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Employee Bill Edit</h3>
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
                          <h3 class="card-title"> Update Employee Bill</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="modal-content">
                               
                                <div class="modal-body">
                                    
                                    <form action="{{ route('employee_bill.update',$edit->id) }}" method="post">
                                        @csrf
                    
                                        <div class="card-body">



                                            <div class="row">

                                                
                                                
                                                <div class="form-group col-sm-4 col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Date</label>
                                                        <input type="text" name="date" id="date" class="form-control" value="{{ $edit->date ?? '' }}" > 
                                                    </div>
                                                </div>

                                                <div class="form-group col-sm-4 col-lg-4 col-md-4">
                                                    <div class="form-group">
                                                        <label for="">Employee ID</label>
                                                        <input type="text" name="e_id" class="form-control" value="{{ $edit->e_id ?? ''}}" readonly>
                                                    </div>
                                                </div>

                                                <div class="form-group col-sm-2 col-lg-2 col-md-2">
                                                    <div class="form-group">
                                                        <label for="">Reason</label>
                                                        <select name="reason" id="reason" class="form-control">
                                                            
                                                            <option value="sallary" @if ($edit->reason == 'sallary') selected @endif>Sallary</option>
                                                            <option value="convenance" @if ($edit->reason == 'convenance') selected @endif>Convenance</option>
                                                            <option value="over_time" @if ($edit->reason == 'over_time') selected @endif>Over Time</option>
                                                            <option value="puscles" @if ($edit->reason == 'puscles') selected @endif>puscles</option>
                                                            <option value="bonus" @if ($edit->reason == 'bonus') selected @endif>Bonus</option>
                                                            <option value="loan" @if ($edit->reason == 'loan') selected @endif>loan</option>
                                                        </select>
                                                        @error('reason')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </div>
                                                </div>

                                                <div class="form-group col-sm-2 col-lg-2 col-md-2" id="sallary" style="display: none">
                                                    <div class="form-group">
                                                        <label for="">Sallary Month<span class="text-danger">*</span></label>
                                                        <input type="text" name="sallary_month" class="form-control" value="{{ $edit->sallary_month ?? ''}}">
                                                       
                                                    </div>
                                                </div>

                                                <div class="form-group col-sm-2 col-lg-2 col-md-2" id="convenance" style="display: none">
                                                    <div class="form-group">
                                                        <label for="">Convenance Month<span class="text-danger">*</span></label>
                                                        <input type="text" name="convenance_month" class="form-control" value="{{ $edit->convenance_month ?? ''}}">
                                                       
                                                    </div>
                                                </div>

                                                <div class="form-group col-sm-2 col-lg-2 col-md-2" id="over_time" style="display: none">
                                                    <div class="form-group">
                                                        <label for="">Over Time Month<span class="text-danger">*</span></label>
                                                        <input type="text" name="over_time_month" class="form-control" value="{{ $edit->over_time_month ?? ''}}">
                                                       
                                                    </div>
                                                </div>

                                                <div class="form-group col-sm-2 col-lg-2 col-md-2" id="bonus" style="display: none">
                                                    <div class="form-group">
                                                        <label for="">Eid Bonus</label>
                                                        <input type="text" name="eid_bonus" class="form-control" value="{{ $edit->eid_bonus ?? ''}}">
                                                       
                                                    </div>
                                                </div>

                                                <div class="form-group col-sm-2 col-lg-2 col-md-2" id="puscles" style="display: none">
                                                    <div class="form-group">
                                                        <label for="">Project</label>
                                                        <input type="text" name="puscles_project" class="form-control" value="{{ $edit->puscles_project ?? ''}}">
                                                       
                                                    </div>
                                                </div>

                                                <div class="form-group col-sm-2 col-lg-2 col-md-2" id="loan" style="display: none">
                                                    <div class="form-group">
                                                        <label for="">Purpose</label>
                                                        <input type="text" name="loan_purpose" class="form-control" value="{{ $edit->loan_purpose ?? ''}}">
                                                       
                                                    </div>
                                                </div>
                                                
                                                
                                            </div>



                    
                                            <div class="row">
                                                <div class="form-group col-sm-6 col-lg-6 col-md-6">
                                                    <div class="form-group">
                                                        <label for="">Discription</label>
                                                        <input type="text" name="discription" class="form-control" value="{{ $edit->discription ?? ''}}">
                                                    </div>
                                                </div>
                                          
                                              
                                            

                                            <div class="form-group col-sm-6 col-lg-6 col-md-6">
                                                <label for="">Amount</label>
                                                <input type="text" name="deposit" class="form-control" value="{{ $edit->deposit ?? ''}}">
                                            </div>
                                        </div>



                                        <br><hr>

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Update</button>
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

  <script type="text/javascript">

    // General Terams Yes or No Code Start
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
    

    