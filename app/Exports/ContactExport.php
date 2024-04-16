<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use App\Repositories\ContactRepository;

class ContactExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = ( new ContactRepository() )->getAll();

        foreach ($data as $row) {
            $array[] = array(
                '0' => $row->name,
                '1' => $row->email,
				'2'	=> $row->type == ContactRepository::TYPE_MAIL ? 'mail' : 'call',
                '3' => $row->content,
                '4' => $row->created_at, 
                '5' => $row->status == ContactRepository::STATUS_ANSWERED ? "answered" : "",
				'6'	=> json_encode($row->info)
				
            );
        }
        return (collect($array));
    }

    public function headings() :array 
    {
    	return ["name","email","type","content","created_at","status",'info'];
    }
}
