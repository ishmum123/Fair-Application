<div class="top_nav">

    <div class="nav_menu">


        <ul class="nav navbar-nav navbar-right">
            <li class="">
                <a href="{{ route('logout') }}" onclick="event.preventDefault();
          document.getElementById('logout-form').submit();">
                    <i class="fa fa-sign-out"></i> Log Out</a></a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>


        </ul>
        </nav>
    </div>

</div>