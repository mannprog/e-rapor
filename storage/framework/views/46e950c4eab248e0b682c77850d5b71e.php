<aside class="left-sidebar" data-sidebarbg="skin5">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav" class="pt-4">
                <li class="sidebar-item <?php echo e(Route::is('dashboard') ? 'selected' : ''); ?>"> <a
                        class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo e(route('dashboard')); ?>"
                        aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                            class="hide-menu">Dashboard</span></a></li>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('guru')): ?>
                    
                    <h4 class="mt-3 pt-3 mx-3 text-secondary border-top border-secondary">Menu Guru:</h4>
                    <li class="sidebar-item <?php echo e(Route::is('nilai*') ? 'selected' : ''); ?>"> <a
                            class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo e(route('nilai.index')); ?>"
                            aria-expanded="false"><i class="mdi mdi-receipt"></i></i><span class="hide-menu">Kelola
                                Nilai</span></a></li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('walikelas')): ?>
                    
                    <h4 class="mt-3 pt-3 mx-3 text-secondary border-top border-secondary">Menu Guru:</h4>
                    <li class="sidebar-item <?php echo e(Route::is('nilai*') ? 'selected' : ''); ?>"> <a
                            class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo e(route('nilai.index')); ?>"
                            aria-expanded="false"><i class="mdi mdi-receipt"></i></i><span class="hide-menu">Kelola
                                Nilai</span></a></li>
                    
                    <h4 class="mt-3 pt-3 mx-3 text-secondary border-top border-secondary">Menu Walikelas:</h4>
                    <li class="sidebar-item <?php echo e(Route::is('rapor*') ? 'selected' : ''); ?>"> <a
                            class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo e(route('rapor.index')); ?>"
                            aria-expanded="false"><i class="mdi mdi-file-document"></i><span class="hide-menu">Kelola
                                Rapor</span></a></li>
                    <li class="sidebar-item <?php echo e(Route::is('kenaikan*') ? 'selected' : ''); ?>"> <a
                            class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo e(route('kenaikan.index')); ?>"
                            aria-expanded="false"><i class="mdi mdi-account-switch"></i><span class="hide-menu">Kelola
                                Kenaikan</span></a></li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('kepalasekolah')): ?>
                    
                    <h4 class="mt-3 pt-3 mx-3 text-secondary border-top border-secondary">Menu Kepala Sekolah:</h4>
                    <li class="sidebar-item <?php echo e(Route::is('laporan*') ? 'selected' : ''); ?>"> <a
                            class="sidebar-link waves-effect waves-dark sidebar-link" href="<?php echo e(route('laporan.index')); ?>"
                            aria-expanded="false"><i class="mdi mdi-file"></i><span class="hide-menu">Laporan
                                Rapor</span></a></li>
                <?php endif; ?>

                <?php if (app(\Illuminate\Contracts\Auth\Access\Gate::class)->check('admin')): ?>
                    
                    <h4 class="mt-3 pt-3 mx-3 text-secondary border-top border-secondary">Menu Admin:</h4>
                    <li class="sidebar-item <?php echo e(Route::is('sistem*') ? 'selected' : ''); ?>"> <a
                            class="sidebar-link has-arrow waves-effect waves-dark <?php echo e(Route::is('sistem*') ? 'active' : ''); ?>"
                            href="javascript:void(0)" aria-expanded="false"><i class="mdi mdi-settings"></i><span
                                class="hide-menu">Kelola Sistem</span></a>
                        <ul aria-expanded="false" class="collapse  first-level <?php echo e(Route::is('sistem*') ? 'in' : ''); ?>">
                            <li class="sidebar-item <?php echo e(Route::is('sistem.jurusan*') ? 'active' : ''); ?>"><a
                                    href="<?php echo e(route('sistem.jurusan.index')); ?>" class="sidebar-link"><i
                                        class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Kelola Jurusan
                                    </span></a></li>
                            <li class="sidebar-item <?php echo e(Route::is('sistem.kelas*') ? 'active' : ''); ?>"><a
                                    href="<?php echo e(route('sistem.kelas.index')); ?>" class="sidebar-link"><i
                                        class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Kelola Kelas
                                    </span></a></li>
                            <li class="sidebar-item <?php echo e(Route::is('sistem.tahunajaran*') ? 'active' : ''); ?>"><a
                                    href="<?php echo e(route('sistem.tahunajaran.index')); ?>" class="sidebar-link"><i
                                        class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Kelola Tahun Ajaran
                                    </span></a></li>
                            <li class="sidebar-item <?php echo e(Route::is('sistem.rombel*') ? 'active' : ''); ?>"><a
                                    href="<?php echo e(route('sistem.rombel.index')); ?>" class="sidebar-link"><i
                                        class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Kelola Rombel
                                    </span></a></li>
                            <li class="sidebar-item <?php echo e(Route::is('sistem.mapel*') ? 'active' : ''); ?>"><a
                                    href="<?php echo e(route('sistem.mapel.index')); ?>" class="sidebar-link"><i
                                        class="mdi mdi-all-inclusive"></i><span class="hide-menu"> Kelola Mata Pelajaran
                                    </span></a></li>
                        </ul>
                    </li>
                    <li class="sidebar-item <?php echo e(Route::is('kelola*') ? 'selected' : ''); ?>"> <a
                            class="sidebar-link has-arrow waves-effect waves-dark <?php echo e(Route::is('kelola*') ? 'active' : ''); ?>"
                            href="javascript:void(0)" aria-expanded="false"><i
                                class="mdi mdi-account-settings-variant"></i><span class="hide-menu">Kelola Users
                            </span></a>
                        <ul aria-expanded="false"
                            class="collapse  first-level <?php echo e(Route::is('kelola.gtk*') ? 'in' : ''); ?>  <?php echo e(Route::is('kelola.siswa*') ? 'in' : ''); ?>">
                            <li class="sidebar-item <?php echo e(Route::is('kelola.gtk*') ? 'active' : ''); ?>"><a
                                    href="<?php echo e(route('kelola.gtk.index')); ?>" class="sidebar-link"><i
                                        class="mdi mdi-account-key"></i><span class="hide-menu"> GTK
                                    </span></a>
                            </li>
                            <li class="sidebar-item <?php echo e(Route::is('kelola.siswa*') ? 'active' : ''); ?>"><a
                                    href="<?php echo e(route('kelola.siswa.index')); ?>" class="sidebar-link"><i
                                        class="mdi mdi-account"></i><span class="hide-menu"> Siswa
                                    </span></a></li>
                        </ul>
                    </li>
                <?php endif; ?>
            </ul>
        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
<?php /**PATH C:\laragon\www\e-rapor\resources\views/admin/layouts/sidebar.blade.php ENDPATH**/ ?>