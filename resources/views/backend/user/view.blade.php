@extends('backend.layouts.app')
@section('content')
<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>Tables <small>All User Informations</small></h3>
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
                <ul class="nav navbar-right panel_toolbox">
                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
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
                        <th class="column-title">Name </th>
                        <th class="column-title">Email </th>
                        <th class="column-title">phone </th>
                        <th class="column-title">Address </th>
                        <th class="column-title">Parmission </th>
                        <th class="column-title">Status </th>
                        <th class="column-title no-link last"><span class="nobr">Action</span>
                        </th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach ($user_view as $key=>$row)
                            
                        
                    <tr class="even pointer">
                        <td class=" ">{{ ++$key }}</td>
                        <td class=" ">{{ $row->name }}</td>
                        <td class=" ">{{ $row->email }}</td>
                        <td class=" ">{{ $row->phone }}</td>
                        <td class=" ">{{ Str::of($row->address)->limit(30) }}</td>
                        <td class=" ">
                            @if ($row->parmission==1)
                                <p class="text-success" >Supper Admin</p>
                            @elseif ($row->parmission==2)
                                <p class="text-info" >Admin</p>
                            @else
                                <p class="text-primary" >Editor</p>
                            @endif
                        </td>

                        <td class=" ">
                            @if ($row->status==1)
                                <p class="text-success" >Active</p>
                            @else
                                <p class="text-primary" >Deactive</p>
                            @endif
                        </td>
                        
                        <td>
                            {{-- <a href="#" class="btn btn-primary btn-xs"><i class="fa fa-folder"></i> View </a> --}}
                            <a href="{{ route('user.edit',$row->slug) }}" class="btn btn-info btn-xs" ><i class="fa fa-pencil"></i></a>
                            <a href="{{ route('user.delete',$row->slug) }}" class="btn btn-danger btn-xs" ><i class="fa fa-trash-o"></i></a>
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

@endsection