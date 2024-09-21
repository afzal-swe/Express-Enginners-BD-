@extends('backend.layouts.app')
@section('content')

    <div class="container body">
      <div class="main_container">
   
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3>View All Statements</h3>
              </div>

              <div class="title_right">
                <div class="col-md-5 col-sm-5 col-xs-12 form-group pull-right top_search">
                  <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search for...">
                    <span class="input-group-btn">
                      <button class="btn btn-default" type="button">Go!</button>
                    </span>
                  </div>
                </div>
              </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="x_panel">
                      <div class="x_title">
                        <h2>Daly Income Statement
                        </h2>
                        <ul class="nav navbar-right panel_toolbox">
                       
                        </ul>
                        <div class="clearfix"></div>
                      </div>
                      <div class="x_content">
    
                        <table class="table table-striped">
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
                              <td>{{ $row->income_date }}</td>
                              <td>{{ $row->income_particulars }}</td>
                              <td>{{ $row->income_reason }}</td>
                              <td>{{ $row->income_amount }}</td>
                              <td>{{ $row->income_total }}</td>
                            </tr>

                            @endforeach
                            
                          </tbody>
                          
                        </table>
                        {{ $income_statement->links() }}
    
                      </div>
                    </div>
                  </div>


              <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Daly Expense Statement
                    </h2>
                    <ul class="nav navbar-right panel_toolbox">
                   
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">

                    <table class="table table-striped">
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
                            <td>{{ $row->expense_date }}</td>
                            <td>{{ $row->expense_particulars }}</td>
                            <td>{{ $row->expense_reason }}</td>
                            <td>{{ $row->expense_amount }}</td>
                            <td>{{ $row->expense_total }}</td>
                        </tr>
                        @endforeach
                        
                      </tbody>
                    </table>
                    {{ $income_statement->links() }}

                  </div>
                  
                </div>
                
              </div>
              

              <div class="clearfix"></div>

          
            
            </div>
          </div>
        </div>
        <!-- /page content -->

      </div>
    </div>

  

@endsection