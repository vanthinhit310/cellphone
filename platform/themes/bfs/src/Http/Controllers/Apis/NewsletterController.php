<?php

namespace Theme\Bfs\Http\Controllers\Apis;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Newsletter;
use Platform\Newsletter\Events\SubscribeNewsletterEvent;
use Platform\Newsletter\Repositories\Interfaces\NewsletterInterface;
use SendGrid;
use URL;

class NewsletterController extends Controller
{
    protected $request;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function subscribe()
    {
        $newsletter = app(NewsletterInterface::class)->getFirstBy(['email' => $this->request->input('email')]);
        if (!$newsletter) {
            $newsletter = app(NewsletterInterface::class)->createOrUpdate($this->request->input());
            if (config('plugins.newsletter.general.mailchimp.api_key') && config('plugins.newsletter.general.mailchimp.list_id')) {
                Newsletter::subscribe($newsletter->email);
            }

            if (config('plugins.newsletter.general.sendgrid.api_key') && config('plugins.newsletter.general.sendgrid.list_id')) {
                $sg = new SendGrid(config('plugins.newsletter.general.sendgrid.api_key'));

                $requestBody = json_decode(
                    '{
                        "list_ids": [
                            "' . config('plugins.newsletter.general.sendgrid.list_id') . '"
                        ],
                        "contacts": [
                            {
                                "first_name": "' . $this->request->input('first_name') . '",
                                "last_name": "' . $this->request->input('last_name') . '",
                                "email": "' . $this->request->input('email') . '"
                            }
                        ]
                    }'
                );

                try {
                    $sg->client->marketing()->contacts()->put($requestBody);
                } catch (Exception $exception) {
                    info('Caught exception: ' . $exception->getMessage());
                }
            }
        }

        event(new SubscribeNewsletterEvent($newsletter));

        return response()->json(['message' => __('Subscribe to newsletter successfully!')]);
    }

}
