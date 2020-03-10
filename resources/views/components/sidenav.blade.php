<div class="sidenav" style="width: 17%;">
    <div class="list-group" style="overflow: auto;height: 85vh;">
        <a href="#" class="list-group-item list-group-item-action ">
            <h3> Admin Panel</h3>
            <button type="button" class="close d-md-none" aria-label="Close" onclick="$('#nav').toggleClass('side-toogle')">
              <span aria-hidden="true">&times;</span>
            </button>
        </a>
        <a href="/admin/" class="list-group-item list-group-item-action">
            <i class="fa fa-desktop"></i>
            Dashboard
        </a>
        <a href="/admin/user" class="list-group-item list-group-item-action" >
            {{-- data-toggle="collapse" data-target="#collapseOne" --}}
            <i class="fa fa-users"></i>
            User
        </a>
        {{-- <div id="collapseOne" class="collapse sub-item" >
            <a href="/admin/user" class="list-group-item list-group-item-action">
                Users
            </a>
            <a href="#" class="list-group-item list-group-item-action">
                Create User
            </a>
        </div> --}}
        <a href="#!" class="list-group-item list-group-item-action" data-toggle="collapse" data-target="#collapseOne">
            <i class="fa fa-tasks"></i>
            Projects
        </a>
        <div id="collapseOne" class="collapse sub-item" >
            <a href="/admin/project/1" class="list-group-item list-group-item-action">
                Active
            </a>
            <a href="/admin/project/0" class="list-group-item list-group-item-action">
                InActive
            </a>
        </div>
        <a href="/admin/tranining" class="list-group-item list-group-item-action">
            <i class="fa fa-rss-square"></i>
            Tranining
        </a>
        <div class="list-group-item" style="padding: 0;">
            <div id='side-footer' class="list-group list-group-horizontal">
              <li class="list-group-item list-group-item-action"> 
                  <a href="/profile"><i class="fa fa-user fa-1x"  style="font-size: 1.5rem;"></i> </a>
              </li>
              <li class="list-group-item list-group-item-action"> 
                  <a href="/"><i class="fa fa-home fa-1x" style="font-size: 1.5rem;"></i> </a>
              </li>
            </div>
        </div>
    </div>
</div>