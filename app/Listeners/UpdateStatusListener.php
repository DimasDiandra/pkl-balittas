<?php

namespace App\Listeners;

use App\Events\UpdateStatus;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use App\Models\Projek;

class UpdateStatusListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  UpdateStatus  $event
     * @return void
     */
    public function handle(UpdateStatus $event)
    {
        $status = $event->projek;
        $projek = Projek::where('id', $status->id)->first();
        $projek->all_status = ($projek->matriks_status + $projek->rab_status + $projek->kak_status + $projek->analisis_status + $projek->proposal_status + $projek->bulanan_status + $projek->triwulan_status + $projek->tengahtahun_status + $projek->akhirtahun_status + $projek->renaksi_status + $projek->destudi_status) * 100 / 33;
        $projek->save();
    }
}
