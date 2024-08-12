@extends('backend.layouts.app')
@section('content')

<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Tables <small>View All Banners </small></h3>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
            <div class="x_title">
                <button type="button" class="btn btn-success btn-xs" style="float: right" data-toggle="modal" data-target="#modal-default">Add New Banner</button>
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
                        <th class="column-title">Banner</th>
                        <th class="column-title">Status </th>
                        <th class="column-title no-link last"><span class="nobr">Action</span>
                        </th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach ($banner as $key=>$row)
                            
                        
                    <tr class="even pointer">
                        <td class=" ">{{ ++$key }}</td>
                        <td><img src="{{ asset($row->banner) }}" style="height: 70px; width:160px"></td>
                        <td class=" ">
                            @if ($row->status==1)
                                <a href="{{ route('banner.status',$row->id) }}" class="btn btn-success" style="width:100px;"> Active </a>
                            @else
                                <a href="{{ route('banner.status',$row->id) }}" class="btn btn-primary" style="width:100px;" >Deactive</a>
                            @endif
                        </td>
                        
                        <td>
                            <a href="{{ route('banner.edit',$row->id) }}" class="btn btn-info btn-xs editbtn" title="Edit"><i class="fa fa-pencil"></i></a>
                            <a href="{{ route('banner.delete',$row->id) }}" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash-o"></i></a>
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
          <h4 class="modal-title">Create New Banner</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{ route('banner.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                <div class="card-body">

                    <div class="form-group">
                        <label for="">Banner Image</label>
                        <input type="file" name="banner" class="form-control" required>
                        
                    </div>

                    <div class="form-group">
                      <label for="exampleInputFile">Publication</label>
                      <select name="status" id="" class="form-control">
                        <option value="" selected disabled>== Choose Options ==</option>
                          <option value="1">Active</option>
                          <option value="0">Deactive</option>
                      </select>
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