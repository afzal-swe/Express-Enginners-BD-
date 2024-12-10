




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
            <h3>View All Monthly Bill :  </h3>
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
                          <h3 class="card-title">Monthly Bill : </h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead>



                              
                              </th>
                                <tr>
                                  <th>No </th>
                                  <th>Billing ID</th>
                                  <th>Date</th>
                                  <th>Month</th>
                                  {{-- <th>Price</th> --}}
                                  <th>Credit</th>
                                  <th>Debit</th>
                                  <th>Total</th>
                                  <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                
                              @foreach ($monthly_bill as $key=>$row)
                                    <tr>
                                      @if ($row->debit == 0)
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $row->billing_id ?? '' }}</td>
                                        {{-- <td class=" ">{{ $row->description }}</td> --}}
                                        <td>{{ $row->date ?? '' }}</td>
                                        <td>{{ $row->month_name ?? '' }}</td>
                                        {{-- <td>{{ $row->price ?? '' }}</td> --}}
                                        <td>{{ $row->credit ?? '' }}</td>
                                        <td>{{ $row->debit ?? '' }}</td>
                                        <td>{{ $row->total_price ?? '' }}</td>
                                      @else
                                        <td class="text-danger">{{ ++$key }}</td>
                                        <td class="text-danger">{{ $row->billing_id ?? '' }}</td>
                                        {{-- <td class=" ">{{ $row->description }}</td> --}}
                                        <td class="text-danger">{{ $row->date ?? '' }}</td>
                                        <td class="text-danger">{{ $row->month_name ?? '' }}</td>
                                        {{-- <td>{{ $row->price ?? '' }}</td> --}}
                                        <td class="text-danger">{{ $row->credit ?? '' }}</td>
                                        <td class="text-danger">{{ $row->debit ?? '' }}</td>
                                        <td class="text-danger">{{ $row->total_price ?? '' }}</td>
                                      @endif
                                      
                                      
                          
                                      <td>
                                        <a href="{{ route('monthly_bill_details.print',$row->id) }}" class="btn btn-success btn-xs" title="Print"><i class="fa fa-print"></i></a>
                                        <a href="{{ route('monthly_bill.details',$row->id) }}" class="btn btn-info btn-xs view-btn" data-id="{{ $row->id }}" data-bs-toggle="modal" data-target="#ProjectDetails" title="View"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('monthly_bill.delete',$row->id) }}" class="btn btn-danger btn-xs" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>
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


    <!-- Modal -->
<div class="modal fade" id="dataModal" tabindex="-1" aria-labelledby="dataModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <div class="modal-header">
              <h5 class="modal-title" id="dataModalLabel">Monthly Bill Single Details</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <p><strong>Billing ID : </strong> <span id="billing_id"></span></p>
              <p><strong>Date : </strong> <span id="date"></span></p>
              <p><strong>Description : </strong> <span id="description"></span></p>
              <p><strong>Month Name : </strong> <span id="month_name"></span></p>
              <p><strong>No Of Month : </strong> <span id="no_month"></span></p>
              <p><strong>Generator Status : </strong> <span id="generator_status"></span></p>
              <p><strong>Generator Description : </strong> <span id="generator_description"></span></p>
              <p><strong>Lift Quanitiy : </strong> <span id="lift_quanitiy"></span></p>
              <p><strong>Unit Price : </strong> <span id="unit_price"></span></p>
              <p><strong>Price : </strong> <span id="price"></span></p>
              <p><strong>Debit : </strong> <span id="debit"></span></p>
              <p><strong>Credit : </strong> <span id="credit"></span></p>
              <p><strong>Total Price : </strong> <span id="total_price"></span></p>
            
          </div>
          <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          </div>
      </div>
  </div>
</div>




  <script type="text/javascript">

    // view project data
    $(document).ready(function () {
        $('.view-btn').on('click', function () {
            var id = $(this).data('id');
            $.ajax({
                url: "{{ route('monthly_bill.details', '') }}/" + id,
                type: "GET",
                success: function (response) {
                    $('#billing_id').text(response.billing_id);
                    $('#date').text(response.date);
                    $('#description').text(response.description);
                    $('#month_name').text(response.month_name);
                    $('#no_month').text(response.no_month);
                    $('#generator_status').text(response.generator_status);
                    $('#generator_description').text(response.generator_description);
                    $('#lift_quanitiy').text(response.lift_quanitiy);
                    $('#unit_price').text(response.unit_price);
                    $('#price').text(response.price);
                    $('#debit').text(response.debit);
                    $('#credit').text(response.credit);
                    $('#total_price').text(response.total_price);
                   
                    $('#dataModal').modal('show');
                },
                error: function () {
                    alert('Failed to fetch data. Please try again.');
                }
            });
        });
      });
  
  
  
  
  </script>


@endsection



