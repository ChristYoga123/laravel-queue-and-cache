# Laravel Queue dan Cache

Untuk pembelajaran ini, saya akan mencoba untuk mengaplikasikan penggunaan queue dan cache untuk mempercepat kinerja Laravel sehingga performa semakin optimal dan berjalan secara async.

Untuk queue berada di branch Queue

Untuk cache berada di branch Cache

### Proyek Implementasi

Saya akan membuat API untuk melakukan CRUD Data Buku sederhana yang berisi:

<ul>
    <li>Judul</li>
    <li>Gambar</li>
</ul>

Selain itu, saya akan mengimplementasikan Push Mail Notification dan Login System untuk mengakses API dengan menggunakan queue.

Konfigurasi Queue dasar pada .env Laravel adalah:

```
QUEUE_CONNECTION=database // bebas mengikuti driver yang disediakan seperti: database, redis, sqs, dan aws
```
