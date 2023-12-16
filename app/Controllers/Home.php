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
        $rfid = $this->request->getPost('rfid');
        $siswa = new Siswa();
        $kelas = new Kelas();
        $saldo = new Saldo();
        $pemasukan = new Pemasukan();
        $pengeluaran = new Pengeluaran();
        $data = [
            'siswa' => $siswa->where('rfid', $rfid)->first(),
        ];
        if ($data['siswa'] != null) {
            session()->set('rfid', $rfid);
            $data = [
                'siswa' => $siswa->where('rfid', $rfid)->first(),
                'nama_kelas' => $kelas->where('id_kelas', $siswa->where('rfid', $rfid)->first()['kelas'])->first()['nama_kelas'],
                'saldo' => $saldo->where('nis', $siswa->where('rfid', $rfid)->first()['nis'])->first()['saldo'] ?? 0,
                'pemasukan' => $pemasukan->where('nis', $data['siswa']['nis'])->findAll(),
                'pengeluaran' => $pengeluaran->where('nis', $data['siswa']['nis'])->findAll(),
            ];
            return view('smartwallet', $data);
        } else {
            return redirect()->to(base_url('/home/index'));
        }
    }
    public function login()
    {
        $siswa = new Siswa();
        $data = [
            'siswa' => $siswa->findAll(),
        ];
        return view('login', $data);
    }
    public function smartwallet2()
    {
        $nis = $this->request->getPost('nis');
        $pin = $this->request->getPost('pin');
        $siswa = new Siswa();
        $kelas = new Kelas();
        $saldo = new Saldo();
        $pemasukan = new Pemasukan();
        $pengeluaran = new Pengeluaran();
        $data = [
            'siswa' => $siswa->where('nis', $nis)->first(),
        ];
        if ($data['siswa'] != null) {
            if ($data['siswa']['pin'] == $pin) {
                session()->set('nis', $nis);
                session()->set('pin', $pin);
                $rfid = $siswa->where('nis', $nis)->first()['rfid'];
                $data = [
                    'siswa' => $siswa->where('rfid', $rfid)->first(),
                    'nama_kelas' => $kelas->where('id_kelas', $siswa->where('rfid', $rfid)->first()['kelas'])->first()['nama_kelas'],
                    'saldo' => $saldo->where('nis', $siswa->where('rfid', $rfid)->first()['nis'])->first()['saldo'] ?? 0,
                    'pemasukan' => $pemasukan->where('nis', $siswa->where('rfid', $rfid)->first()['nis'])->findAll(),
                    'pengeluaran' => $pengeluaran->where('nis', $siswa->where('rfid', $rfid)->first()['nis'])->findAll(),
                ];
                return view('smartwallet', $data);
            } else {
                session()->setFlashdata('error', 'PIN yang anda masukkan salah');
                return redirect()->to(base_url('home/login'));
            }
        } else {
            return redirect()->to(base_url('home/login'));
        }
    }
    public function account_settings()
    {
        $siswa = new Siswa();
        $kelas = new Kelas();
        $rfid = $siswa->where('nis', session()->get('nis'))->first()['rfid'];
        $data = [
            'siswa' => $siswa->where('rfid', $rfid)->first(),
            'nama_kelas' => $kelas->where('id_kelas', $siswa->where('rfid', $rfid)->first()['kelas'])->first()['nama_kelas'],
        ];
        return view('account_settings', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('home/login'));
    }
}
