@extends('backend.layouts.app')
@section('content')

<div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3>View All Monthly Bill :  </h3>
        </div>
      </div>

      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
            <div class="x_title">
              <h2>Monthly Bill : 
              </h2>
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
                        <th class="column-title">Billing ID</th>
                        {{-- <th class="column-title">Description</th> --}}
                        <th class="column-title">Date</th>
                        <th class="column-title">Month</th>
                        <th class="column-title">No Of Month</th>
                        <th class="column-title">Lift Quantity</th>
                        <th class="column-title">Total Price</th>
                        {{-- <th class="column-title no-link last"><span class="nobr">Action</span> --}}
                        </th>
                    </tr>
                    </thead>

                    <tbody>

                    @foreach ($monthly_bill as $key=>$row)
                            
                        
                    <tr class="even pointer">
                        <td class=" ">{{ ++$key }}</td>
                        <td class=" ">{{ $row->billing_id }}</td>
                        {{-- <td class=" ">{{ $row->description }}</td> --}}
                        <td class=" ">{{ $row->date }}</td>
                        <td class=" ">{{ $row->month_name }}</td>
                        <td class=" ">{{ $row->no_month }}</td>
                        
                        <td class=" ">{{ $row->lift_quanitiy }}</td>
                        <td class=" ">{{ $row->total_price }}</td>
                        
                        {{-- <td>
                            <a href="#" class="btn btn-success btn-xs" title="Delete"><i class="fa fa-print"></i></a>
                            <a href="#" class="btn btn-danger btn-xs" title="Delete"><i class="fa fa-trash-o"></i></a>
                        </td> --}}
                    </tr>
                    @endforeach

                    </tbody>
                </table>
                {{ $monthly_bill->links() }}
                </div>    
            </div>
            {{-- </div> --}}
        </div>
      </div>
       
    </div>
</div>
</div>


@endsection