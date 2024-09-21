


@extends('backend.layouts.app')
@section('content')


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>

<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Socials Settings Update</h1>
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
                          <h3 class="card-title">Social Modify</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title">Insert Social Link</h4>
                                 
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('social.update',$social->id) }}" method="post">
                                        @csrf
                    
                                        <div class="card-body">
                    
                                            <div class="form-group">
                                                <label for="">Facebook Link</label>
                                                <input type="text" name="facebook" class="form-control" placeholder="Facebook Link" value="{{ $social->facebook }}">
                                            </div>


                                            <div class="form-group">
                                                <label for="">Twitter Link</label>
                                                <input type="text" name="twitter" class="form-control" placeholder="Twitter Link" value="{{ $social->twitter }}">
                                            </div>


                                            <div class="form-group">
                                                <label for="">Youtube Link</label>
                                                <input type="text" name="youtube" class="form-control" placeholder="Youtube Link" value="{{ $social->youtube }}">
                                            </div>


                                            <div class="form-group">
                                                <label for="">Instagram Link</label>
                                                <input type="text" name="instagram" class="form-control" placeholder="Instagram Link" value="{{ $social->instagram }}">
                                            </div>

                                            <div class="form-group">
                                                <label for="">Linkedin Link</label>
                                                <input type="text" name="linkedin" class="form-control"  placeholder="Linkedin Link" value="{{ $social->linkedin }}">
                                            </div>

        
                                            <div class="card-footer">
                                                <button type="submit" class="btn btn-primary">Update</button>
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

              