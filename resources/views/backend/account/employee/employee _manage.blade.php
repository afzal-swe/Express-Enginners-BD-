


@extends('backend.layouts.app')
@section('content')




<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Tables <small>View All Employee </small></h3>
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
                          <h3 class="card-title">Employee List Here</h3>
                          <div class="x_title">
                            <button type="button" class="btn btn-success btn-xs" style="float: right" data-toggle="modal" data-target="#modal-default">Add New Employee</button>
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
                                    <th>E-Name</th>
                                    <th>E-ID Number</th>
                                    <th>E-Designation</th>
                                    <th>Phone</th>
                                    <th>Join Date</th>
                                    <th>Salary (৳)</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                
                                @foreach ($employee as $key=>$row)
                                    <tr>
                                        <td class=" ">{{ ++$key }}</td>
                                        <td class=" ">{{ $row->e_name ?? '' }}</td>
                                        <td class=" ">{{ $row->e_id_number ?? '' }}</td>
                                        <td class=" ">{{ $row->designation ?? '' }}</td>
                                        <td class=" ">{{ $row->phone ?? '' }}</td>
                                        <td class=" ">{{ $row->join_date ?? '' }}</td>
                                        <td class=" ">{{ $row->salary ?? '' }}</td>
                                   
                                        
                                       
                                        
                                        <td class=" ">
                                            @if ($row->status==1)
                                                <a href="{{ route('employee.status',$row->id) }}" class="btn btn-success btn-xs" style="width:100px;"> Active </a>
                                            @else
                                                <a href="{{ route('employee.status',$row->id) }}" class="btn btn-danger btn-xs" style="width:100px;" >Deactive</a>
                                                
                                            @endif
                                        </td>
                                        
                                        <td>
                                            <a href="{{ route('employee_bill.details',$row->e_id_number) }}" class="btn btn-primary btn-xs editbtn" title="Details"><i class="fa fa-eye"></i></a>
                                            <a href="{{ route('employee.edit',$row->id) }}" class="btn btn-info btn-xs editbtn" title="Edit"><i class="fa fa-edit"></i></a>
                                            <a href="{{ route('employee.delete',$row->id) }}" class="btn btn-danger btn-xs" id="delete" title="Delete"><i class="fa fa-trash"></i></a>
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
          <h4 class="modal-title">Add New Employee</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('employee.store') }}" method="post">
                @csrf

                <div class="card-body">

                    <div class="row">
                        <div class="col col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label for="">Employee Name <samp class="text-danger" >*</samp></label>
                                <input type="text" name="e_name" class="form-control @error('e_name') is-invalid @enderror" placeholder="Employee Name" value="{{ old('e_name')}}">
                                
                            </div>
                            @error('e_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col col-lg-12 col-xl-12">
                            <div class="form-group">
                                <label for="">Employee ID <samp class="text-danger" >*</samp></label>
                                <input type="text" name="e_id_number" class="form-control @error('e_id_number') is-invalid @enderror" placeholder="Employee ID Number" value="{{ old('e_id_number')}}">
                                
                            </div>
                            @error('e_id_number')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="">Designation</label>
                                <input type="text" name="designation" class="form-control" placeholder="Designation" value="{{ old('designation')}}">
                                
                            </div>
                        </div>
                        <div class="col col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ old('phone')}}">
                                
                            </div>
                        </div>
                        
                    </div>


                    <div class="row">

                        

                        <div class="col col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="">Join Date <samp class="text-danger" >*</samp></label>
                                <input type="date" name="join_date" class="form-control" value="{{ old('join_date')}}">
                                
                            </div>
                            @error('join_date')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="col col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="">Employee Salary <samp class="text-danger" >*</samp></label>
                                <input type="text" name="salary" class="form-control" placeholder="Employee Salary" value="{{ old('salary')}}">
                                
                            </div>
                            @error('salary')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                     
                    </div>

                    <div class="col col-lg-12 col-xl-12">
                        <div class="form-group">
                            <label for="">Employee Address</label>
                            <input type="text" name="address" class="form-control" placeholder="Employee Address" value="{{ old('address')}}">
                            
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



@endsection