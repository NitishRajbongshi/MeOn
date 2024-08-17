<div class="s-layout">
    <!-- Sidebar -->
    <div class="s-layout__sidebar">
        <a class="s-sidebar__trigger" href="#0">
            <i class="fa fa-bars"></i>
        </a>

        <nav class="s-sidebar__nav">
            <ul>
                <li>
                    <a class="s-sidebar__nav-link" href="#0">
                        <i class="fa fa-user"></i><em>My Profile</em>
                    </a>
                </li>
                <li>
                    <a class="s-sidebar__nav-link" href="#0">
                        <i class="fa-solid fa-money-check-dollar"></i><em>My Plans</em>
                    </a>
                </li>
                {{-- <li>
                    <a class="s-sidebar__nav-link" href="#0">
                        <i class="fa fa-camera"></i><em>Camera</em>
                    </a>
                </li> --}}
            </ul>
        </nav>
    </div>

    <!-- Content -->
    <main class="s-layout__content">
        {{ $slot }}
    </main>
</div>
