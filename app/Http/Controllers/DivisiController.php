<?php

namespace App\Http\Controllers;

use App\Models\Divisi;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class DivisiController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware(function ($request, $next) {
                $user = auth()->user();
                $currentUserJabatan = strtolower($user->anggota?->jabatan ?? '');
                $isAuthorized = in_array($currentUserJabatan, ['ketua', 'wakil ketua', 'sekretaris'], true) || $user->name === 'admin';

                if (!$isAuthorized) {
                    abort(403, 'Anda tidak memiliki hak akses untuk mengelola divisi.');
                }

                return $next($request);
            }),
        ];
    }

    public function index()
    {
        $divisis = Divisi::orderBy('nama_divisi')->get();
        return view('divisi.index', compact('divisis'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_divisi' => 'required|string|max:100|unique:divisi,nama_divisi',
        ]);

        Divisi::create($request->all());

        return redirect()->route('divisi.index')->with('success', 'Divisi berhasil ditambahkan.');
    }

    public function update(Request $request, Divisi $divisi)
    {
        $request->validate([
            'nama_divisi' => 'required|string|max:100|unique:divisi,nama_divisi,' . $divisi->id_divisi . ',id_divisi',
        ]);

        $divisi->update($request->all());

        return redirect()->route('divisi.index')->with('success', 'Divisi berhasil diperbarui.');
    }

    public function destroy(Divisi $divisi)
    {
        $divisi->delete();

        return redirect()->route('divisi.index')->with('success', 'Divisi berhasil dihapus.');
    }
}
