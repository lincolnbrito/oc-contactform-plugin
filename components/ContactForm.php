<?php namespace LincolnBrito\ContactForm\Components;

use Cms\Classes\ComponentBase;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use October\Rain\Exception\ValidationException;

class ContactForm extends ComponentBase
{
    public function componentDetails()
    {
        return [
            'name' => 'Contact Form',
            'description' => 'A simple contact form'
        ];
    }

    public function onSend()
    {
        $data = Input::only([
            'first_name', 'last_name', 'email', 'content'
        ]);

        $this->validate($data);

        $receiver = 'admin@admin.tld';

        Mail::send('lincolnbrito.contactform::contact', $data, function($message) use($receiver, $data) {
            $message->to($receiver);
            $message->replyTo($data['email']);
        });
    }

    public function validate(array $data) 
    {
        $rules = [
            'first_name' => 'required|min:3|max:255',
            'last_name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'content' => 'required'
        ];

        $validator = Validator::make($data, $rules);

        if($validator->fails()) {
            throw new ValidationException($validator);
        }
    }


}