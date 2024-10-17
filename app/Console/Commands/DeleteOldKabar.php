<?php

namespace App\Console\Commands;

use App\Models\Kabar;
use Carbon\Carbon;
use Illuminate\Console\Command;

class DeleteOldKabar extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kabar:delete-old';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Menghapus Kabar yang sudah melewati tanggal berlaku';

    /**
     * Execute the console command.
     */
    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        $today = Carbon::now();

        // Cari kabar yang tanggal berlakunya sudah lewat
        $expiredKabars = Kabar::where('tanggal_berlaku', '<', $today)->get();

        $this->info('Jumlah kabar yang akan dihapus: ' . $expiredKabars->count());

        foreach ($expiredKabars as $kabar) {
            $this->info('Menghapus kabar: ' . $kabar->judul_kabar);
            $kabar->delete();
        }

        $this->info('Proses penghapusan kabar selesai.');
    }
}
