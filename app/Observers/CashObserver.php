<?php

namespace App\Observers;

use App\Models\Cash;

class CashObserver
{
    /**
     * Handle the Cash "created" event.
     *
     * @param  \App\Models\Cash  $cash
     * @return void
     */
    public function created(Cash $cash)
    {
        $cashes = Cash::orderBy('created_at')->get();
        $total = 0;
        foreach( $cashes as $cash) {
            $total = $total + $cash->amount;
            $cash->total=$total;
            $cash->update();
        }
    }

    /**
     * Handle the Cash "updated" event.
     *
     * @param  \App\Models\Cash  $cash
     * @return void
     */
    public function updated(Cash $cash)
    {
        $cashes = Cash::orderBy('created_at')->get();
        $total = 0;
        foreach( $cashes as $cash) {
            $total = $total + $cash->amount;
            $cash->total=$total;
            $cash->update();
        }
    }

    /**
     * Handle the Cash "deleted" event.
     *
     * @param  \App\Models\Cash  $cash
     * @return void
     */
    public function deleted(Cash $cash)
    {
        $cashes = Cash::orderBy('created_at')->get();
        $total = 0;
        foreach( $cashes as $cash) {
            $total = $total + $cash->amount;
            $cash->total=$total;
            $cash->update();
        }
    }

}
