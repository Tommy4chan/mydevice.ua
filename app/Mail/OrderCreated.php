<?php

namespace App\Mail;

use App\Classes\Basket;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class OrderCreated extends Mailable
{
    use Queueable, SerializesModels;

    protected $name;

    protected $basket;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name, Basket $basket)
    {
        $this->name = $name;
        $this->basket = $basket;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('mail.orderCreated', ['name' => $this->name, 'basket' => $this->basket]);
    }
}
