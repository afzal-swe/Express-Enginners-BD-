
@php
  $contact = DB::table('contacts')->get();
@endphp

<div class="navbar nav_title" style="border: 0;">
    <a href="{{ route('dashboard') }}" class="site_title"><i class="fa fa-paw"></i> <span>EEBD</span></a>
  </div>
  

  <div class="clearfix"></div>

 
  <!-- /menu profile quick info -->

  <br />
 
 
 <!-- sidebar menu -->

  <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
      <div class="menu_section">
        <h3>General</h3>
        <ul class="nav side-menu">
          

          <li><a><i class="fa fa-bank"></i> Account <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">

                <li><a href="{{ route('project.list') }}">Project List</a></li>

                <li><a>Billing Section <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{ route('work_bill.create') }}">Create Work Bill</a></li>
                    <li><a href="#">Create Monthly Bill</a></li>
                  </ul>
                </li>

                <li><a>Statement Section <span class="fa fa-chevron-down"></span></a>
                  <ul class="nav child_menu">
                    <li><a href="{{ route('daly_statement.store') }}">Daly Statement Submit</a></li>
                    <li><a href="{{ route('statement') }}">Statement</a></li>
                    {{-- <li><a href="#">Statement</a></li> --}}
                  </ul>
                </li> 
            </ul>
          </li>

          
          <li><a><i class="fa fa-user"></i> Users <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{ route('user.create') }}">Add user</a></li>
                <li><a href="{{ route('user.view') }}">Manage User</a></li>
              </ul>
          </li>

          <li><a><i class="fa fa-user"></i> Role <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{ route('manage.role') }}">Manage Role</a></li>
              </ul>
          </li>

          <li><a><i class="fa fa-user"></i> Banner Section <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{ route('manage.banner') }}">Manage Banner</a></li>
              </ul>
          </li>

          <li>
            <a>
              <i class="fa fa-user"></i>
               Contact 
               <span class="fa fa-chevron-down"></span>
               <span class="badge badge-info right">{{ count($contact) }}</span>
            </a>
            <ul class="nav child_menu">
              <li><a href="{{ route('manage.contact') }}">Manage Contact</a></li>
            </ul>
          </li>
          

          

          <li><a><i class="fa fa-book"></i> Page <span class="fa fa-chevron-down"></span></a>
              <ul class="nav child_menu">
                <li><a href="{{ route('manage.page') }}">Manage Pages</a></li>
              </ul>
          </li>

         

          <li><a><i class="fa fa-gear"></i> Settings <span class="fa fa-chevron-down"></span></a>
            <ul class="nav child_menu">
              <li><a href="{{ route('notice') }}">Notice</a></li>
              <li><a href="{{ route('seo.section') }}">Seo</a></li>
              <li><a href="{{ route('social.section') }}">Social Section</a></li>
              <li><a href="{{ route('website.setting') }}">Website Setting</a></li>
             
            </ul>
          </li>

          
        </ul>
      </div>

    </div>

  <!-- /sidebar menu -->