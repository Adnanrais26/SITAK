<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\RedirectController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DaftarAkunController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\GantiPasswordController;
use App\Http\Controllers\KategoriObatController;
use App\Http\Controllers\JenisObatController;
use App\Http\Controllers\UnitController;
use App\Http\Controllers\ObatController;
use App\Http\Controllers\PengeluaranController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PembayaranPiutangController;
use App\Http\Controllers\JenisPengeluaranController;
use App\Http\Controllers\LaporanPengeluaranController;
use App\Http\Controllers\LaporanPenjualanController;
use App\Http\Controllers\LaporanPendapatanController;
use App\Http\Controllers\ReturController;
use App\Http\Controllers\LaporanReturController;
use App\Http\Controllers\ResepController;
use App\Http\Controllers\StokOpnameController;
use App\Http\Controllers\BarcodeController;
use App\Http\Controllers\StrukController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//  jika user belum login
Route::group(['middleware' => 'guest'], function() {
    Route::get('/', [AuthController::class, 'login'])->name('login');
    Route::post('/', [AuthController::class, 'dologin']);

});

// untuk superadmin dan pegawai
Route::group(['middleware' => ['auth', 'checkrole:1,2,3']], function() {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/redirect', [RedirectController::class, 'cek']);
});


// untuk superadmin
Route::group(['middleware' => ['auth', 'checkrole:1']], function() {
    //Akun
    
    Route::get('/dashboard', [DashboardController::class, 'index']);
    
    Route::resource('daftarakun', DaftarAkunController::class);
    Route::put('daftarakun', [DaftarAkunController::class, 'aktif'])->name('daftarakun.aktif');
    
    Route::resource('gantipassword', GantiPasswordController::class);
    Route::get('/gantipassword', [GantiPasswordController::class, 'index']);

    Route::get('/profile', [ProfileController::class, 'index']);

    //Gudang
    //-Kategori
    Route::resource('kategoriObat', KategoriObatController::class);
    Route::get('/kategoriObat', [KategoriObatController::class, 'index']);
    Route::put('kategoriObat', [KategoriObatController::class, 'aktif'])->name('kategoriObat.aktif');
    
    //-Jenis
    Route::resource('jenisObat', JenisObatController::class);
    Route::get('/jenisObat', [JenisObatController::class, 'index']);
    Route::put('jenisObat', [JenisObatController::class, 'aktif'])->name('jenisObat.aktif');

    //-Unit
    Route::resource('unit', UnitController::class);
    Route::get('/unit', [UnitController::class, 'index']);
    Route::put('unit', [UnitController::class, 'aktif'])->name('unit.aktif');

    //-Obat
    Route::resource('obat', ObatController::class);
    Route::get('/obat', [ObatController::class, 'index']);
    Route::put('obat', [ObatController::class, 'aktif'])->name('obat.aktif');
    
    //Transaksi
    //-Pembayaran Piutang 
    Route::resource('pembayaranPiutang', PembayaranPiutangController::class);
    Route::get('/pembayaranPiutang', [PembayaranPiutangController::class, 'index']);
    Route::put('pembayaranPiutang', [PembayaranPiutangController::class, 'aktif'])->name('pembayaranPiutang.aktif');

    //-Pembelian Obat
    Route::resource('pengeluaran', PengeluaranController::class);
    Route::get('/pengeluaran', [PengeluaranController::class, 'index']);
    Route::put('pengeluaran', [PengeluaranController::class, 'aktif'])->name('pengeluaran.aktif');

    //-Penjualan 
    Route::resource('penjualan', PenjualanController::class);
    Route::get('penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
    Route::put('penjualan', [PenjualanController::class, 'aktif'])->name('penjualan.aktif');
    Route::get('penjualan', [PenjualanController::class, 'search'])->name('penjualan.search');
    Route::post('penjualan', [PenjualanController::class, 'store'])->name('penjualan.store');
    Route::post('penjualan/struk', 'App\Http\Controllers\PenjualanController@struk');
    
    //Laporan
    // -Laporan Pengeluaran
    Route::resource('laporanPengeluaran', LaporanPengeluaranController::class);
    Route::get('laporanPengeluaran', [LaporanPengeluaranController::class, 'index'])->name('laporanPengeluaran.index');
    // -Laporan Penjualan
    Route::resource('laporanPenjualan', LaporanPenjualanController::class);
    Route::get('laporanPenjualan', [LaporanPenjualanController::class, 'index'])->name('laporanPenjualan.index');
    // -Laporan Pendapatan
    Route::resource('laporanPendapatan', LaporanPendapatanController::class);
    Route::get('laporanPendapatan', [LaporanPendapatanController::class, 'index'])->name('laporanPendapatan.index');
    // -Laporan Retur
    Route::resource('laporanRetur', LaporanReturController::class);
    Route::get('laporanRetur', [LaporanReturController::class, 'index'])->name('laporanRetur.index');

    //Apotek
    //-Jenis Pengeluaran
    Route::resource('jenisPengeluaran', JenisPengeluaranController::class);
    Route::get('/jenisPengeluaran', [JenisPengeluaranController::class, 'index']);
    Route::put('jenisPengeluaran', [JenisPengeluaranController::class, 'aktif'])->name('jenisPengeluaran.aktif');
    
    //Menambah Retur
    Route::resource('retur', ReturController::class);
    Route::get('/retur', [ReturController::class, 'index']);
    Route::put('retur', [ReturController::class, 'aktif'])->name('retur.aktif');
    Route::get('retur', [ReturController::class, 'search'])->name('retur.search');

    //-Barcode
    Route::resource('barcode', BarcodeController::class);
    Route::get('/barcode', [BarcodeController::class, 'index']);
    Route::put('barcode', [BarcodeController::class, 'aktif'])->name('barcode.aktif');




    //Menambah Resep
    Route::resource('resep', ResepController::class);
    Route::get('/resep', [ResepController::class, 'index']);
    Route::put('resep', [ResepController::class, 'aktif'])->name('resep.aktif');
    Route::get('resep', [ResepController::class, 'search'])->name('resep.search');

    //Stok Opname
    //-Stok Opname
    Route::resource('stokOpname', StokOpnameController::class);
    Route::get('/stokOpname', [StokOpnameController::class, 'index']);
});

// untuk pegawai
Route::group(['middleware' => ['auth', 'checkrole:2']], function() {
    Route::get('/kasboard', [DashboardController::class, 'index']);

        //Akun
    
    Route::resource('kasgantipassword', GantiPasswordController::class);
    Route::get('/kasgantipassword', [GantiPasswordController::class, 'index']);

    Route::get('/kasprofile', [ProfileController::class, 'index']);

    //-Penjualan 
    Route::resource('penjualan', PenjualanController::class);
    Route::get('penjualan', [PenjualanController::class, 'index'])->name('penjualan.index');
    Route::put('penjualan', [PenjualanController::class, 'aktif'])->name('penjualan.aktif');
    Route::get('penjualan', [PenjualanController::class, 'search'])->name('penjualan.search');
    Route::post('penjualan', [PenjualanController::class, 'store'])->name('penjualan.store');
    Route::post('penjualan/struk', 'App\Http\Controllers\PenjualanController@struk');
    
    Route::resource('struk', StrukController::class);
    // Route::get('struk/{id}', [StrukController::class, 'index'])->name('penjualan.index');
    Route::get('struk/{id}', [StrukController::class, 'show'])->name('penjualan.show');


});
// untuk pemilik
Route::group(['middleware' => ['auth', 'checkrole:3']], function() {
    Route::get('/pemboard', [DashboardController::class, 'index']);
    
    Route::resource('pemgantipassword', GantiPasswordController::class);
    Route::get('/pemgantipassword', [GantiPasswordController::class, 'index']);

    Route::get('/pemprofile', [ProfileController::class, 'index']);

    //Laporan
    // -Laporan Pengeluaran
    Route::resource('pemlaporanPengeluaran', LaporanPengeluaranController::class);
    Route::get('pemlaporanPengeluaran', [LaporanPengeluaranController::class, 'index'])->name('laporanPengeluaran.index');
    // -Laporan Penjualan
    Route::resource('/pemlaporanPenjualan', LaporanPenjualanController::class);
    Route::get('/pemlaporanPenjualan', [LaporanPenjualanController::class, 'index'])->name('laporanPenjualan.index');
   
    // -Laporan Pendapatan
    Route::resource('pemlaporanPendapatan', LaporanPendapatanController::class);
    Route::get('pemlaporanPendapatan', [LaporanPendapatanController::class, 'index'])->name('laporanPendapatan.index');
   
    // -Laporan Retur
    Route::resource('pemlaporanRetur', LaporanReturController::class);
    Route::get('pemlaporanRetur', [LaporanReturController::class, 'index'])->name('laporanRetur.index');

    //Stok Opname
    //-Stok Opname
    Route::resource('pemstokOpname', StokOpnameController::class);
    Route::get('/pemstokOpname', [StokOpnameController::class, 'index']);
});