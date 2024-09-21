<div class="sidebar-footer hidden-small">
    
    <form method="get" action="{{ route('logout') }}">
    
    @csrf

        <a href="{{ route('logout') }}" data-toggle="tooltip" data-placement="top" title="Logout" onclick="event.preventDefault(); this.closest('form').submit();">
        {{-- <a href="{{route('logout' )}}" data-toggle="tooltip" data-placement="top" title="Logout" onclick="event.preventDefault(); this.closest('form').submit();"> --}}
            <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            
      </a>
    </form>
  </div>