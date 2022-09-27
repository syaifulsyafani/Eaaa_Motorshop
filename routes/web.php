<?php


use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    DashboardController,
    HomeController,
    KategoriController,
    KustomisasiController,
    LaporanController,
    PembelianController,
    PembelianDetailController,
    PengeluaranController,
    PenjualanController,
    PenjualanDetailController,
    RegistrasiController,
    ReservasiController,
    ServiceController,
    SettingController,
    SparepartController,
    SupplierController,
    UserController,
};



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//  route auth
    Auth::routes();

    Route::get('/eaaamotorshop', function () {
        return view('user');
    });

    // landing page
    Route::get('/', function () {
        return view('auth.login');
    });

    // registrasi
    Route::get('/registrasi', [RegistrasiController::class, 'index'])->name('auth.tambahakun');
    Route::post('/registrasi/baru', [RegistrasiController::class, 'store'])->name('tambah.akun');


    Route::group(['middleware' => 'auth'], function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // ADMIN
        Route::group(['middleware' => 'level:1'], function () {
            // Kategori
            Route::get('/kategori/data', [KategoriController::class, 'data'])->name('kategori.data');
            Route::resource('/kategori', KategoriController::class);

            // Kustomisasi
            Route::get('/kustomisasi/data', [KustomisasiController::class, 'data'])->name('kustomisasi.data');
            Route::resource('/kustomisasi', KustomisasiController::class);

            // Laporan
            Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
            Route::get('/laporan/data/{awal}/{akhir}', [LaporanController::class, 'data'])->name('laporan.data');
            Route::get('/laporan/pdf/{awal}/{akhir}', [LaporanController::class, 'exportPDF'])->name('laporan.export_pdf');

            // pembelian
            Route::get('/pembelian/data', [PembelianController::class, 'data'])->name('pembelian.data');
            Route::get('/pembelian/{id}/create', [PembelianController::class, 'create'])->name('pembelian.create');
            Route::resource('/pembelian', PembelianController::class)
                ->except('create');

            // pembelian detail
            Route::get('/pembelian_detail/{id}/data', [PembelianDetailController::class, 'data'])->name('pembelian_detail.data');
            Route::get('/pembelian_detail/loadform/{diskon}/{total}', [PembelianDetailController::class, 'loadForm'])->name('pembelian_detail.load_form');
            Route::resource('/pembelian_detail', PembelianDetailController::class)
                ->except('create', 'show', 'edit');

            // pengeluaran
            Route::get('/pengeluaran/data', [PengeluaranController::class, 'data'])->name('pengeluaran.data');
            Route::resource('/pengeluaran', PengeluaranController::class);


            // Penjualan
            Route::get('/penjualan/data', [PenjualanController::class, 'data'])->name('penjualan.data');
            Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
            Route::get('/penjualan/{id}', [PenjualanController::class, 'show'])->name('penjualan.show');
            Route::delete('/penjualan/{id}', [PenjualanController::class, 'destroy'])->name('penjualan.destroy');

            Route::get('/penjualan/{id}', [PenjualanController::class, 'show'])->name('penjualan.show');
            Route::get('/transaksi/baru', [PenjualanController::class, 'create'])->name('transaksi.baru');
            Route::post('/transaksi/simpan', [PenjualanController::class, 'store'])->name('transaksi.simpan');
            Route::get('/transaksi/selesai', [PenjualanController::class, 'selesai'])->name('transaksi.selesai');
            Route::get('/transaksi/nota-besar', [PenjualanController::class, 'notaBesar'])->name('transaksi.nota_besar');

            // Penjualan_Detail
            Route::get('/transaksi/{id}/data', [PenjualanDetailController::class, 'data'])->name('transaksi.data');
            Route::get('/transaksi/loadform/{diskon}/{total}/{diterima}', [PenjualanDetailController::class, 'loadForm'])->name('transaksi.load_form');
            Route::resource('/transaksi', PenjualanDetailController::class)
            ->except('show'); 

            // Reservasi
            Route::get('/reservasi/new', [ReservasiController::class, 'new'])->name('reservasi.new');
            Route::get('/reservasi/view', [ReservasiController::class, 'view'])->name('reservasi.view');
            Route::get('/reservasi/data', [ReservasiController::class, 'data'])->name('reservasi.data');
            Route::get('/reservasi/data/pelanggan', [ReservasiController::class, 'dataPelanggan'])->name('reservasi.dataPelanggan');
            Route::resource('/reservasi', ReservasiController::class);
                    
            // Service
            Route::get('/service/data', [ServiceController::class, 'data'])->name('service.data');
            Route::resource('/service', ServiceController::class);

            // Sparepart
            Route::get('/sparepart/data', [SparepartController::class, 'data'])->name('sparepart.data');
            Route::post('/sparepart/delete-selected', [SparepartController::class, 'deleteSelected'])->name('sparepart.delete_selected');
            Route::resource('/sparepart', SparepartController::class);

            // setting
            Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
            Route::get('/setting/first', [SettingController::class, 'show'])->name('setting.show');
            Route::post('/setting', [SettingController::class, 'update'])->name('setting.update');

            // supplier
            Route::get('/supplier/data', [SupplierController::class, 'data'])->name('supplier.data');
            Route::resource('/supplier', SupplierController::class);

            // user
            Route::get('/user/data', [UserController::class, 'data'])->name('user.data');
            Route::resource('/user', UserController::class);

            Route::get('/profil', [UserController::class, 'profil'])->name('user.profil');
            Route::get('/show/profil', [UserController::class, 'showProfil'])->name('user.showProfil');
            Route::post('/profil', [UserController::class, 'updateProfil'])->name('user.update_profil');
        });


        // KASIR
        Route::group(['middleware' => 'level:2'], function () {
            // pembelian
            Route::get('/pembelian/data', [PembelianController::class, 'data'])->name('pembelian.data');
            Route::get('/pembelian/{id}/create', [PembelianController::class, 'create'])->name('pembelian.create');
            Route::resource('/pembelian', PembelianController::class)
                ->except('create');

            // pembelian detail
            Route::get('/pembelian_detail/{id}/data', [PembelianDetailController::class, 'data'])->name('pembelian_detail.data');
            Route::get('/pembelian_detail/loadform/{diskon}/{total}', [PembelianDetailController::class, 'loadForm'])->name('pembelian_detail.load_form');
            Route::resource('/pembelian_detail', PembelianDetailController::class)
                ->except('create', 'show', 'edit');

            // Penjualan
            Route::get('/penjualan/data', [PenjualanController::class, 'data'])->name('penjualan.data');
            Route::get('/penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
            Route::get('/penjualan/{id}', [PenjualanController::class, 'show'])->name('penjualan.show');
            Route::delete('/penjualan/{id}', [PenjualanController::class, 'destroy'])->name('penjualan.destroy');

            Route::get('/penjualan/{id}', [PenjualanController::class, 'show'])->name('penjualan.show');
            Route::get('/transaksi/baru', [PenjualanController::class, 'create'])->name('transaksi.baru');
            Route::post('/transaksi/simpan', [PenjualanController::class, 'store'])->name('transaksi.simpan');
            Route::get('/transaksi/selesai', [PenjualanController::class, 'selesai'])->name('transaksi.selesai');
            Route::get('/transaksi/nota-besar', [PenjualanController::class, 'notaBesar'])->name('transaksi.nota_besar');

            // Penjualan_Detail
            Route::get('/transaksi/{id}/data', [PenjualanDetailController::class, 'data'])->name('transaksi.data');
            Route::get('/transaksi/loadform/{diskon}/{total}/{diterima}', [PenjualanDetailController::class, 'loadForm'])->name('transaksi.load_form');
            Route::resource('/transaksi', PenjualanDetailController::class)
            ->except('show'); 
                    
            // Service
            Route::get('/service/data', [ServiceController::class, 'data'])->name('service.data');
            Route::resource('/service', ServiceController::class);

            // Sparepart
            Route::get('/sparepart/data', [SparepartController::class, 'data'])->name('sparepart.data');
            Route::post('/sparepart/delete-selected', [SparepartController::class, 'deleteSelected'])->name('sparepart.delete_selected');
            Route::resource('/sparepart', SparepartController::class);
        });

        // MEKANIK
        Route::group(['middleware' => 'level:3'], function () {
            // Sparepart
            Route::get('/sparepart/data', [SparepartController::class, 'data'])->name('sparepart.data');
            Route::post('/sparepart/delete-selected', [SparepartController::class, 'deleteSelected'])->name('sparepart.delete_selected');
            Route::resource('/sparepart', SparepartController::class);
            
            // Kustomisasi
            Route::get('/kustomisasi/data', [KustomisasiController::class, 'data'])->name('kustomisasi.data');
            Route::resource('/kustomisasi', KustomisasiController::class);
        });

        // PEMILIK
        Route::group(['middleware' => 'level:4'], function () {
            // Laporan
            Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
            Route::get('/laporan/data/{awal}/{akhir}', [LaporanController::class, 'data'])->name('laporan.data');
            Route::get('/laporan/pdf/{awal}/{akhir}', [LaporanController::class, 'exportPDF'])->name('laporan.export_pdf');

            // setting
            Route::get('/setting', [SettingController::class, 'index'])->name('setting.index');
            Route::get('/setting/first', [SettingController::class, 'show'])->name('setting.show');
            Route::post('/setting', [SettingController::class, 'update'])->name('setting.update');
        });

         // Pelanggan
         Route::group(['middleware' => 'level:0'], function () {
            // Kustomisasi
            Route::get('/kustomisasi/data', [KustomisasiController::class, 'data'])->name('kustomisasi.data');
            Route::resource('/kustomisasi', KustomisasiController::class);

            // Reservasi
            Route::get('/reservasi/new', [ReservasiController::class, 'new'])->name('reservasi.new');
            Route::get('/reservasi/view', [ReservasiController::class, 'view'])->name('reservasi.view');
            Route::get('/reservasi/data', [ReservasiController::class, 'data'])->name('reservasi.data');
            Route::get('/reservasi/data/pelanggan', [ReservasiController::class, 'dataPelanggan'])->name('reservasi.dataPelanggan');
            Route::resource('/reservasi', ReservasiController::class);
        });
    });