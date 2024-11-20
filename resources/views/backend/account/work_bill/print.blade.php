

@extends('backend.layouts.app')
@section('content')



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Work Bill</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right" >
              <a class="btn btn-primary mr-1" href="{{ route('session_data_store') }}"  >Save</a>
              <a class="btn btn-info" href="#" >Print</a>
              
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
                        $workBill = Session::get('workBill');
                        $project_info = Session::get('project_info');
                        
                        // @dd($project_data);
                    @endphp


                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="container">
                                <div class="header">
                                    <p>Ref: <strong>{{ $workBill['ref'] }}</strong></p>
                                    <p>Date: {{ date("d-m-Y", strtotime($workBill['billing_date'])) }}</p>
                                </div>
                        
                                <div class="recipient">
                                    <p>To,<br>The President/Secretary<br><strong>{{ $project_info->project_name }}</strong><br>{{ $project_info->address }}</p>
                                </div>
                        
                                <h1>Bill</h1>
                        
                                <table class="bill-table">
                                    <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Equipment List</th>
                                            <th>Quantity</th>
                                            <th>Unit Price</th>
                                            <th>Total Price</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach(session('workBill.equipment_list') as $index => $equipment)
                                        <tr>
                                            <td>{{ $index + 1 }}</td>
                                            <td style="text-align: left;">{{ $equipment }}</td>
                                            <td >{{ session('workBill.quantity')[$index] ?? '' }} </td>
                                            <td>{{ session('workBill.unit_price')[$index] ?? '' }} /-</td>
                                            <td>{{ session('workBill.sub_price')[$index] ?? '' }} /-</td>
                                        </tr>
                                    @endforeach
                                        
                                        <tr>
                                            <td colspan="4" >Total amount : </td>
                                            <td colspan="1"><strong>{{ $workBill['total_price'] }} /-</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                        
                                <div class="total">
                                    
                                    <p>In word: ({{ $workBill['in_word'] }}).</p>
                                </div>
                        
                                <p style="margin-top: 35px;">General Terms & Conditions :</p>

                                <p style="margin-left: 25px; font-weight:bold;">01. Excluded Local VAT & TAX.</p>

                                @if ($workBill['general_terms'] == 0)
                                    <p style="margin-left: 25px; font-weight:bold;"></p>
                                @elseif ($workBill['general_terms'] == 1)
                                    <p style="margin-left: 25px; font-weight:bold;">02. Supply Date : {{ date("d-m-Y", strtotime($workBill['supply_date'])) }} </p>
                                    <p style="margin-left: 25px; font-weight:bold;">03. Warranty Expire Date : {{ date("d-m-Y", strtotime($workBill['expire_date'])) }}</p>
                                @endif

                                

                                <p style="margin-top: 25px;">We are assuring you of our best attention and services at all times.</p>
                        
                                <div class="signature">
                                    <p>Sincerely Thanks From</p>
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
    

    