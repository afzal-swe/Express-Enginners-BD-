@extends('backend.layouts.app')
@section('content')
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Tables <small>View All Role </small></h3>
        </div>

        {{-- <div class="title_right">
          <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
            <div class="input-group">
              <input type="text" class="form-control" placeholder="Search for...">
              <span class="input-group-btn">
                <button class="btn btn-default" type="button">Go!</button>
              </span>
            </div>
          </div>
        </div> --}}
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
            <div class="x_title">
                <button type="button" class="btn btn-success btn-xs" style="float: right" data-toggle="modal" data-target="#modal-default">Add New Role</button>
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
                        <th class="column-title">Role Name </th>
                        <th class="column-title">Slug </th>
                        <th class="column-title">Status </th>
                        <th class="column-title no-link last"><span class="nobr">Action</span>
                        </th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach ($view_role as $key=>$row)
                            
                        
                    <tr class="even pointer">
                        <td class=" ">{{ ++$key }}</td>
                        <td class=" ">{{ $row->role_name }}</td>
                        <td class=" ">{{ $row->slug }}</td>
                        <td class=" ">
                            @if ($row->status==1)
                                <p class="text-success" >Active</p>
                            @else
                                <p class="text-primary" >Deactive</p>
                            @endif
                        </td>
                        
                        <td>
                            {{-- <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a> --}}
                            <a href="{{ route('role.edit',$row->slug) }}" class="btn btn-info btn-xs editbtn" title="Edit"><i class="fa fa-pencil"></i></a>
                            <a href="{{ route('role.delete',$row->slug) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash-o"></i></a>
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
          <h4 class="modal-title">Insert New Role</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('role.create') }}" method="post">
                @csrf

                <div class="card-body">

                    <div class="form-group">
                        <label for="">Role Name <span class="text-danger">*</span></label>
                        <input type="text" name="role_name" class="form-control @error('role_name') is-invalid @enderror " placeholder="Role Name" value="{{old('role_name')}}" required>
                        @error('role_name')
                          <div class="alert alert-danger">{{ $message }}</div>
                        @enderror
                    </div>


                    <div class="form-group">
                      <label for="exampleInputFile">Publication<span class="text-danger">*</span></label>
                      <select name="status" id="" class="form-control  @error('status') is-invalid @enderror " required>
                        <option value="" selected disabled>== Choose Options ==</option>
                          
                          <option value="1">Active</option>
                          <option value="0">Deactive</option>
                          
                      </select>
                      @error('status')
                          <span class="invalid-feedback" role="alert">
                              <strong>{{ $message }}</strong>
                          </span>
                      @enderror
                    </div>
                       
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
