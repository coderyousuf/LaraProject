<?php

namespace App\Mail;

use App\Models\Category;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CategoryCreated extends Mailable
{
    use Queueable, SerializesModels;

    public $category;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Category $category)
    {
        $this->category=$category;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $subject="Category: {$this->category->name} Created";
        return $this
        ->subject($subject)
        ->attach(public_path('invoices/invoice.pdf'), [
            'as'=>'order_invoice.pdf',
            'mime'=>'application/pdf'
        ])
        ->view('emails.category.category-created');
    }
}
