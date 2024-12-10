

@extends('backend.layouts.app')
@section('content')



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<style>
  .equipment-table {
      width: 100%;
      margin: 0 auto;
      border-collapse: collapse;
      font-size: 18px;
      text-align: center;
      margin-top: 35px;
  }

  .equipment-table th, .equipment-table td {
      border: 1px solid #ccc;
      padding: 10px;
  }

  .equipment-table th {
      background-color: #f4f4f4;
  }

  .card-body {
      display: flex;
      justify-content: center;
      align-items: center;
      flex-direction: column;
  }
</style>


<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Work Bill Print</h3>
          </div>
          
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <div class="row">
                <div class="col col-sm-12 col-lg-12 col-md-12">
                    
                    <!-- /.card-header -->
                    <div class="card-body">
                      <div class="container">
                          <h1 style="text-align: center; margin-top: 150px;">Work Bill</h1>
                          <hr>
                  
                          <div style="margin-bottom: 25px; margin-top: 35px;">
                              <p style="font-size: 25px;">Project Name :</p>
                              <p style="font-size: 25px;">Ref ID : {{ $print->ref }}</p>
                              <p style="font-size: 25px;">Billing Date : {{ $print->billing_date }}</p>
                          </div>
                  
                          <!-- Table Section -->
                          <table class="equipment-table">
                              <thead>
                                  <tr>
                                      <th>Equipment List</th>
                                      <th>Unit Quantity</th>
                                      <th>Unit Price</th>
                                      <th>Sub Price</th>
                                  </tr>
                              </thead>
                              <tbody>

                                @php
                                    $equipment_list = json_decode($print->equipment_list, true);
                                    $quantities = json_decode($print->quantity, true);
                                    $unit_prices = json_decode($print->unit_price, true);
                                    $sub_prices = json_decode($print->sub_price, true);
                                @endphp

                                @foreach ($equipment_list as $index => $equipment)
                                <tr>
                                    <td>{{ $equipment }}</td>
                                    <td>{{ $quantities[$index] ?? '-' }}</td>
                                    <td>{{ $unit_prices[$index] ?? '-' }}</td>
                                    <td>{{ $sub_prices[$index].'৳' ?? '-' }}</td>
                                </tr>
                                @endforeach
                              </tbody>
                          </table>
                  
                          <div style="margin-top: 35px; margin-bottom: 150px;">
                            @if ($print->general_terms == 1)
                              
                            <p style="font-size: 25px;">Warranty : Yes</p>
                            @else
                              
                            <p style="font-size: 25px;">Warranty : No</p>
                            @endif
                              <p style="font-size: 25px;">Supply Date : {{ $print->supply_date }}</p>
                              <p style="font-size: 25px;">Expire Date : {{ $print->expire_date }}</p>
                              {{-- <p style="font-size: 25px;">Price : {{ $print->price }}</p> --}}
                              @if ($print->discount_status == 1)
                                
                              <p style="font-size: 25px;">Discount : Yes</p>
                              @else
                              <p style="font-size: 25px;">Discount : No</p>
                                
                              @endif
                              <p style="font-size: 25px;">Special Discount : {{ $print->special_discount }}</p>
                              <p style="font-size: 25px;">Debit : {{ $print->debit }}</p>
                              <p style="font-size: 25px;">Credit : {{ $print->credit }}</p>
                              <p style="font-size: 25px;">Total Price : {{ $print->total_price }} ৳</p>
                              <p style="font-size: 25px;">In Word : {{ $print->in_word }}</p>
                          </div>
                      </div>
                  </div>
                  
                  
                       
                </div>
            </div>
        </div>
    </section>
  </div>

@endsection
    

    