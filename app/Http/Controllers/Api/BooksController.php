<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreBooksRequest;
use App\Http\Requests\UpdateBooksRequest;
use App\Models\Book;
use Exception;
use Illuminate\Http\Request;

class BooksController extends Controller
{
    public function index()
    {
        try {
            $posts = Book::all();
            return response()->json([
                "code" => 200,
                "data" => $posts,
                "success" => true,
                "message" => "Success mengambil seluruh data buku!"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "code" => 500,
                "data" => null,
                "success" => false,
                "message" => "Terjadi kesalahan saat mengambil seluruh data buku!"
            ], 500);
        }
    }

    public function store(StoreBooksRequest $request)
    {
        try {
            Book::create([
                "title" => $request->title,
                "description" => $request->description,
                "author" => $request->author,
            ]);

            return response()->json([
                "code" => 201,
                "success" => true,
                "message" => "Berhasil Menambahkan Data buku!"
            ], 201);
        } catch (Exception $e) {
            return response()->json([
                "code" => 500,
                "success" => false,
                "message" => "Terjadi kesalahan saat menambahkan data buku: " . $e->getMessage(),
            ], 500);
        }
    }

    public function show(string $id)
    {
        try {
            $post = Book::find($id);
            if (!$post) {
                return response()->json([
                    "code" => 404,
                    "data" => null,
                    "success" => false,
                    "message" => "Data buku tidak ditemukan!"
                ], 404);
            }
            return response()->json([
                "code" => 200,
                "data" => $post,
                "success" => true,
                "message" => "Success mengambil data buku!"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "code" => 500,
                "data" => null,
                "success" => false,
                "message" => "Terjadi kesalahan saat mengambil seluruh data buku!" . $e->getMessage()
            ], 500);
        }
    }

    public function update(UpdateBooksRequest $request, string $id)
    {
        try {
            $post = Book::find($id);

            if (!$post) {
                return response()->json([
                    "code" => 404,
                    "success" => false,
                    "message" => "Data buku tidak ditemukan!"
                ], 404);
            }

            $post->update([
                "title" => $request->title,
                "description" => $request->description,
                "author" => $request->author,
            ]);

            return response()->json([
                "code" => 200,
                "success" => true,
                "message" => "Berhasil Memperbarui Data buku!"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "code" => 500,
                "success" => false,
                "message" => "Terjadi kesalahan saat memperbarui data buku: " . $e->getMessage(),
            ], 500);
        }
    }

    public function destroy(string $id)
    {
        try {
            $post = Book::find($id);
            if (!$post) {
                return response()->json([
                    "code" => 404,
                    "data" => null,
                    "success" => false,
                    "message" => "Data buku tidak ditemukan!"
                ], 404);
            }
            $post->delete();
            return response()->json([
                "code" => 200,
                "success" => true,
                "message" => "Berhasil Menghapus Data buku!"
            ], 200);
        } catch (Exception $e) {
            return response()->json([
                "code" => 500,
                "success" => false,
                "message" => "Terjadi kesalahan saat menghapus data buku: " . $e->getMessage(),
            ], 500);
        }
    }
}
