@extends('backend.layouts.app')
@section('content')

<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Tables <small>View All Project </small></h3>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
            <div class="x_title">
                <button type="button" class="btn btn-success btn-xs" style="float: right" data-toggle="modal" data-target="#modal-default">Add New Project</button>
                <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"></a>
                </li>
                </ul>
                <div class="clearfix"></div>
            </div>

            <div class="x_content">
                <div class="table-responsive">
                <table class="table table-striped jambo_table bulk_action">
                    <thead>
                    <tr class="headings">
                    
                        <th class="column-title">No </th>
                        <th class="column-title">Project SL</th>
                        <th class="column-title">Name</th>
                        <th class="column-title">Address</th>
                        <th class="column-title">Phone</th>
                        <th class="column-title">monthly Bill (৳)</th>
                        <th class="column-title">Status </th>
                        <th class="column-title no-link last"><span class="nobr">Action</span>
                        </th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach ($project_list as $key=>$row)
                            
                        
                    <tr class="even pointer">
                        <td class=" ">{{ ++$key }}</td>
                        <td class=" ">{{ $row->project_sl }}</td>
                        <td class=" ">{{ Str::of($row->project_name)->limit(24) }}</td>
                        <td class=" ">{{ Str::of($row->address)->limit(24) }}</td>
                        <td class=" ">{{ $row->phone }}</td>
                        <td class=" ">{{ $row->monthly_bill }} ৳</td>
                        
                        <td class=" ">
                            @if ($row->status==1)
                                <a href="{{ route('project.status',$row->id) }}" class="btn btn-success btn-xs" style="width:100px;"> Active </a>
                            @else
                                <a href="{{ route('project.status',$row->id) }}" class="btn btn-primary btn-xs" style="width:100px;" >Deactive</a>
                            @endif
                        </td>
                        
                        <td>
                            <a href="#" class="btn btn-primary btn-xs editbtn" title="Details"><i class="fa fa-eye"></i></a>
                            <a href="#" class="btn btn-info btn-xs editbtn" title="All Info"><i class="fa fa-file"></i></a>
                            <a href="{{ route('project.edit',$row->id) }}" class="btn btn-info btn-xs editbtn" title="Edit"><i class="fa fa-pencil"></i></a>
                            <a href="{{ route('project.delete',$row->id) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash-o"></i></a>
                        </td>
                    </tr>
                    @endforeach

                    </tbody>
                </table>
                </div>    
            </div>
            {{-- </div> --}}
        </div>
    </div>
</div>
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
                        <div class="col col-lg-8 col-xl-8">
                            <div class="form-group">
                                <label for="">Project Name <samp class="text-danger" >*</samp></label>
                                <input type="text" name="project_name" class="form-control @error('project_name') is-invalid @enderror" placeholder="Project Name" value="{{ old('project_name')}}">
                                
                            </div>
                            @error('project_name')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col col-lg-4 col-xl-4">
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
                                <label for="">Monthly Bill (৳)</label>
                                <input type="text" name="monthly_bill" class="form-control" placeholder="Monthly Bill" value="{{ old('monthly_bill')}}">
                                
                            </div>
                        </div>
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