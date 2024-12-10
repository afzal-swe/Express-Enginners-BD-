







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
            <h3>View All Work Bill :  </h3>
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
                          <h3 class="card-title">Work Bill :  </h3>

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
                                  {{-- <th>Price</th> --}}
                                  <th>Credit</th>
                                  <th>Debit</th>
                                  <th>Total</th>
                                  <th>Action</th>
                                  {{-- <th class="column-title no-link last"><span class="nobr">Action</span> --}}
                                </tr>
                            </thead>
                            <tbody>

                                
                              @foreach ($work_bill as $key=>$row)
                              {{-- @dd($row); --}}
                                    <tr>
                                      @if ($row->debit == 0)
                                        <td>{{ ++$key }}</td>
                                        <td>{{ $row->ref }}</td>
                                        <td>{{ $row->billing_date }}</td>
                                        {{-- <td>{{ $row->price ?? '' }}</td> --}}
                                        <td>{{ $row->credit ?? '' }}</td>
                                        <td>{{ $row->debit ?? '' }}</td>
                                        <td>{{ $row->total_price ?? '' }}</td>
                                      @else
                                        <td class="text-danger">{{ ++$key }}</td>
                                        <td class="text-danger">{{ $row->ref }}</td>
                                        <td class="text-danger">{{ $row->billing_date }}</td>
                                        {{-- <td>{{ $row->price ?? '' }}</td> --}}
                                        <td class="text-danger">{{ $row->credit ?? '' }}</td>
                                        <td class="text-danger">{{ $row->debit ?? '' }}</td>
                                        <td class="text-danger">{{ $row->total_price ?? '' }}</td>
                                      @endif
                                      
                                      
                                      
                                      
                                      <td>
                                          <a href="{{ route('work_bill_print',$row->id) }}" class="btn btn-success btn-xs" title="Print"><i class="fa fa-print"></i></a>
                                          <a href="{{ route('work_bill_details',$row->id) }}" class="btn btn-info btn-xs view-btn" data-id="{{ $row->id }}" data-bs-toggle="modal" data-target="#ProjectDetails" title="View"><i class="fa fa-eye"></i></a>
                                          <a href="{{ route('work_bill_delete',$row->id) }}" class="btn btn-danger btn-xs " id="delete" title="Delete"><i class="fa fa-trash"></i></a>
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
              <h5 class="modal-title" id="dataModalLabel">Data Details</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
              <p><strong>Work Bill Ref NO : </strong> <span id="ref"></span></p>
              <p><strong>Billing Date : </strong> <span id="billing_date"></span></p>
              <p><strong>Equipment List : </strong> <span id="equipment_list"></span></p>
              <p><strong>Quantity : </strong> <span id="quantity"></span></p>
              <p><strong>Unit Price : </strong> <span id="unit_price"></span></p>
              <p><strong>Sub Price : </strong> <span id="sub_price"></span></p>
              <p><strong>General Terms : </strong> <span id="general_terms"></span></p>
              <p><strong>Supply Date : </strong> <span id="supply_date"></span></p>
              <p><strong>Expire Date : </strong> <span id="expire_date"></span></p>
              <p><strong>Old Due : </strong> <span id="price"></span></p>
              <p><strong>New Debit : </strong> <span id="debit"></span></p>
              <p><strong>Credit : </strong> <span id="credit"></span></p>
              <p><strong>Total Price : </strong> <span id="total_price"></span></p>
              <p><strong>In Word : </strong> <span id="in_word"></span></p>
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
                  url: "{{ route('work_bill_details', '') }}/" + id,
                  type: "GET",
                  success: function (response) {
                      $('#ref').text(response.ref);
                      $('#billing_date').text(response.billing_date);
                      $('#general_terms').text(response.general_terms);
                      $('#supply_date').text(response.supply_date);
                      $('#expire_date').text(response.expire_date);
                      $('#price').text(response.price);
                      $('#debit').text(response.debit);
                      $('#credit').text(response.credit);
                      $('#total_price').text(response.total_price);
                      $('#in_word').text(response.in_word);
                     

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