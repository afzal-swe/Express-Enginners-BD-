












@extends('backend.layouts.app')
@section('content')



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h3>Selling Products</h3>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('dashboard') }}"><- Go To Home</a></li>
              <li class="breadcrumb-item active">DataTables</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                          <h3 class="card-title"> Add Selling Products</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="modal-content">
                               
                                <div class="modal-body">
                                    <form action="{{ route('selling_products.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                    
                                        <div class="card-body">
                    
                                      
                                            <div class="row">

                                                <div class="form-group col-sm-6 col-lg-6 col-md-6">
                                                    <label for="">Selling Product Title <span class="text-danger">*</span></label>
                                                    <input type="text" name="title" class="form-control" placeholder="Product Title" value="{{ old('title') }}" required> 
                                                </div>

                                                <div class="form-group col-sm-6 col-lg-6 col-md-6">
                                                    <label for="">Image <span class="text-danger">*</span></label>
                                                    <input type="file" name="image" class="form-control">
                                                </div>

                                            </div>


                                            <div class="form-group col-sm-12 col-lg-12 col-md-12">
                                                <label for="">Description</label>
                                                <textarea  name="description" class="form-control"> 

                                                </textarea>
                                            </div>
                                           
                                         


                                            <div class="form-group col-sm-6 col-lg-6 col-md-6">
                                                <label for="exampleInputFile">Status <span class="text-danger">*</span></label>
                                                <select name="status" class="form-control" required>
                                                    <option value="1">Active</option>
                                                    <option value="0">Deactive</option>
                                                    
                                                </select>
                                            </div>


                                       <br><hr>

                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Submit</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                              </div>
                        </div>
                        <!-- /.card-body -->
                      </div>
                </div>
            </div>
        </div>
    </section>
  </div>

@endsection
    
