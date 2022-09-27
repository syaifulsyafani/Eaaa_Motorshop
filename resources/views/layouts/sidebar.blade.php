<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link">
        <img src="{{ url($setting->path_logo) }}" alt="Logo" class="brand-image img-circle"
            style="opacity: 1">
        <span class="brand-text font-weight-light">{{ $setting->nama_perusahaan }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                <li class="nav-item menu-open">
                    <a href="{{ route('dashboard') }}" class="nav-link">
                        <i class="nav-icon fas fa-chart-line"></i>
                        <p>Dashboard</p>
                    </a>
                </li>

                {{-- Admin --}}
                @if (auth()->user()->level == 1)                
                <li class="nav-header">MASTER</li>

                <li class="nav-item">
                    <a href="{{ route('supplier.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-truck"></i>
                        <p>Supplier</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('sparepart.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            Sparepart
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>

                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('kategori.index') }}" class="nav-link">
                                <i class="nav-icon far fa-caret-down"></i>
                                <p>Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('sparepart.index') }}" class="nav-link">
                                <i class="nav-icon far fa-caret-down"></i>
                                <p>Sparepart</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="{{ route('service.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tools"></i>
                        <p>Service</p>
                    </a>
                </li>

                <li class="nav-header">TRANSAKSI</li>

                <li class="nav-item">
                    <a href="{{ route('pengeluaran.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-money-bill"></i>
                        <p>Pengeluaran</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('reservasi.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-day"></i>
                        <p>Reservasi</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('reservasi.new') }}" class="nav-link">
                        <i class="nav-icon fas fa-calendar-day"></i>
                        <p>Reservasi Baru</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('kustomisasi.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-motorcycle"></i>
                        <p>Kustomisasi</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('pembelian.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-download"></i>
                        <p>Pembelian</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('penjualan.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-upload"></i>
                        <p>Penjualan</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('transaksi.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-cart-arrow-down"></i>
                        <p>Transaksi Aktif</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('transaksi.baru') }}" class="nav-link">
                        <i class="nav-icon fas fa-cart-arrow-down"></i>
                        <p>Transaksi Baru</p>
                    </a>
                </li>


                <li class="nav-header">REPORT</li>

                <li class="nav-item">
                    <a href="{{ route('laporan.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-file"></i>
                        <p>Laporan</p>
                    </a>
                </li>

                <li class="nav-header">SYSTEM</li>

                <li class="nav-item">
                    <a href="{{ route('user.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p>User</p>
                    </a>
                </li>
                
                <li class="nav-item">
                    <a href="{{ route('setting.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>Setting</p>
                    </a>
                </li>
            </ul>
            @endif


            {{-- Kasir --}}
            @if (auth()->user()->level == 2)
            <li class="nav-header">DAFTAR</li>

            <li class="nav-item">
                <a href="{{ route('sparepart.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-cogs"></i>
                    <p>Sparepart</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('service.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-tools"></i>
                    <p>Service</p>
                </a>
            </li>

            <li class="nav-header">TRANSAKSI</li>

            <li class="nav-item">
                <a href="{{ route('pembelian.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-download"></i>
                    <p>Pembelian</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('penjualan.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-upload"></i>
                    <p>Penjualan</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('transaksi.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-cart-arrow-down"></i>
                    <p>Transaksi Aktif</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('transaksi.baru') }}" class="nav-link">
                    <i class="nav-icon fas fa-cart-arrow-down"></i>
                    <p>Transaksi Baru</p>
                </a>
            </li>
            @endif


            {{-- Mekanik --}}
            @if (auth()->user()->level == 3)
            <li class="nav-header">DAFTAR</li>

            <li class="nav-item">
                <a href="{{ route('sparepart.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-cogs"></i>
                    <p>Sparepart</p>
                </a>
            </li>

            <li class="nav-header">TRANSAKSI</li>
           
            <li class="nav-item">
                <a href="{{ route('kustomisasi.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-motorcycle"></i>
                    <p>Kustomisasi</p>
                </a>
            </li>
            @endif


            {{-- Pemilik --}}
            @if (auth()->user()->level == 4)
            <li class="nav-header">REPORT</li>

            <li class="nav-item">
                <a href="{{ route('laporan.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-file"></i>
                    <p>Laporan</p>
                </a>
            </li>

            <li class="nav-header">SYSTEM</li>

            <li class="nav-item">
                <a href="{{ route('setting.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-cogs"></i>
                    <p>Setting</p>
                </a>
            </li>
            @endif


            {{-- Pelanggan --}}
            @if (auth()->user()->level == 0)
            <li class="nav-header">MENU</li>
                

            <li class="nav-item">
                <a href="{{ route('reservasi.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-calendar-day"></i>
                    <p>Reservasi</p>
                </a>
            </li>

            <li class="nav-item">
                <a href="{{ route('reservasi.new') }}" class="nav-link">
                    <i class="nav-icon fas fa-calendar-day"></i>
                    <p>Reservasi Baru</p>
                </a>
            </li>


            <li class="nav-item">
                <a href="{{ route('kustomisasi.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-motorcycle"></i>
                    <p>Kustomisasi</p>
                </a>
            </li>
            @endif
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>