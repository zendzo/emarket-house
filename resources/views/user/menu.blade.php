<li class="treeview {{ active(['user.rumah.*']) }}">
    <a href="#">
      <i class="fa fa-list-alt"></i><span>Menu Utama</span>
      <span class="pull-right-container">
        <i class="fa fa-angle-left pull-right"></i>
      </span>
    </a>
    <ul class="treeview-menu">
    <li class="{{ active('user.rumah.*') }}">
        <a href="#"><i class="fa  fa-home"></i> Data Rumah
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
            <li class="{{ active(['admin.rumah.show']) }}">
              <a href="{{ route('user.rumah.show', auth()->user()->rumah->id) }}"><i class="fa  fa-home"></i> List Data</a>
            </li>
        </ul>
    </li>
  </li>