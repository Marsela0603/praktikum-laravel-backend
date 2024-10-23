<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AnimalController extends Controller
{
    public $animals = ["bird", "dog", "horse"];

    // Menampilkan semua data hewan
    public function index()
    {
        $animalList = [];
        foreach ($this->animals as $key => $animal) {
            $animalList[] = [
                'id' => $key,
                'name' => $animal
            ];
        }
        return response()->json($animalList);  
    }

    // Menambah data animals
    public function store(Request $request)
    {
        // Menambahkan data hewan baru
        array_push($this->animals, $request->animal);

        return response()->json([
            'message' => 'Hewan berhasil ditambahkan!',
            'animals' => $this->animals
        ]);
    }

    // Mengupdate data animals
    public function update(Request $request, $id)
    {
        if (isset($this->animals[$id])) {
            $this->animals[$id] = $request->animal;  // Update nama hewan berdasarkan id
            return response()->json([
                'message' => 'Hewan berhasil diubah!',
                'animals' => $this->animals
            ]);
        }

        return response()->json(['message' => 'Hewan tidak ditemukan'], 404);
    }

    // Menghapus data animals
    public function destroy($id)
    {
        if (isset($this->animals[$id])) {
            // Menghapus hewan berdasarkan id
            array_splice($this->animals, $id, 1);
            return response()->json([
                'message' => 'Hewan berhasil dihapus!',
                'animals' => $this->animals
            ]);
        }

        return response()->json(['message' => 'Hewan tidak ditemukan'], 404);
    }
}
