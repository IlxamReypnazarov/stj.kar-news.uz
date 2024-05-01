<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}"> <span class="logo-name">Jataqxana</span>
            </a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
                <a href="{{ route('dashboard') }}" class="nav-link"><i
                        data-feather="monitor"></i><span>Dashboard</span></a>
            </li>
            <li class="dropdown">
                <a href="{{ route('indexFloor') }}" class="nav-link"><i
                        data-feather="briefcase"></i><span>Floor</span></a>
            </li>
            <li class="dropdown">
                <a href="{{ route('indexRoom') }}" class="nav-link"><i data-feather="command"></i><span>Room</span></a>
            </li>
            <li class="dropdown">
                <a href="{{ route('indexFaculty') }}" class="nav-link"><i
                        data-feather="copy"></i><span>Faculty</span></a>
            </li>
            <li class="dropdown">
                <a href="{{ route('indexProfession') }}" class="nav-link"><i data-feather="copy"></i><span>Profession</span></a>
            </li>
            <li class="dropdown">
                <a href="{{ route('indexGroup') }}" class="nav-link"><i data-feather="copy"></i><span>Group</span></a>
            </li>
            <li class="dropdown">
              <a href="{{ route('adminIndexApp') }}" class="nav-link"><i
                  data-feather="shopping-bag"></i><span>Applications [{{ $messageApp }}]</span></a>
            </li>
            <li class="dropdown">
                <a href="{{ route('successApp') }}" class="nav-link"><i
                    data-feather="file"></i><span>Attachment</span></a>
              </li>
            {{--


          <ul class="dropdown-menu">
            <li><a class="nav-link" href="avatar.html">Avatar</a></li>
            <li><a class="nav-link" href="card.html">Card</a></li>
            <li><a class="nav-link" href="modal.html">Modal</a></li>
            <li><a class="nav-link" href="sweet-alert.html">Sweet Alert</a></li>
            <li><a class="nav-link" href="toastr.html">Toastr</a></li>
            <li><a class="nav-link" href="empty-state.html">Empty State</a></li>
            <li><a class="nav-link" href="multiple-upload.html">Multiple Upload</a></li>
            <li><a class="nav-link" href="pricing.html">Pricing</a></li>
            <li><a class="nav-link" href="tabs.html">Tab</a></li>
          </ul>
        </li>
        <li><a class="nav-link" href="blank.html"><i data-feather="file"></i><span>Blank Page</span></a></li>
      --}}
        </ul>
    </aside>
</div>
