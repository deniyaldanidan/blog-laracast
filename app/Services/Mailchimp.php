<?php

namespace App\Services;

use MailchimpMarketing\ApiClient;

class Mailchimp implements INewsletter
{

    public function __construct(protected ApiClient $client)
    {
    }

    public function subscribe(string $email, string $listId = null)
    {
        $listId ??= config("services.mailchimp.lists.subscribers");

        return $this->client->lists->addListMember($listId, [
            "email_address" => $email,
            "status" => "subscribed"
        ]);
    }
}