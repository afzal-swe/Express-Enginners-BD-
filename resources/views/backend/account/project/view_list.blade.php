


@extends('backend.layouts.app')
@section('content')




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
                                            <a href="{{ route('project.view',$row->id) }}" class="btn btn-primary btn-xs editbtn" title="Details"><i class="fa fa-eye"></i></a>
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
                                <label for="">Project SL/Number (4) <samp class="text-danger" >*</samp></label>
                                <input type="text" name="project_sl" class="form-control @error('project_sl') is-invalid @enderror" placeholder="5415" value="{{ old('project_sl')}}">
                                
                            </div>
                            @error('project_sl')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        
                    </div>

                    <div class="row">
                        <div class="col col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="">Phone</label>
                                <input type="text" name="phone" class="form-control" placeholder="Phone" value="{{ old('phone')}}">
                                
                            </div>
                        </div>
                        <div class="col col-lg-6 col-xl-6">
                            <div class="form-group">
                                <label for="">Address</label>
                                <input type="text" name="address" class="form-control" placeholder="Address" value="{{ old('address')}}">
                                
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



@endsection