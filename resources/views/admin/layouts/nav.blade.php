<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="{{route('index')}}" target="_blank"><i class="fas fa-globe"></i></a>
        </li>
    </ul>

    <ul class="navbar-nav ml-auto">
        {{-- <li class="nav-item pl-4">
            <a class="btn btn-danger" href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="fas fa-power-off"></i> Logout
            </a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li> --}}
        <li class="nav-item">
            <p class="text-light pr-2">
                {{auth()->user()->name}}
            </p>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" style="padding: 0;">
                <div class="image">
                    <img src="{{asset('backend/img/admin.png')}}" class="img-circle elevation-2" alt="User Image" style="height: 35px;width: 35px;margin-right: 15px;">
                </div>
            </a>
            <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit;right: 0px;min-width: 177px;">
                <a class="btn dropdown-item" onclick="changePassword()">
                    <i class="fas fa-lock mr-2"></i> Change Password
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('admin.logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                    <i class="fas fa-power-off mr-2"></i> Logout
                </a>
                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>
</nav>

<div class="modal fade" id="change_pass_modal">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Admin Change Password</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ route('admin.admin.change.password') }}" id="admin_password_change" method="POST">
                    @csrf
                    <label for="new_password">New Password</label>
                    <input type="password" name="new_password" id="new_password" placeholder="New Password..." class="form-control" required>
                    <label for="confirm_password">Confirm Password</label>
                    <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm Password..." class="form-control" required>
                </form>
                <div class="text-center">
                    <button type="button " class="btn btn-primary mt-2" onclick="updatePassword()">Change</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script>

    function changePassword(){
        $('#change_pass_modal').modal('show')
    }

    function updatePassword(){
        var new_password = $('#new_password').val()
        var confirm_password = $('#confirm_password').val()

        if(new_password != '' && confirm_password != ''){
            if(new_password == confirm_password){
                $('#admin_password_change').submit();
            }else{
                alert('Confirm Password Not Match!')
            }
        }else{
            alert('Please Enter Both Fields!')
        }
    }

</script>
