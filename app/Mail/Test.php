<?php

namespace App\Mail;

use App\Models\Production as ModelsProduction;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Test extends Mailable
{
    use Queueable, SerializesModels;

    public $production;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(ModelsProduction $production)
    {
        $this->production = $production;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('mails.test',['production_id' => $this->production->id]);
    }
}
