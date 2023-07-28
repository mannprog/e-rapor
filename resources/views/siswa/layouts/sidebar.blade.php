<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
                <li class="sidebar-item {{ Route::is('siswa.dashboard') ? 'selected' : '' }}"> <a
                        class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('siswa.dashboard') }}"
                        aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                            class="hide-menu">Dashboard</span></a></li>
                <li class="sidebar-item {{ Route::is('nilaisiswa*') ? 'selected' : '' }}"> <a
                        class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('nilaisiswa.index') }}"
                        aria-expanded="false"><i class="mdi mdi-receipt"></i></i><span class="hide-menu">Lihat
                            Nilai</span></a></li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
