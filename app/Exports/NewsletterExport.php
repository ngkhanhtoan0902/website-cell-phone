<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use App\Repositories\NewsletterRepository;

class NewsletterExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = ( new NewsletterRepository() )->getAll();
        // return $data = new Newsletter::all();
        foreach ($data as $row) {
            $array[] = array(
                '0' => $row->email,
                '1' => $row->created_at,
            );
        }
        return (collect($array));
    }

    public function headings() :array 
    {
    	return ["email","created_at"];
    }
}
