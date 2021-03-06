<nav id="sidebar">
    <div id="dismiss">
        <i class="fas fa-arrow-left"></i>
    </div>
    <div class="sidebar-header">
        <h4>Discussion Forum</h4>
    </div>
    <ul class="list-unstyled components">
        <li class="active">
            <a href="{{ route('home') }}"><i class="bi bi-house-door-fill"></i>Home</a>
        </li>
        <li>
            <a href="#"><i class="bi bi-bar-chart-fill"></i>Dashboard</a>
        </li>
        @admin
            <li>
                <a href="{{ route('admin.roles.index') }}"><i class="bi bi-person-lines-fill"></i>Roles</a>
            </li>
            <li>
                <a href="{{ route('admin.permissions.index') }}"><i class="bi bi-key-fill"></i>Permissions</a>
            </li>
            <li>
                <a href="{{ route('admin.users.index') }}"><i class="bi bi-people-fill"></i>Users</a>
            </li>
        @endadmin
        <li>
            <a href="{{ route('questions.index') }}"><i class="bi bi-question-square-fill"></i>Questions</a>
        </li>
        <li>
            <a href="{{ route('tags.index') }}"><i class="bi bi-tags-fill"></i>Tags</a>
        </li>
    </ul>
</nav>
