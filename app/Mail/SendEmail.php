<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class SendEmail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     */
    public $details;

    public function __construct($details)
    {
        $this->details = $details;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        // $user = $this->data['user'];

        // $name = $user->name;
        // $user_id = str_pad($user->id, 3, '0', STR_PAD_LEFT);
        // $donation_amount = $receipt->amount;
        // $donation_date = date('jS F Y', strtotime($donor->created_at));
        // $payment_method = ucfirst($receipt->payment_type);
        // $sanstha_name = ucfirst($sanstha->name);
        // $sanstha_address = $sanstha->address;
        // $sanstha_city = $sanstha->city;
        // $sanstha_state = $sanstha->state;
        // $sanstha_zipcode = $sanstha->zipcode;
        // $sanstha_country = $sanstha->country;
        // $event_name = ucfirst($head->name);

        $data = [
            'name' => "rushi",
            // 'user_id' => $user_id,

            // 'donor_name' => $donor_name,
            // 'donor_address' => $donor_address,
            // 'receipt_no' => $receipt_no,
            // 'donation_date' => $donation_date,
            // 'payment_method' => $payment_method,
            // 'donation_amount' => $donation_amount,
            // 'sanstha_name' => $sanstha_name,
            // 'sanstha_address' => $sanstha_address,
            // 'event_name' => $event_name,
            // 'sanstha_city' => $sanstha_city,
            // 'sanstha_state' => $sanstha_state,
            // 'sanstha_zipcode' => $sanstha_zipcode,
            // 'sanstha_country' => $sanstha_country,
            // 'sanstha_logo' => $logo,
        ];

        return $this->from(getenv('MAIL_FROM_ADDRESS'), getenv('MAIL_FROM_NAME'))
            ->subject("!!!ALERT!!!")
            ->view('/mail', $data);  // Pass receipt data to view

    }
}
