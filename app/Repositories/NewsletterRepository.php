<?php

namespace App\Repositories;

use RSolution\RCms\Repositories\EloquentRepository;
use App\Models\Newsletter;
use App\Services\TelegramService;
use RSolution\RActiveCampaign\Services\ActiveCampaignService;

class NewsletterRepository extends EloquentRepository
{
    /**
     * get model
     * @return string
     */
    public function getModel()
    {
        return Newsletter::class;
    }

    public function filter($request)
    {
        $query = $this->model::query();

        if (!empty($request->created_at))
            $query->whereDate('created_at', $request->created_at);

        return $query->latest()->paginate($request->limit ? $request->limit : 10);
    }

    public function addNewsletter($request)
    {
        // (new TelegramService)->sendContact('newsletter', $request->email);

        $user = [
            'contact' => [
                'email'          => $request->email,
                'fieldValues' => [
                    [
                        'field' => 2, // contact source
                        'value' =>  'newsletter',
                    ],
                ]
            ]
        ];
		
        $activeCampaign = new ActiveCampaignService;
        $activeCampaign->syncContact($user, false);
        $activeCampaign->addUserToAutomation($request->email, 16);  // NewsletterAutomationId = 16

        $this->create($request->all());
    }
}
