<?php

namespace App\Http\Controllers;

use App\Services\INewsletter;
use Illuminate\Http\Request;

class NewsletterController extends Controller
{
    public function __invoke(INewsletter $newsletter)
    {
        request()->validate([
            "email" => "required|email"
        ]);

        try {
            $newsletter->subscribe(request("email"));
        } catch (\Exception $e) {
            return throw \Illuminate\Validation\ValidationException::withMessages([
                "email" => "Invalid email address"
            ]);
        }
        return redirect("/")->with("success", "Thanks for subscribing to our newsletter");
    }
}
