## Data Mahasiswa
Nama    : Nasywan Hanif
NIM     : 1202204274
Kelas   : SI-44-08

##  Tentang Projek
Projek berjudul sistem informasi perpustakaan ini merupakan tugas pengganti UTS dari mata kuliah INTEGRASI APLIKASI ENTERPRISE. Sistem informasi perpustakaan ini ditujukan untuk bisa menampilkan data dari student atau mahasiswa dan juga daftar buku yang berisikan informasi id, pengarang, penerbit dll, namun karena dalam tugas ini hanya diperuntukan untuk membuat beberapa end point saja, sehingga saya membuatnya sesuai dengan kebutuhan.

## Uraian Endpoint

*Endpoint projek sistem informasi perpustakaan*

| No  | Students Endpoint          | Method | Deskripsi                                         |
| --- | -------------------------- | ------ | ------------------------------------------------- |
| 1   | `students/`                | `GET`  | Menampilkan data student keseluruhan              |
| 2   | `students/store`           | `POST` | Menambahkan data student                          |
| 3   | `students/{id}`            | `GET`  | Menampilkan daata student berdasarkan id          |
| 4   | `students/{id}/edit`       | `PUT`  | Mengubah/memperbarui data student                 |
| 5   | `students/{id}/delete`     |`DELETE`| Menghapus data student                            |
| 6   | `buku/`                    | `GET`  | Menampilkan data buku keseluruhan                 |
| 7   | `students/store`           | `POST` | Menambahkan data buku                             |
| 8   | `buku/{id}`                | `GET`  | Menampilkan data buku berdasarkan id tertentu     |




