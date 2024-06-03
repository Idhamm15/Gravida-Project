<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    public function admin_artikel()
    {
        $artikels = Artikel::all();
        return view('pages.admin.artikel.index', compact('artikels'));
    }
    public function admin_artikel_store(Request $request)
    {
        // Validasi input
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'description2' => 'nullable|string',
            'description3' => 'nullable|string',
        ]);
    
        // Ambil input dari form
        $image = $request->input('image');
        $name = $request->input('name');
        $description = $request->input('description');
        $description2 = $request->input('description2');
        $description3 = $request->input('description3');
        
        // Upload gambar
        $nameImage = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $nameImage = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $nameImage);
        }
    
        
        // Simpan data ke database
        $artikel = new Artikel;
        $artikel->image = $nameImage;
        $artikel->name = $name;
        $artikel->description = $description;
        $artikel->description2 = $description2;
        $artikel->description3 = $description3;
    
        $artikel->save();
    
        // Redirect ke halaman kelola artikel dengan pesan sukses
        return redirect()->to('/admin/artikel/kelola-artikel')->with('success', 'Artikel created successfully.');
    }

    public function admin_artikel_update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'description2' => 'nullable|string',
            'description3' => 'nullable|string',
        ]);

        // Temukan data artikel berdasarkan id
        $artikel = Artikel::find($id);

        if (!$artikel) {
            return redirect()->back()->with('error', 'Data artikel tidak ditemukan.');
        }

        // Ambil input dari form
        $image = $request->input('image');
        $name = $request->input('name');
        $description = $request->input('description');
        $description2 = $request->input('description2');
        $description3 = $request->input('description3');
        
        // Upload gambar jika ada
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($artikel->image) {
                $oldImagePath = public_path('/images' . $artikel->image);
                if (file_exists($oldImagePath)) {
                    unlink($oldImagePath);
                }
            }

            // Upload gambar baru
            $image = $request->file('image');
            $nameImage = time() . '.' . $image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $nameImage);
            $artikel->image = $nameImage;
        }

        // Simpan data ke database
        $artikel->name = $name;
        $artikel->description = $description;
        $artikel->description2 = $description2;
        $artikel->description3 = $description3;
    
        // Simpan perubahan
        $artikel->save();

        // Redirect dengan pesan sukses
        return redirect('/admin/artikel/kelola-artikel')->with('success', 'Data artikel berhasil diperbarui.');
    }

    public function admin_artikel_delete($id) {
          // Temukan data artikel berdasarkan ID
    $artikel = Artikel::findOrFail($id);

    // Hapus data dari database
    $artikel->delete();

    // Redirect ke halaman yang sesuai dengan pesan sukses
    return redirect()->to('/admin/artikel/kelola-artikel')->with('success', 'Artikel berhasil dihapus.');
    }
}
