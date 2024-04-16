<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use App\Repositories\AffiliateRegistrationRepository;

class AffiliateRegistrationExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = ( new AffiliateRegistrationRepository() )->getAll();
        // return $data = new Newsletter::all();
        foreach ($data as $row) {
            $array[] = array(
                '0' => $row->email,
                '1' => $row->name,
                '2' => $row->phone,
                '3' => $row->linkedin,
                '4' => $row->youtube,
                '5' => $row->website,
                '6' => $row->created_at,
            );
        }
        return (collect($array));
    }

    public function headings() :array 
    {
    	return ["email","name","phone_number","linkedin","youtube","website","created_at"];
    }
}
