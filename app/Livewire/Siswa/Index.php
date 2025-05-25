<?php

namespace App\Livewire\Siswa; 

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Siswa;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    public $numpage = 10;
    public $search;


    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $query = Siswa::query();

        if (!empty($this->search)) {
            $query->where(function ($q) {
                $q->where('nama', 'like', '%' . $this->search . '%')
                ->orWhere('nisn', 'like', '%' . $this->search . '%');
            });
        }

        $siswaList = $query->paginate($this->numpage);

        return view('livewire.siswa.index', [
            'siswaList' => $siswaList,
        ]);
    }

    public function ketGender($gender)
    {
        return $gender === 'L' ? 'Laki-laki' :
               ($gender === 'P' ? 'Perempuan' : 'Status tidak diketahui');
    }

    public function ketStatusPKL($status)
    {
        return $status === 0 ? 'Belum diterima PKL' :
               ($status === 1 ? 'Sudah diterima PKL' : 'Status tidak diketahui');
    }

    public function delete($id)
    {
        Siswa::findOrFail($id)->delete();
        session()->flash('message', 'Data siswa berhasil dihapus.');
    }

    public function updatePageSize($size)
    {
        $this->numpage = $size;
    }
}