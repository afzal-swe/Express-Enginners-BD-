




@extends('backend.layouts.app')
@section('content')




<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>View All Bill :  </h3>
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
                          <h3 class="card-title">Employee Bill : </h3>

                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="example1" class="table table-bordered table-striped table-sm">
                            <thead>



                              
                              </th>
                                <tr>
                                  <th>No </th>
                                  <th>Employee ID</th>
                                  <th>Date</th>
                                  <th>Reason</th>
                                  {{-- <th>Price</th> --}}
                                  <th>Company</th>
                                  <th>Deposit</th>
                                  <th>Costs</th>
                                  {{-- <th>Action</th> --}}
                                </tr>
                            </thead>
                            <tbody>

                                
                              @foreach ($single_employee_bill as $key=>$row)
                                    <tr>
                                      <td>{{ ++$key }}</td>
                                      <td>{{ $row->e_id ?? '' }}</td>
                                      {{-- <td class=" ">{{ $row->description }}</td> --}}
                                      <td>{{ $row->date ?? '' }}</td>
                                      <td>{{ $row->reason ?? '' }}</td>
                                      {{-- <td>{{ $row->price ?? '' }}</td> --}}
                                      <td>{{ $row->company ?? '' }}</td>
                                      <td>{{ $row->deposit ?? '' }}</td>
                                     
                                      
                                      <td>{{ $row->costs ?? '' }}</td>
                          
                                      {{-- <td>
                                        <a href="#" class="btn btn-success btn-xs" title="Print"><i class="fa fa-print"></i></a>
                                        <a href="#" class="btn btn-info btn-xs" title="View"><i class="fa fa-eye"></i></a>
                                        <a href="#" class="btn btn-danger btn-xs" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
                                    </td> --}}
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


@endsection



