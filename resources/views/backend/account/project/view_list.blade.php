


@extends('backend.layouts.app')
@section('content')

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Tables <small>View All Project </small></h3>
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
                          <h3 class="card-title">Project List Here</h3>
                          <div class="x_title">
                            <button type="button" class="btn btn-success btn-xs" style="float: right" data-toggle="modal" data-target="#modal-default">Add New Project</button>
                            <ul class="nav navbar-right panel_toolbox">
                            <li><a class="collapse-link"></a>
                            </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>P-SL</th>
                                    <th>P-Name</th>
                                    <th>Lift Qty</th>
                                    <th>Unit Price</th>
                                    <th>Total (৳)</th>
                                    <th>Monthly</th>
                                    <th>Work</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                
                                @foreach ($project_list as $key=>$row)
                                    <tr>
                                        <td class=" ">{{ ++$key }}</td>
                                        <td class=" ">{{ $row->project_sl }}</td>
                                        <td class=" ">{{ Str::of($row->project_name)->limit(24) }}</td>
                                        <td class=" ">{{ $row->lift_quanitiy }}</td>
                                        <td class=" ">{{ $row->unit_price }}</td>
                                        <td class=" ">{{ $row->monthly_bill }}</td>
                                        <td class=" ">
                                            <a href="{{ route('monthly_bill_view',$row->id) }}" class="btn btn-info btn-xs" style="width:100px;">Billing </a>
                                        </td>
                                        <td class=" ">
                                            <a href="{{ route('billing.view',$row->id) }}" class="btn btn-primary btn-xs" style="width:100px;">Billing </a>
                                        </td>
                                        
                                        <td class=" ">
                                            @if ($row->status==1)
                                                <a href="{{ route('project.status',$row->id) }}" class="btn btn-success btn-xs" style="width:100px;"> Active </a>
                                            @else
                                                <a href="{{ route('project.status',$row->id) }}" class="btn btn-danger btn-xs" style="width:100px;" >Deactive</a>
                                            @endif
                                        </td>
                                        
                                        <td>
                                            <a href="{{ route('project.view',$row->id) }}" class="btn btn-primary btn-xs view-btn" data-id="{{ $row->id }}" data-bs-toggle="modal" data-target="#ProjectDetails" title="Details"><i class="fa fa-eye"></i></a>
                                            {{-- <a href="{{ route('project.view',$row->id) }}" class="btn btn-info btn-xs editbtn" title="All Info"><i class="fa fa-file"></i></a> --}}
                                            <a href="{{ route('project.edit',$row->id) }}" class="btn btn-info btn-xs editbtn" title="Edit"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('project.delete',$row->id) }}" class="btn btn-danger btn-xs" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    </tr>
                                  @endforeach
                               

                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                </div>
            </div>
        </div>
    </section>
  </div>




<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Add New Project</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('project.create') }}" method="post">
                @csrf

                <div class="card-body">

                    <div class="row">
                        <div class="col col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label for="">Project Name <samp class="text-danger" >*</samp></label>
                                <input type="text" name="project_name" class="form-control @error('project_name') is-invalid @enderror" placeholder="Project Name" value="{{ old('project_name')}}">
                                
                            </div>
                            @error('project_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label for="">Project SL/Number <samp class="text-danger" >*</samp></label>
                                <input type="text" name="project_sl" class="form-control" value="{{ $lastSerial }}">
                                
                            </div>
                        </div>

                        <div class="col col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" name="address" class="form-control" placeholder="Address" value="{{ old('address')}}">
                                
                            </div>
                        </div>
                        
                    </div>

                    <div id="dynamic_field">
                    <div class="row">

                        <div class="col col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label for="">Name</label>
                                <input type="text" name="name[]" class="form-control" placeholder="Name" value="{{ old('name')}}">
                                
                            </div>
                        </div>

                        <div class="col col-lg-4 col-xl-4">
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" name="phone[]" class="form-control" placeholder="Phone" value="{{ old('phone')}}">
                                
                            </div>
                        </div> 

                        <div class="col col-lg-4 col-xl-4">
                            <label>Contact Add</label><br>
                            <button type="button" class="btn btn-info add">Contact Add</button>
                        </div>
                        
                    </div>
                    </div>


                    <div class="row">

                        <div class="col col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="">Lift Qty <samp class="text-danger" >*</samp></label>
                                <input type="text" name="lift_quanitiy" class="form-control" placeholder="Lift Qty" value="{{ old('lift_quanitiy')}}">
                                
                            </div>
                            @error('lift_quanitiy')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="">Unit Price <samp class="text-danger" >*</samp></label>
                                <input type="text" name="unit_price" class="form-control" placeholder="Unit Price" value="{{ old('unit_price')}}">
                                
                            </div>
                            @error('unit_price')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                     
                    </div>

                    <div class="form-group col-sm-12 col-lg-12 col-md-12">
                        <label for="exampleInputFile">Generator : <span class="text-danger">*</span></label>
                        <select name="generator_status" class="form-control" id="generator_status" required>
                            <option disabled selected>== Choose Option ==</option>
                            <option value="0">No</option>
                            <option value="1">Yes</option>
                        </select>
                    </div>

                    <div class="row" id="date" style="display: none">

                        <div class="col col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="">Generator Qty</label>
                                <input type="text" name="generator_quanitiy" class="form-control" placeholder="Generator Qty" value="{{ old('generator_quanitiy')}}">
                                
                            </div>
                        </div>

                        <div class="col col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="">Unit Price</label>
                                <input type="text" name="generator_unit_price" class="form-control" placeholder="Unit Price" value="{{ old('generator_unit_price')}}">  
                            </div>
                        </div>
                     
                    </div>

                    <div class="col col-lg-12 col-xl-12">
                      <div class="form-group">
                          <label for="">In Word</label>
                          <input type="text" name="in_word" class="form-control" placeholder="In Word" value="{{ old('in_word')}}">
                          
                      </div>
                  </div>

                    <div class="row">
                        
                        <div class="col col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="exampleInputFile">Publication</label>
                                <select name="status" id="" class="form-control">
                                  <option value="" selected disabled>== Choose Options ==</option>
                                    <option value="1">Active</option>
                                    <option value="0">Deactive</option>
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
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>



  <!-- Modal -->
<div class="modal fade" id="dataModal" tabindex="-1" aria-labelledby="dataModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="dataModalLabel">Data Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p><strong>Project SL:</strong> <span id="project_sl"></span></p>
                <p><strong>Project Name:</strong> <span id="project_name"></span></p>
                <p><strong>Address:</strong> <span id="address"></span></p>
                <p><strong>Lift Quantity:</strong> <span id="lift_quanitiy"></span></p>
                <p><strong>Lift Unit Price:</strong> <span id="unit_price"></span></p>
                <p><strong>Generator Quanitiy:</strong> <span id="generator_quanitiy"></span></p>
                <p><strong>Generator Unit Price:</strong> <span id="generator_unit_price"></span></p>
                <p><strong>Generator Total Price:</strong> <span id="generator_total_price"></span></p>
                <p><strong>Monthly Bill:</strong> <span id="monthly_bill"></span></p>
                <p><strong>In Word:</strong> <span id="in_word"></span></p>
                <p><strong>Project Status:</strong> <span id="status"></span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>





<script type="text/javascript">

    // General Terams Yes or No Code Start
    $(document).ready(function() {
        $('#generator_status').on('change', function() {
            if (this.value === '1') { // 'Yes' selected
                $('#date').show();
            } else { // 'No' selected or default
                $('#date').hide();
            }
        });
    });// General Terams Yes or No Code End


    // view project data
    $(document).ready(function () {
        $('.view-btn').on('click', function () {
            var id = $(this).data('id');
            $.ajax({
                url: "{{ route('project.view', '') }}/" + id,
                type: "GET",
                success: function (response) {
                    $('#project_sl').text(response.project_sl);
                    $('#project_name').text(response.project_name);
                    $('#address').text(response.address);
                    $('#lift_quanitiy').text(response.lift_quanitiy);
                    $('#unit_price').text(response.unit_price);
                    $('#generator_quanitiy').text(response.generator_quanitiy);
                    $('#generator_unit_price').text(response.generator_unit_price);
                    $('#generator_total_price').text(response.generator_total_price);
                    $('#monthly_bill').text(response.monthly_bill);
                    $('#in_word').text(response.in_word);
                    $('#status').text(response.status);

                    $('#dataModal').modal('show');
                },
                error: function () {
                    alert('Failed to fetch data. Please try again.');
                }
            });
        });
    });




    $(document).ready(function () {
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
                

                    <div class="col col-lg-4 col-xl-4">
                        <div class="form-group">
                            <input type="text" name="name[]" class="form-control" placeholder="Name" value="{{ old('name')}}">
                        </div>
                    </div>

                    <div class="col col-lg-4 col-xl-4">
                        <div class="form-group">
                            <input type="text" name="phone[]" class="form-control" placeholder="Phone" value="{{ old('phone')}}">
                        </div>
                    </div>
                    
                    <div class="form-group col-sm-2 col-lg-2 col-md-2">
                        <button type="button" class="btn btn-danger remove" id="${i}">Remove</button>
                    </div>
                </div>`;
            $('#dynamic_field').append(html);
        });
    });

</script>



@endsection