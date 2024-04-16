<?php

namespace App\Imports;

use App\Models\RedirectLink;
use Maatwebsite\Excel\Concerns\ToModel;

class RedirectLinksImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (is_null($row[0])) return null;

        if (!checkDomainRedirect($row[0])) return null;

        $issueLink = cleanDomainRedirect($row[0]);
        $fixLink = cleanDomainRedirect($row[1]);

        (new RedirectLink)->updateOrCreate(['issue_link' => $issueLink], ['fix_link' => $fixLink]);
    }
}