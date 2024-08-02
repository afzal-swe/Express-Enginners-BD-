@extends('backend.layouts.app')
@section('content')


 <!-- page content -->
 <div class="right_col" role="main">
    <div class="">
      <div class="page-title">
        <div class="title_left">
          <h3> New User Added Form Section</h3>
        </div>
      </div>
      <div class="clearfix"></div>

      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_content">

              <form class="form-horizontal form-label-left" action="{{ route('user.store') }}" method="post" >

                @csrf
                <span class="section">Add A New User</span>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">User Name <span>*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="name" class="form-control col-md-7 col-xs-12" name="name" placeholder="User Name" required="required" value="{{ old('name') }}">
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="number">Number <span>*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="number" id="phone" name="phone" required="required" class="form-control col-md-7 col-xs-12" placeholder="01XXXXXXXXX" value="{{ old('phone')}}">
                  </div>
                </div>

                <div class="item form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span>*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12" placeholder="example@gmail.com" value="{{ old('email')}}">
                    </div>
                  </div>
               
                <div class="item form-group">
                  <label for="password" class="control-label col-md-3">Password</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="password" type="password" name="password" class="form-control col-md-7 col-xs-12" required="required">
                  </div>
                </div>
                {{-- <div class="item form-group">
                  <label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Confirm Password</label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input id="password2" type="password" name="confirmed"  class="form-control col-md-7 col-xs-12" required="required" placeholder="Confirm Password">
                  </div>
                </div> --}}
               
                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Address <span>*</span> </label>
                  <div class="col-md-6 col-sm-6 col-xs-12" >
                    <textarea id="textarea" required="required" name="address" class="form-control col-md-7 col-xs-12"  value="{{ old('address') }}">
                      
                    </textarea>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Parmission <span>*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="parmission" id="" class="form-control col-md-7 col-xs-12" required>
                        <option selected disabled>Select Parmission</option>
                        <option value="1">Supper Admin</option>
                        <option value="2">Admin</option>
                        <option value="3">Editor</option>
                    </select>
                  </div>
                </div>

                <div class="item form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">Status <span>*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <select name="status" id="" class="form-control col-md-7 col-xs-12" required>
                        <option selected disabled>Select Option</option>
                        <option value="1">Active</option>
                        <option value="0">Deactive</option>
                    </select>
                  </div>
                </div>

                

                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-md-offset-3">
                    <button id="send" type="submit" class="btn btn-success">Submit</button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- /page content -->

@endsection