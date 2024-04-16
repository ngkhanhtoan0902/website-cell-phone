<?php

namespace App\Imports;

use App\Models\Glossary;
use Maatwebsite\Excel\Concerns\ToModel;

class GlossaryImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        (new Glossary)->updateOrCreate(
            ['term' => $row[0]],
            [
                'definition' => $row[1],
                'link' => $row[2]
            ]
        );
    }
}
