<?php

namespace App\Console\Commands;

use App\Models\Artikel;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteOldArtikel extends Command
{
    protected $signature = 'artikel:delete-old';
    protected $description = 'Menghapus artikel yang lebih dari 20 hari';
    /**
     * Execute the console command.
     */

     public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
                // Tentukan batas tanggal (30 hari yang lalu)
                $thirtyDaysAgo = Carbon::now()->subDays(30);

                // Cari semua kabar yang lebih dari 30 hari dan hapus
                $oldartikels = Artikel::where('tanggal_terbit', '<', $thirtyDaysAgo)->get();
        
                $this->info('Jumlah artikel yang akan dihapus: ' . $oldartikels->count());
        
                foreach ($oldartikels as $artikel) {
                    $artikel->delete();
                    $this->info('Menghapus Artikel: ' . $artikel->judul_artikel);
                }
        
                $this->info('Proses penghapusan artikel yang lebih dari 20 hari selesai.');
        
    }
}
