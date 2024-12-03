

@extends('backend.layouts.app')
@section('content')



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Monthly Bill</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <a class="btn btn-primary mr-1" href="{{ route('monthly_bill.store') }}">Save</a>
              <a class="btn btn-info" href="#">Print</a>
              
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <div class="row">
                <div class="col col-sm-12 col-lg-12 col-md-12">
                    
                    
                    @php
                        $billData = Session::get('billData');
                        $project_data = Session::get('project_data');
                        // @dd($project_data);
                    @endphp


                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="container">
                                <div class="header">
                                    <p>Ref: <strong>{{ $billData['billing_id'] }}</strong> </p>
                                    <p>Date: {{ date("d-m-Y", strtotime($billData['date'])) }} </p>
                                </div>
                        
                                <div class="recipient">
                                    <p>To,<br>The President/Secretary<br><strong>{{ $project_data->project_name }}</strong><br>Dhaka</p>
                                </div>
                        
                                <h1>Bill</h1>
                        
                                <table class="bill-table">
                                    <thead>
                                        <tr>
                                            <th>Description</th>
                                            <th>No OF Month</th>
                                            <th>LIFT QTY</th>
                                            <th>Unit Price</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                       
                                        @if ($billData['generator_status'] == 1)
                                        <tr>
                                            <td>{{ $billData['description'].' '.$billData['month_name'].'-'.date("Y", strtotime($billData['date']))  }}</td>
                                            <td>{{ $billData['no_month'] }}</td>
                                            <td>{{ $project_data->lift_quanitiy }}</td>
                                            <td>{{ $project_data->unit_price }} /-</td>
                                            <td>{{ $project_data->monthly_bill }} /-</td>
                                        </tr>
                                        <tr>
                                            <td>{{ $billData['generator_description']  }}</td>
                                            <td>{{ $billData['no_month'] }}</td>
                                            <td>{{ $project_data->generator_quanitiy }}</td>
                                            <td>{{ $project_data->generator_unit_price }} /-</td>
                                            <td>{{ $project_data->generator_total_price }} /-</td>
                                        </tr>

                                        <tr>
                                            <td colspan="4" >Total amount : </td>
                                            <td colspan="1"><strong>{{ $project_data->monthly_bill + $project_data->generator_total_price }} /-</strong></td>
                                        </tr>
                                        @else
                                        <tr>
                                            <td>{{ $billData['description'].' '.$billData['month_name'].'-'.date("Y", strtotime($billData['date']))  }}</td>
                                            <td>{{ $billData['no_month'] }}</td>
                                            <td>{{ $project_data->lift_quanitiy }}</td>
                                            <td>{{ $project_data->unit_price }} /-</td>
                                            <td>{{ $project_data->monthly_bill }} /-</td>
                                        </tr>

                                        <tr>
                                            <td colspan="4" >Total amount : </td>
                                            <td colspan="1"><strong>{{ $project_data->monthly_bill}} /-</strong></td>
                                        </tr>
                                        @endif
                                       
                                      

                                    </tbody>
                                </table>
                        
                                <div class="total">
                                    
                                    <p>In word: ({{ $project_data->in_word }}).</p>
                                </div>
                        
                                <p class="total">We are assuring you of our best attention and services at all times.</p>
                        
                                <div class="signature">
                                    <p class="total">Sincerely Thanks From</p>
                                    <h4><strong>EXPRESS ENGINEERS BD</strong></h4>
                                    <div class="signuter_image mb-2">
                                        <img src="{{ asset('backend/images/signature/unnamed.png') }}" alt="" style="width:152px;">
                                    </div>
                                    <h5><strong>Sahed Ahamed Sakil</strong></h5>
                                    <p>B.Sc. Engr. Of EEE</p>
                                    <p>Marketing & Finance Director</p>
                                    <p>Cell: 01764-130103</p>
                                </div>
                            </div>
                        </div>
                       
                </div>
            </div>
        </div>
    </section>
  </div>

@endsection
    

    