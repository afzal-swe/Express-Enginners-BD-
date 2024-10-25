



@extends('backend.layouts.app')
@section('content')




<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Tables <small>View All Statements </small></h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><- Go To Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->


      <div class="row">
        <div class="col col-sm-12 col-md-12 col-lg-12">
          <form action="#" method="GET" class="mb-3">
            {{-- <form action="{{ route('statements.index') }}" method="GET" class="mb-3"> --}}
              <div class="row">

              <div class="col-sm-2 mt-2">
                <input type="date" name="search" class="form-control" value="{{ request()->query('search') }}">
            
              </div>
             
              <div class="col-sm-2 mb-2">
                <button type="submit" class="btn btn-primary mt-2" disabled>Search</button>
           
            
              </div>
            </div>
            </form>
        </div>
        <h5 style="margin-left: 15px;">Or</h5>
        
        <div class="col col-sm-12 col-md-12 col-lg-12">
          <form action="#" method="GET" class="mb-3">
            {{-- <form action="{{ route('statements.index') }}" method="GET" class="mb-3"> --}}
              <div class="row">

                <div class="col-sm-2 mt-2">
                  <input type="date" name="search" class="form-control" value="{{ request()->query('search') }}">
              
                </div><a class="mt-3">To</a>
                <div class="col-sm-2 mt-2">
                  <input type="date" name="search" class="form-control" value="{{ request()->query('search') }}">
             
              
                </div>
                <div class="col-sm-2 mb-2">
                  <button type="submit" class="btn btn-primary mt-2" disabled>Search</button>
             
              
                </div>
              </div>
            </form>
        </div>
      </div>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Daly Income Statement Here</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="" class="table table-bordered table-striped table-sm">
                            
                            <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Date</th>
                                  <th>Particulars</th>
                                  <th>Reason</th>
                                  <th>Amount</th>
                                  <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                
                              @foreach ($income_statement as $key=>$row)
                                    <tr>
                                      <th scope="row">{{ ++$key }}</th>
                                      <td>{{ date('d-m-Y',strtotime($row->income_date)) }}</td>
                                      
                                      <td>{{ $row->income_particulars }}</td>
                                      <td>{{ $row->income_reason }}</td>
                                      <td>{{ $row->income_amount }}</td>
                                      <td>{{ $row->income_total }}</td>
                                    </tr>
                                    </tr>
                                  @endforeach
                               

                            </tbody>
                          </table>
                        </div>
                        <!-- /.card-body -->
                      </div>
                </div>

            {{-- Daly Expense Statements --}}

                <div class="col-sm-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title">Daly Expense Statement Here</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                          <table id="" class="table table-bordered table-striped table-sm">
                           
                            <thead>
                                <tr>
                                  <th>#</th>
                                  <th>Date</th>
                                  <th>Particulars</th>
                                  <th>Reason</th>
                                  <th>Amount</th>
                                  <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>

                                
                              @foreach ($expense_statement as $key=>$row)
                                    <tr>
                                      <th scope="row">{{ ++$key }}</th>
                                      <td>{{ date('d-m-Y',strtotime($row->expense_date)) }}</td>
                                      <td>{{ $row->expense_particulars }}</td>
                                      <td>{{ $row->expense_reason }}</td>
                                      <td>{{ $row->expense_amount }}</td>
                                      <td>{{ $row->expense_total }}</td>
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







@endsection