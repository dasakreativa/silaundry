<?php

$error['not-found']['title']                  = 'Halaman Tidak Ada';
$error['forbidden']['title']                  = 'Halaman Tidak Dapat Diakses!';
$error['unauthorized']['title']               = 'Halaman Tidak Dapat Diakses!';
$error['page-expired']['title']               = 'Halaman Kadaluarsa!';
$error['many-request']['title']               = 'Kesalahan Tak Terduga!';
$error['server-error']['title']               = 'Kesalahan Tak Terduga!';
$error['service-unavailable']['title']        = 'Kesalahan Tak Terduga!';

$error['not-found']['description']            = 'Halaman yang anda akses kali ini tidak dapat disajikan, karena anda mungkin salah ketik atau memang halamannya sudah dipindahkan dan atau sudah dihapus.';
$error['forbidden']['description']            = 'Halaman yang anda akses kali ini tidak dapat disajikan, karena tidak memiliki izin dari pemilik karena terdapat berkas yang sangat berbahaya.';
$error['unauthorized']['description']         = 'Halaman yang anda akses kali ini tidak dapat disajikan, karena anda belum terautentikasi.';
$error['page-expired']['description']         = 'Dikarenakan token CSRF yang anda kirim sudah kadaluarsa. Silahkan kembali dan muat ulang halamannya.';
$error['many-request']['description']         = 'Anda mengirimkan banyak sekali permintaan, sehingga peladen tidak dapat melayani permintaan anda.';
$error['server-error']['description']         = 'Ada bug di kodingan! silahkan hubungi administrator untuk di cek lebih lanjut.';
$error['service-unavailable']['description']  = 'Kami tidak dapat melayani anda sekarang.';

$error['button']['back']                      = 'Kembali';

return $error;
