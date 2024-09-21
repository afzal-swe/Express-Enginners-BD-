@extends('backend.layouts.app')
@section('content')

<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>View All Work Bill :  </h3>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
            <div class="x_title">
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
                        <th class="column-title">Ref</th>
                        <th class="column-title">Equipment list</th>
                        <th class="column-title">Date</th>
                        <th class="column-title">Month</th>
                        <th class="column-title">Quantity</th>
                        <th class="column-title">Unit Price</th>
                        <th class="column-title">Total Price</th>
                        <th class="column-title">Terms </th>
                        <th class="column-title no-link last"><span class="nobr">Action</span>
                        </th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach ($p_work_bill as $key=>$row)
                            
                        
                    <tr class="even pointer">
                        <td class=" ">{{ ++$key }}</td>
                        <td class=" ">{{ $row->ref }}</td>
                        <td class=" ">{{ $row->equipment_list }}</td>
                        <td class=" ">{{ $row->date }}</td>
                        <td class=" ">{{ $row->month }}</td>
                        <td class=" ">{{ $row->quantity }}</td>
                        
                        <td class=" ">{{ $row->unit_price }}</td>
                        <td class=" ">{{ $row->total_price }} ৳</td>
                        
                        <td class=" ">
                            @if ($row->general_terms=="1")
                                <p class="btn btn-success btn-xs"> Excluded Local VAT & TAX. </p>
                            @elseif ($row->general_terms=="2")
                                <p class="text-primary btn-xs"  >Supply Date : </p>
                            @elseif ($row->general_terms=="3")
                                <p class="btn btn-info btn-xs" >Warranty Expire Date : </p>
                            @endif
                        </td>
                        
                        <td>
                            {{-- <a href="#" class="btn btn-primary btn-xs editbtn" title="Details"><i class="fa fa-eye"></i></a>
                            <a href="{{ route('project.view',$row->id) }}" class="btn btn-info btn-xs editbtn" title="All Info"><i class="fa fa-file"></i></a>
                            <a href="{{ route('project.edit',$row->id) }}" class="btn btn-info btn-xs editbtn" title="Edit"><i class="fa fa-pencil"></i></a> --}}
                            <a href="#" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash-o"></i></a>
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