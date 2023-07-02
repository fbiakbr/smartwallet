<?php

namespace App\Controllers;

use App\Models\Kelas;
use App\Models\Saldo;
use App\Models\Siswa;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Controllers\BaseController;

class Home extends BaseController
{
    public function index()
    {
        $siswa = new Siswa();
        $data = [
            'siswa' => $siswa->findAll(),
        ];
        return view('index', $data);
    }
    public function smartwallet()
    {
        $siswa = new Siswa();
        $kelas = new Kelas();
        $saldo = new Saldo();
        $pemasukan = new Pemasukan();
        $pengeluaran = new Pengeluaran();
        $rfid = $this->request->getPost('rfid');
        $data = [
            'siswa' => $siswa->where('rfid', $rfid)->first(),
            'nama_kelas' => $kelas->where('id_kelas', $siswa->where('rfid', $rfid)->first()['kelas'])->first()['nama_kelas'],
            'saldo' => $saldo->where('nis', $siswa->where('rfid', $rfid)->first()['nis'])->first()['saldo'] ?? 0,
            'pemasukan' => $pemasukan->where('nis', $siswa->where('rfid', $rfid)->first()['nis'])->findAll(),
            'pengeluaran' => $pengeluaran->where('nis', $siswa->where('rfid', $rfid)->first()['nis'])->findAll(),
        ];
        return view('smartwallet', $data);
    }
}
