












@extends('backend.layouts.app')
@section('content')



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3> Work Bill</h3>
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
                          <h3 class="card-title"> Submit Work Bill</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="modal-content">
                               
                                <div class="modal-body">
                                    {{-- <form action="{{ route('work_bill.store') }}" method="post"> --}}
                                    <form action="#" method="post">
                                        @csrf
                    
                                        <div class="card-body">
                    
                                            <div class="row">

                                                <div class="form-group col-sm-4 col-lg-4 col-md-4">
                                                    <label for="">Billing Date <span class="text-danger">*</span></label>
                                                    <input type="date" name="billing_date" class="form-control" placeholder="Billing Date" required>
                                                </div>

                                                <div class="form-group col-sm-4 col-lg-4 col-md-4">
                                                    <label for="">Project Ref : <span class="text-danger">*</span></label>
                                                    <input type="text" name="ref" class="form-control" value="EEBD/WB/{{ mt_rand(0, 100) }}" placeholder="EEBD/SNT/WB/1008" required>
                                                </div>
    
                                                <div class="form-group col-sm-4 col-lg-4 col-md-4">
                                                    <label for="exampleInputFile">Project Name / SL Number <span class="text-danger">*</span></label>
                                                    <select name="project_id" class="form-control" required>
                                                        <option disabled selected><= Choose Project Name =></option>
                                                        @foreach ($project_list as $row)
                                                            
                                                        <option value="{{ $row->id }}" class="text-info">{{ $row->project_name }} | {{ $row->project_sl }}</option>
                                                        @endforeach
                                                       
                                                    </select>
                                                    
                                                </div>
                                            </div>

                                            <div id="dynamic_field">
                                                <div class="row">
                                                    <div class="form-group col-sm-4 col-lg-4 col-md-4">
                                                        <label>Equipment Name <span class="text-danger">*</span></label>
                                                        <input type="text" name="equipment_list[]" class="form-control" placeholder="Equipment Name" required>
                                                    </div>
                                            
                                                    <div class="form-group col-sm-2 col-lg-2 col-md-2">
                                                        <label>Quantity <span class="text-danger">*</span></label>
                                                        <input type="text" name="quantity[]" class="form-control" placeholder="Quantity" required>
                                                    </div>
                                            
                                                    <div class="form-group col-sm-2 col-lg-2 col-md-2">
                                                        <label>Unit Price <span class="text-danger">*</span></label>
                                                        <input type="text" name="unit_price[]" class="form-control" placeholder="Unit Price" required>
                                                    </div>
                                            
                                                    <div class="form-group col-sm-2 col-lg-2 col-md-2">
                                                        <label>Sub Price <span class="text-danger">*</span></label>
                                                        <input type="text" name="sub_price[]" class="form-control" placeholder="Sub Price" required>
                                                    </div>
                                            
                                                    <div class="form-group col-sm-2 col-lg-2 col-md-2">
                                                        <label>Add Column</label><br>
                                                        <button type="button" class="btn btn-info add">Add</button>
                                                    </div>
                                                </div>
                                            </div>
                                            

                                            <div class="row">

                                                <div class="form-group col-sm-6 col-lg-6 col-md-6">
                                                    <label>Total Price <span class="text-danger">*</span></label>
                                                    <input type="text" name="total_price" class="form-control" placeholder="Total Price" required>
                                                </div>

                                            
                                            <div class="form-group col-sm-6 col-lg-6 col-md-6">
                                                <label for="">In Word <span class="text-danger">*</span></label>
                                                <input type="text" name="in_word" class="form-control" placeholder="Only" required>
                                            </div>
                                          
                                            </div>

                                            <div class="form-group col-sm-6 col-lg-6 col-md-6">
                                                <label for="exampleInputFile">General Terms & Conditions : <span class="text-danger">*</span></label>
                                                <select name="general_terms" class="form-control" id="general_terms" required>
                                                    <option disabled selected>== Choose Option ==</option>
                                                    <option value="0">No</option>
                                                    <option value="1">Yes</option>
                                                </select>
                                            </div>


                                            <div class="row" id="date" style="display: none">

                                                <div class="form-group col-sm-6 col-lg-6 col-md-6">
                                                    <label for="">Supply Date </label>
                                                    <input type="date" name="supply_date" class="form-control" placeholder="Supply Date" >
                                                </div>

                                                <div class="form-group col-sm-6 col-lg-6 col-md-6">
                                                    <label for="">Worranty Expire Date</label>
                                                    <input type="date" name="expire_date" class="form-control" placeholder="Worranty Expire Date">
                                                </div>

                                            </div>


                                       <br><hr>

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary" disabled>Submit</button>
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
        $('#general_terms').on('change', function() {
            if (this.value === '1') { // 'Yes' selected
                $('#date').show();
            } else { // 'No' selected or default
                $('#date').hide();
            }
        });
    });// General Terams Yes or No Code End




    // Multiple Column Added Code Start
    $(document).ready(function() {
    let i = 1; // Counter for dynamic fields

    // Add new row on Add button click
    $(document).on('click', '.add', function() {
        i++;
        let html = `
            <div class="row" id="row${i}">
                <div class="form-group col-sm-4 col-lg-4 col-md-4">
                    <input type="text" name="equipment_list[]" class="form-control" placeholder="Equipment Name" required>
                </div>

                <div class="form-group col-sm-2 col-lg-2 col-md-2">
                    <input type="text" name="quantity[]" class="form-control" placeholder="Quantity" required>
                </div>

                <div class="form-group col-sm-2 col-lg-2 col-md-2">
                    <input type="text" name="unit_price[]" class="form-control" placeholder="Unit Price" required>
                </div>

                <div class="form-group col-sm-2 col-lg-2 col-md-2">
                    <input type="text" name="sub_price[]" class="form-control" placeholder="Total Price" required>
                </div>

                <div class="form-group col-sm-2 col-lg-2 col-md-2">
                    <button type="button" class="btn btn-danger remove" id="${i}">Remove</button>
                </div>
            </div>
        `;
        $('#dynamic_field').append(html);
    });

    // Remove row on Remove button click
    $(document).on('click', '.remove', function() {
        let button_id = $(this).attr("id");
        $('#row' + button_id).remove();
    });
    });





</script>




@endsection
    
