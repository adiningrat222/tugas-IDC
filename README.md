# Dokumentasi API

## Daftar Endpoint

1. [GET] /api/books - Mengambil semua data buku
2. [POST] /api/books - Menambahkan data buku
3. [GET] /api/books/{id} - Mengambil detail buku berdasarkan ID
4. [PUT] /api/books/{id}/update - Memperbarui data buku berdasarkan ID
5. [DELETE] /api/books/{id}/delete - Menghapus data buku berdasarkan ID

---

## 1. Mengambil Semua Data Buku
**Endpoint:**
```http
GET /api/books
```
**Respon Sukses (200):**
```json
{
    "code": 200,
    "data": [
        {
            "id": 1,
            "title": "Judul Buku",
            "description": "Deskripsi Buku",
            "author": "Nama Penulis"
        }
    ],
    "success": true,
    "message": "Success mengambil seluruh data buku!"
}
```

**Respon Gagal (500 - Internal Server Error):**
```json
{
    "code": 500,
    "data": null,
    "success": false,
    "message": "Terjadi kesalahan saat mengambil seluruh data buku!"
}
```

---

## 2. Menambahkan Data Buku
**Endpoint:**
```http
POST /api/books
```
**Request Body:**
```json
{
    "title": "Judul Buku",
    "description": "Deskripsi Buku",
    "author": "Nama Penulis"
}
```
**Respon Sukses (201):**
```json
{
    "code": 201,
    "success": true,
    "message": "Berhasil Menambahkan Data buku!"
}
```

**Respon Gagal (422 - Validasi Gagal):**
```json
{
    "code": 422,
    "success": false,
    "message": "Validasi gagal",
    "errors": {
        "title": ["Judul minimal 5 karakter!"],
        "description": ["Deskripsi harus diisi!"],
        "author": ["Nama author harus diisi!"]
    }
}
```

---

## 3. Mengambil Detail Buku Berdasarkan ID
**Endpoint:**
```http
GET /api/books/{id}
```
**Respon Sukses (200):**
```json
{
    "code": 200,
    "data": {
        "id": 1,
        "title": "Judul Buku",
        "description": "Deskripsi Buku",
        "author": "Nama Penulis"
    },
    "success": true,
    "message": "Success mengambil data buku!"
}
```

**Respon Gagal (404 - Buku Tidak Ditemukan):**
```json
{
    "code": 404,
    "data": null,
    "success": false,
    "message": "Data buku tidak ditemukan!"
}
```

---

## 4. Memperbarui Data Buku Berdasarkan ID
**Endpoint:**
```http
PUT /api/books/{id}/update
```
**Request Body:**
```json
{
    "title": "Judul Buku Baru",
    "description": "Deskripsi Buku Baru",
    "author": "Nama Penulis Baru"
}
```
**Respon Sukses (200):**
```json
{
    "code": 200,
    "success": true,
    "message": "Berhasil Memperbarui Data buku!"
}
```

**Respon Gagal (404 - Buku Tidak Ditemukan):**
```json
{
    "code": 404,
    "success": false,
    "message": "Data buku tidak ditemukan!"
}
```

**Respon Gagal (422 - Validasi Gagal):**
```json
{
    "code": 422,
    "success": false,
    "message": "Validasi gagal",
    "errors": {
        "title": ["Judul minimal 5 karakter!"],
        "description": ["Deskripsi harus diisi!"],
        "author": ["Nama author harus diisi!"]
    }
}
```

---

## 5. Menghapus Data Buku Berdasarkan ID
**Endpoint:**
```http
DELETE /api/books/{id}/delete
```
**Respon Sukses (200):**
```json
{
    "code": 200,
    "success": true,
    "message": "Berhasil Menghapus Data buku!"
}
```

**Respon Gagal (404 - Buku Tidak Ditemukan):**
```json
{
    "code": 404,
    "data": null,
    "success": false,
    "message": "Data buku tidak ditemukan!"
}
```
