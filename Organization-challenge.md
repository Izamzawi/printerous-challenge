# Printerous Code Challenge
---

Buatlah sebuah website sederhana menggunakan bahasa pemrograman dan framework yang anda kuasai (prefer: Laravel or Ruby on Rails). Aplikasi yang akan anda buat bertujuan untuk mencatat semua customer dari Printerous.

Untuk dapat menggunakan aplikasi ini, user harus login menggunakan email dan password.
Aplikasi ini akan menampilkan list dari customer Printerous.
User dapat menambah, memperbarui, dan menghapus data customer (kita sebut `Organization`).
User juga dapat melakukan pencarian dengan satu keyword untuk mencari berdasarkan nama perusahaan atau nama PIC.

Data yang harus dimasukkan untuk mendaftarkan sebuah Organization adalah sebagai berikut:
- name
- phone
- email
- website
- logo (upload image)

Setiap Organization memiliki banyak PIC yang bisa kita hubungi. Kita sebut PIC ini sebagai `Person`.
List Person dari setiap Organization harus ditampilkan pada halaman detil Organization tersebut.
Setiap Person harus memiliki data berikut ini:
- name
- email
- phone
- avatar (upload image)

Setiap Organization akan ditangani oleh seorang Account Manager.
Account Manager hanya dapat didaftarkan ke dalam aplikasi oleh Admin Sistem.
Account Manager dapat login dan me-manage (create, update, delete) data sebuah Organization jika dia sudah di-assign untuk menangani Organization tersebut. Account Manager juga dapat menambahkan, memperbarui dan menghapus list Person dari sebuah Organization.

Jika logged in User yang BUKAN merupakan Account Manager dari Organization, maka dia hanya dapat melihat data Organization tersebut.

Silakan gunakan Framework CSS seperti `bootstrap` untuk membuat tampilan lebih baik.

Jika anda telah menyelesaikan project ini, kirimkan `.git` project repository anda kepada kami.
Silakan kirim email ke `wawan@printerous.com` dengan subject `Printerous Code Challenge - [Your Name]`.