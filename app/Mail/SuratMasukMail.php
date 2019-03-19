<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SuratMasukMail extends Mailable
{
    use Queueable, SerializesModels;
    public $tempPegawaiName;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pegawaiName)
    {
        $this->tempPegawaiName = $pegawaiName;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this
            ->view('surat_masuk.email')
            ->with([
                'nama' => $this->tempPegawaiName
            ]);
    }
}
