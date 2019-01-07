<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

<div class="menu_section">
  <h3>{{ Auth::user()->email }}</h3>
  <ul class="nav side-menu">

    <li><a><i class="fa fa-edit"></i> Admins <span class="fa fa-chevron-down"></span></a>
      <ul class="nav child_menu" style="display: none">
        @if(Auth::user()->role == 1)
        <li><a href="/admins/create">Create Admin</a>
        </li>
        @endif
        <li><a href="/admins">List of Admin</a>
        </li>
      </ul>
    </li>
    <li><a><i class="fa fa-desktop"></i> Users <span class="fa fa-chevron-down"></span></a>
      <ul class="nav child_menu" style="display: none">
        <li><a href="/users/create">Create User</a>
        </li>
        <li><a href="/users">List of Users</a>
        </li>
      </ul>
    </li>
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