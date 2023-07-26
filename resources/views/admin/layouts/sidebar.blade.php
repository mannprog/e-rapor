<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
                <li class="sidebar-item {{ Route::is('dashboard') ? 'selected' : '' }}"> <a
                        class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('dashboard') }}"
                        aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                            class="hide-menu">Dashboard</span></a></li>

                {{-- Menu Guru --}}
                <h4 class="mt-3 pt-3 mx-3 text-secondary border-top border-secondary">Menu Guru:</h4>
                <li class="sidebar-item {{ Route::is('nilai*') ? 'selected' : '' }}"> <a
                        class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('nilai.index') }}"
                        aria-expanded="false"><i class="mdi mdi-receipt"></i></i><span class="hide-menu">Input
                            Nilai</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="pages-buttons.html" aria-expanded="false"><i class="mdi mdi-relative-scale"></i><span
                            class="hide-menu">Cek Penilaian</span></a></li>

                {{-- Menu Walikelas --}}
                <h4 class="mt-3 pt-3 mx-3 text-secondary border-top border-secondary">Menu Walikelas:</h4>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="pages-elements.html" aria-expanded="false"><i class="mdi mdi-pencil"></i><span
                            class="hide-menu">Data Siswa</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-face"></i><span
                            class="hide-menu">Data Rapor </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="icon-material.html" class="sidebar-link"><i
                                    class="mdi mdi-emoticon"></i><span class="hide-menu"> Material Icons
                                </span></a></li>
                        <li class="sidebar-item"><a href="icon-fontawesome.html" class="sidebar-link"><i
                                    class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Font Awesome
                                    Icons </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-face"></i><span
                            class="hide-menu">Cek Penilaian </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="icon-material.html" class="sidebar-link"><i
                                    class="mdi mdi-emoticon"></i><span class="hide-menu"> Material Icons
                                </span></a></li>
                        <li class="sidebar-item"><a href="icon-fontawesome.html" class="sidebar-link"><i
                                    class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Font Awesome
                                    Icons </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-face"></i><span
                            class="hide-menu">Data Skill Passport </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="icon-material.html" class="sidebar-link"><i
                                    class="mdi mdi-emoticon"></i><span class="hide-menu"> Material Icons
                                </span></a></li>
                        <li class="sidebar-item"><a href="icon-fontawesome.html" class="sidebar-link"><i
                                    class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Font Awesome
                                    Icons </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-face"></i><span
                            class="hide-menu">Cetak Nilai </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="icon-material.html" class="sidebar-link"><i
                                    class="mdi mdi-emoticon"></i><span class="hide-menu"> Material Icons
                                </span></a></li>
                        <li class="sidebar-item"><a href="icon-fontawesome.html" class="sidebar-link"><i
                                    class="mdi mdi-emoticon-cool"></i><span class="hide-menu"> Font Awesome
                                    Icons </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="pages-elements.html" aria-expanded="false"><i class="mdi mdi-pencil"></i><span
                            class="hide-menu">Kenaikan Siswa</span></a></li>

                {{-- Menu Kepala Sekolah --}}
                <h4 class="mt-3 pt-3 mx-3 text-secondary border-top border-secondary">Menu Kepala Sekolah:</h4>
                <li class="sidebar-item"> <a class="sidebar-link has-arrow waves-effect waves-dark"
                        href="javascript:void(0)" aria-expanded="false"><i
                            class="mdi mdi-move-resize-variant"></i><span class="hide-menu">Laporan </span></a>
                    <ul aria-expanded="false" class="collapse  first-level">
                        <li class="sidebar-item"><a href="index2.html" class="sidebar-link"><i
                                    class="mdi mdi-view-dashboard"></i><span class="hide-menu"> Dashboard-2
                                </span></a></li>
                        <li class="sidebar-item"><a href="pages-gallery.html" class="sidebar-link"><i
                                    class="mdi mdi-multiplication-box"></i><span class="hide-menu"> Gallery
                                </span></a></li>
                        <li class="sidebar-item"><a href="pages-calendar.html" class="sidebar-link"><i
                                    class="mdi mdi-calendar-check"></i><span class="hide-menu"> Calendar
                                </span></a></li>
                        <li class="sidebar-item"><a href="pages-invoice.html" class="sidebar-link"><i
                                    class="mdi mdi-bulletin-board"></i><span class="hide-menu"> Invoice
                                </span></a></li>
                        <li class="sidebar-item"><a href="pages-chat.html" class="sidebar-link"><i
                                    class="mdi mdi-message-outline"></i><span class="hide-menu"> Chat Option
                                </span></a></li>
                    </ul>
                </li>

                {{-- Menu Admin --}}
                <h4 class="mt-3 pt-3 mx-3 text-secondary border-top border-secondary">Menu Admin:</h4>
                <li class="sidebar-item {{ Route::is('sistem*') ? 'selected' : '' }}"> <a
                        class="sidebar-link has-arrow waves-effect waves-dark {{ Route::is('sistem*') ? 'active' : '' }}"
                        href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-settings"></i><span
                            class="hide-menu">Kelola Sistem</span></a>
                    <ul aria-expanded="false" class="collapse  first-level {{ Route::is('sistem*') ? 'in' : '' }}">
                        <li class="sidebar-item {{ Route::is('sistem.jurusan*') ? 'active' : '' }}"><a
                                href="{{ route('sistem.jurusan.index') }}" class="sidebar-link"><i
                                    class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Kelola Jurusan
                                </span></a></li>
                        <li class="sidebar-item {{ Route::is('sistem.kelas*') ? 'active' : '' }}"><a
                                href="{{ route('sistem.kelas.index') }}" class="sidebar-link"><i
                                    class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Kelola Kelas
                                </span></a></li>
                        <li class="sidebar-item {{ Route::is('sistem.tahunajaran*') ? 'active' : '' }}"><a
                                href="{{ route('sistem.tahunajaran.index') }}" class="sidebar-link"><i
                                    class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Kelola Tahun Ajaran
                                </span></a></li>
                        <li class="sidebar-item {{ Route::is('sistem.rombel*') ? 'active' : '' }}"><a
                                href="{{ route('sistem.rombel.index') }}" class="sidebar-link"><i
                                    class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Kelola Rombel
                                </span></a></li>
                        <li class="sidebar-item {{ Route::is('sistem.mapel*') ? 'active' : '' }}"><a
                                href="{{ route('sistem.mapel.index') }}" class="sidebar-link"><i
                                    class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Kelola Mata Pelajaran
                                </span></a></li>
                    </ul>
                </li>
                <li class="sidebar-item {{ Route::is('kelola*') ? 'selected' : '' }}"> <a
                        class="sidebar-link has-arrow waves-effect waves-dark {{ Route::is('kelola*') ? 'active' : '' }}"
                        href="javascript:void(0)" aria-expanded="false"><i
                            class="mdi mdi-account-settings-variant"></i><span class="hide-menu">Kelola Users
                        </span></a>
                    <ul aria-expanded="false"
                        class="collapse  first-level {{ Route::is('kelola.gtk*') ? 'in' : '' }}  {{ Route::is('kelola.siswa*') ? 'in' : '' }}">
                        <li class="sidebar-item {{ Route::is('kelola.gtk*') ? 'active' : '' }}"><a
                                href="{{ route('kelola.gtk.index') }}" class="sidebar-link"><i
                                    class="mdi mdi-account-key"></i><span class="hide-menu"> GTK
                                </span></a>
                        </li>
                        <li class="sidebar-item {{ Route::is('kelola.siswa*') ? 'active' : '' }}"><a
                                href="{{ route('kelola.siswa.index') }}" class="sidebar-link"><i
                                    class="mdi mdi-account"></i><span class="hide-menu"> Siswa
                                </span></a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
