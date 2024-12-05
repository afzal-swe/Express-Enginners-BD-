












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
                                    {{-- <form action="{{ route('work_bill.store') }}" method="post"> --}}
                                    <form action="{{ route('work_bill_Session.store') }}" method="post">
                                        @csrf
                    
                                        <div class="card-body">
                    
                                            <div class="row">

                                                <div class="form-group col-sm-4 col-lg-4 col-md-4">
                                                    <label for="">Billing Date <span class="text-danger">*</span></label>
                                                    <input type="date" name="billing_date" class="form-control" placeholder="Billing Date" required>
                                                </div>

                                                <div class="form-group col-sm-4 col-lg-4 col-md-4">
                                                    <label for="">Billing Ref : <span class="text-danger">*</span></label>
                                                    <input type="text" name="ref" class="form-control @error('ref') is-invalid @enderror" value="EEBD/WB/{{ mt_rand(0, 100) }}">
                                                    @error('ref')
                                                    <samp class="text-danger">{{ $message }}</samp>
                                                @enderror
                                                </div>
    
                                                <div class="form-group col-sm-4 col-lg-4 col-md-4">
                                                    <label for="exampleInputFile">Project Name / SL Number <span class="text-danger">*</span></label>
                                                
                                                   
                                                
                                                    <!-- Dropdown with projects -->
                                                    <select name="project_id" id="project-dropdown" class="form-control" required>
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
                                                        <input type="text" name="sub_price[]" class="form-control" placeholder="Sub Price" readonly>
                                                    </div>
                                            
                                                    <div class="form-group col-sm-2 col-lg-2 col-md-2">
                                                        <label>Add Column</label><br>
                                                        <button type="button" class="btn btn-info add">Add</button>
                                                    </div>
                                                </div>
                                            </div>
                                            

                                            <div class="row">

                                                <div class="form-group col-sm-4 col-lg-4 col-md-4">
                                                    <label>Special Discount (৳)</label>
                                                    <input type="text" name="special_discount" class="form-control" placeholder="00 ৳">
                                                </div>

                                                <div class="form-group col-sm-4 col-lg-4 col-md-4">
                                                    <label>Total Price <span class="text-danger">*</span></label>
                                                    <input type="text" name="total_price" class="form-control" placeholder="Total Price" readonly>
                                                </div>

                                            
                                                <div class="form-group col-sm-4 col-lg-4 col-md-4">
                                                    <label for="">In Word <span class="text-danger">*</span></label>
                                                    <input type="text" name="in_word" class="form-control" placeholder="Only" required>
                                                </div>
                                          
                                            </div>

                                            <div class="form-group col-sm-6 col-lg-6 col-md-6">
                                                <label for="exampleInputFile">Warranty : <span class="text-danger">*</span></label>
                                                <select name="general_terms" class="form-control" id="general_terms">
                                                   
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



    $(document).ready(function () {

        // Calculate Sub Price based on Quantity and Unit Price
        $(document).on('input', '[name="quantity[]"], [name="unit_price[]"]', function () {
            const row = $(this).closest('.row');
            const quantity = parseFloat(row.find('[name="quantity[]"]').val()) || 0;
            const unitPrice = parseFloat(row.find('[name="unit_price[]"]').val()) || 0;

            // Calculate sub-price
            const subPrice = (quantity * unitPrice).toFixed(2);
            row.find('[name="sub_price[]"]').val(subPrice);

            // Update the total price
            calculateTotalPrice();
        });

        // Remove row and recalculate total price
        $(document).on('click', '.remove', function () {
            $(this).closest('.row').remove();
            calculateTotalPrice();
        });

        // Add new row
        $(document).on('click', '.add', function () {
            let i = $('#dynamic_field .row').length + 1;
            const html = `
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
                        <input type="text" name="sub_price[]" class="form-control" placeholder="Sub Price" readonly>
                    </div>
                    <div class="form-group col-sm-2 col-lg-2 col-md-2">
                        <button type="button" class="btn btn-danger remove" id="${i}">Remove</button>
                    </div>
                </div>`;
            $('#dynamic_field').append(html);
        });

        // Function to calculate the total price
        function calculateTotalPrice() {
            let totalPrice = 0;
            $('[name="sub_price[]"]').each(function () {
                const subPrice = parseFloat($(this).val()) || 0;
                totalPrice += subPrice;
            });
            $('[name="total_price"]').val(totalPrice.toFixed(2));
        }

        
    });




</script>




@endsection
    
