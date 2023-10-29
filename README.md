cara menjalankan program di github :
- buka di vsc dan akun github-nya
- composer install lewat terminal

jika error
- buka file xampp, file php, cari php.ini
- cari zip dan buka komentar
- balik vsc
- composer install lewat terminal
- tunggu selesai install
- selanjutnya copy .env.example dan ubah namanya .env
- php artisan key:generate
- php artisan serve untuk menjalankan program

Saat menghubungkan dengan database
- gunakan database phpMyAdmin
- periksa .env databasenya sesuai dengan yang dipakai
- 

buat controller:
- php artisan make:controller namaController -–resource

buat project:
- composer create-project laravel/laravel (project name)

buat model:
- php artisan make:model (nama model)

utk membuat table:
php artisan migrate:make create_(namaTabel)_table

https://laravel.com/docs/4.2/quick

mysql workbench:
mysql : (nama laravel di workbench)

mysql migrate:
php artisan make:migration <nama-migration> -- create=<nama-tabel>
Cara membuat data di php : 
 Schema::create('mahasiswas', function (Blueprint $table) {
$table->string(‘nama’)->first();
}
