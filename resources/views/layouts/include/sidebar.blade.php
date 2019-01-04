<div id="sidebar-menu" class="main_menu_side hidden-print main_menu">

<div class="menu_section">
  <h3>General</h3>
  <ul class="nav side-menu">
    <li><a><i class="fa fa-home"></i> Home <span class="fa fa-chevron-down"></span></a>
      <ul class="nav child_menu" style="display: none">
        <li><a href="/dashboard">Dashboard</a>
        </li>
        <!-- <li><a href="#">Dashboard2</a>
        </li>
        <li><a href="#">Dashboard3</a>
        </li> -->
      </ul>
    </li>
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
    <li><a><i class="fa fa-bar-chart-o"></i> Data Presentation <span class="fa fa-chevron-down"></span></a>
      <ul class="nav child_menu" style="display: none">
        <li><a href="#">Chart JS</a>
        </li>
        <li><a href="#">Chart JS2</a>
        </li>
        <!-- <li><a href="morisjs.html">Moris JS</a>
        </li>
        <li><a href="echarts.html">ECharts </a>
        </li>
        <li><a href="other_charts.html">Other Charts </a>
        </li> -->
      </ul>
    </li>
  </ul>
</div>
<div class="menu_section">
  <h3>Live On</h3>
  <ul class="nav side-menu">
    <li><a><i class="fa fa-bug"></i> Additional Pages <span class="fa fa-chevron-down"></span></a>
      <ul class="nav child_menu" style="display: none">
        <li><a href="#">E-commerce</a>
        </li>
        <!-- <li><a href="projects.html">Projects</a>
        </li>
        <li><a href="project_detail.html">Project Detail</a>
        </li>
        <li><a href="contacts.html">Contacts</a>
        </li>
        <li><a href="profile.html">Profile</a>
        </li> -->
      </ul>
    </li>
    <li><a><i class="fa fa-windows"></i> Extras <span class="fa fa-chevron-down"></span></a>
      <ul class="nav child_menu" style="display: none">
        <li><a href="#">404 Error</a>
        </li>
        <!-- <li><a href="page_500.html">500 Error</a>
        </li>
        <li><a href="plain_page.html">Plain Page</a>
        </li>
        <li><a href="login.html">Login Page</a>
        </li>
        <li><a href="pricing_tables.html">Pricing Tables</a>
        </li> -->

      </ul>
    </li>
    <li><a><i class="fa fa-laptop"></i> Landing Page <span class="label label-success pull-right">Coming Soon</span></a>
    </li>
  </ul>
</div>

</div>