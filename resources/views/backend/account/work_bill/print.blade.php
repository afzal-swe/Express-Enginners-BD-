

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
            <ol class="breadcrumb float-sm-right">
              <a class="btn btn-primary mr-1" href="#">Save</a>
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
                        $workBill = Session::get('workBill');
                        $project_info = Session::get('project_info');
                        
                        // @dd($project_data);
                    @endphp


                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="container">
                                <div class="header">
                                    <p>Ref: <strong>{{ $workBill['ref'] }}</strong></p>
                                    <p>Date: 19 October 2024</p>
                                </div>
                        
                                <div class="recipient">
                                    <p>To,<br>The President/Secretary<br><strong>{{ $project_info->project_name }}</strong><br>Dhaka</p>
                                </div>
                        
                                <h2>Bill</h2>
                        
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
                                        <tr>
                                            <td >1</td>
                                            <td >{{ $workBill['equipment_list'] }}</td>
                                            <td>{{ $workBill['quantity'] }}</td>
                                            <td>{{ $workBill['unit_price'] }}</td>
                                            <td>0</td>
                                           
                                        </tr>
                                        
                                        <tr>
                                            <td colspan="4" >Total amount : </td>
                                            <td colspan="1"><strong>0 /-</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                        
                                <div class="total">
                                    
                                    <p>In word: (0).</p>
                                </div>
                        
                                <p style="margin-top: 35px;">General Terms & Conditions :</p>


                                @if ($workBill['general_terms'] == 1)
                                    <p style="margin-left: 25px; font-weight:bold;">01. Excluded Local VAT & TAX.</p>
                                @elseif ($workBill['general_terms'] == 2)
                                    <p style="margin-left: 25px; font-weight:bold;">01. Supply Date : {{ date("d-m-Y", strtotime($workBill['supply_date'])) }} </p>
                                @elseif ($workBill['general_terms'] == 3)
                                    <p style="margin-left: 25px; font-weight:bold;">01. Warranty Expire Date : {{ date("d-m-Y", strtotime($workBill['expire_date'])) }}</p>    
                                @endif

                                

                                <p style="margin-top: 25px;">We are assuring you of our best attention and services at all times.</p>
                        
                                <div class="signature">
                                    <p>Sincerely Thanks From</p>
                                    <p><strong>EXPRESS ENGINEERS BD</strong></p>
                                    <p>Sahed Ahamed Sakil</p>
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
    

    