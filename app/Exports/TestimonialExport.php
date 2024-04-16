<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

use App\Repositories\TestimonialRepository;

class TestimonialExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = ( new TestimonialRepository() )->getAll();
        foreach ($data as $row) {
            $array[] = array(
                '0' => $row->email,
                '1' => $row->first_name,
                '2' => $row->last_name,
                '3' => $row->company,
                '4' => $row->job_title,
                '5' => $row->linkedln_profile,
                '6' => $row->facebook_profile,
                '7' => $row->twitter_profile,
                '8' => $row->content,
                '9' => strpos($row->photo,'sample') === false ? url('/storage/photos/1/testimonial-photo').'/'.$row->photo : "null" ,
                '10' => $row->created_at,
            );
        }
        return (collect($array));
    }

    public function headings() :array 
    {
    	return ["email","first_name","last_name","company","job_title","linkedln_profile","facebook_profile","twitter_profile","content","photo","created_at"];
    }
}
