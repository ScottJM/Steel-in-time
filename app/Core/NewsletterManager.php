<?php
/**
 * Created by PhpStorm.
 * User: robbiepaul
 * Date: 19/04/15
 * Time: 20:10
 */

namespace SIT\Core;


use DebugBar\DebugBar;
use Mailchimp;

class NewsletterManager
{
    protected $mailchimp;
    protected $listId = 'b251f89fc5';        // Id of newsletter list

    /**
     * Pull the Mailchimp-instance (including API-key) from the IoC-container.
     */
    public function __construct(Mailchimp $mailchimp)
    {
        $this->mailchimp = $mailchimp;
    }

    /**
     * Access the mailchimp lists API
     */
    public function addEmailToList($email)
    {
        try {
            $response = $this->mailchimp
                ->lists
                ->subscribe(
                    $this->listId,
                    ['email' => $email]
                );
        } catch (\Mailchimp_List_AlreadySubscribed $e) {
    //       dd($e->getMessage());
        } catch (\Mailchimp_Error $e) {
      //      dd($e->getMessage());

        }

    }
}