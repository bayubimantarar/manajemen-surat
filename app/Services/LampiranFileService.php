<?php

namespace App\Services;

use Storage;

class LampiranFileService
{
    /**
     *
     * Block comment
     *
     */
    public function uploadLampiranFile($lampiranFile, $lampiranFileName)
    {
        $uploadFileLampiran = Storage::disk('uploads')
            ->putFileAs(
                'documents/surat-masuk',
                $lampiranFile,
                $lampiranFileName
            );
    }

    /**
     *
     * Block comment
     *
     */
    public function deleteLampiranFile($lampiranFileName)
    {
        $deleteLampiranFile = Storage::disk('uploads')
            ->delete('documents/surat-masuk/'.$lampiranFileName);
    }
}
