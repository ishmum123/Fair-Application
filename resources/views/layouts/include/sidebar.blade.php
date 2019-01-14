<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

<div class="menu_section">
  <h3>{{ Auth::user()->email }}</h3>
  <ul class="nav side-menu">
    @if(\Illuminate\Support\Facades\Auth::user()->role < 2)
      <li><a><i class="fa fa-edit"></i> Settings <span class="fa fa-chevron-down"></span></a>
        <ul class="nav child_menu" style="display: none">
          <li><a href="/welcomes/create">Add New Image</a>
          </li>

          <li><a href="/welcomes">All Images</a>
          </li>
        </ul>
      </li>
    @endif
    @if(\Illuminate\Support\Facades\Auth::user()->role < 2)
    <li><a><i class="fa fa-edit"></i> Admins <span class="fa fa-chevron-down"></span></a>
      <ul class="nav child_menu" style="display: none">
        <li><a href="{{ url('/admins/create') }}">Create New</a>
        </li>

        <li><a href="/admins">All</a>
        </li>
      </ul>
    </li>
    @endif
    @if(\Illuminate\Support\Facades\Auth::user()->role < 3)
    <li><a><i class="fa fa-desktop"></i> Users <span class="fa fa-chevron-down"></span></a>
      <ul class="nav child_menu" style="display: none">
        <li><a href="{{ url('/appusers/create') }}">Create New</a>
        </li>
        <li><a href="{{ url('/appusers') }}">All</a>
        </li>
      </ul>
    </li>
    @endif
    <li><a><i class="fa fa-table"></i> Applications <span class="fa fa-chevron-down"></span></a>
      <ul class="nav child_menu" style="display: none">
        <li><a href="/applications/create">Create New</a>
        </li>
        <li><a href="/applications">All</a>
        </li>
        <li><a href="/applications-processed">Processed</a>
        </li>
        <li><a href="/applications-unprocessed">Unprocessed</a>
        </li>
        <li><a href="/applications-rejected">Rejected</a>
        </li>
      </ul>
    </li>

  </ul>
</div>


</div>