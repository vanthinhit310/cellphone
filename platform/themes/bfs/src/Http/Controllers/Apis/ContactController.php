<?php

namespace Theme\Bfs\Http\Controllers\Apis;

use EmailHandler;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Newsletter;
use Platform\Contact\Events\SentContactEvent;
use Platform\Contact\Repositories\Interfaces\ContactInterface;
use URL;

class ContactController extends Controller
{
    protected $request;

    /**
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function sendContact()
    {
        try {
            $contact = app(ContactInterface::class)->getModel();
            $contact->fill($this->request->input());
            app(ContactInterface::class)->createOrUpdate($contact);

            event(new SentContactEvent($contact));

            EmailHandler::setModule(CONTACT_MODULE_SCREEN_NAME)
                ->setVariableValues([
                    'contact_name' => $contact->name ?? 'N/A',
                    'contact_subject' => $contact->subject ?? 'N/A',
                    'contact_email' => $contact->email ?? 'N/A',
                    'contact_phone' => $contact->phone ?? 'N/A',
                    'contact_address' => $contact->address ?? 'N/A',
                    'contact_content' => $contact->content ?? 'N/A',
                ])
                ->sendUsingTemplate('notice');

            return response()->json(['message' => __('Send message successfully!'), 'error' => false]);
        } catch (Exception $exception) {
            info($exception->getMessage());
            return response()->json(['message' => trans('plugins/contact::contact.email.failed'), 'error' => true], 500);
        }
    }

}
