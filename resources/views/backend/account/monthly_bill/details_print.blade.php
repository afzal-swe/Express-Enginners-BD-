

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
                          <h1 style="text-align: center; margin-top: 150px;">Monthly Bill</h1>
                          <hr>
                  
                          <div style="margin-bottom: 125px; margin-top: 35px;">
                              <p style="font-size: 25px;">Project Name :</p>
                              <p style="font-size: 25px;">Ref ID : {{ $print->billing_id }}</p>
                              <p style="font-size: 25px;">Billing Date : {{ $print->date }}</p>
                              <p style="font-size: 25px;">Description : {{ $print->description }}</p>
                              <p style="font-size: 25px;">No Of Month : {{ $print->month_name }}</p>
                              <p style="font-size: 25px;">Generator Status : {{ $print->generator_status }}</p>
                              <p style="font-size: 25px;">Generator Description : {{ $print->generator_description }}</p>
                              <p style="font-size: 25px;">Lift Quanitiy : {{ $print->lift_quanitiy }}</p>
                              <p style="font-size: 25px;">Unit Price : {{ $print->unit_price }}</p>
                              <p style="font-size: 25px;">Price : {{ $print->price }}</p>
                              <p style="font-size: 25px;">Debit : {{ $print->debit }}</p>
                              <p style="font-size: 25px;">Credit : {{ $print->credit }}</p>
                              <p style="font-size: 25px;">Total Price : {{ $print->total_price }}</p>
                          </div>
                  
             
                  
                      </div>
                  </div>
                  
                  
                       
                </div>
            </div>
        </div>
    </section>
  </div>

@endsection
    

    