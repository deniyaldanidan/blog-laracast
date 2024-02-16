<?php

namespace App\View\Components;

use App\Models\User;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AuthorDropDown extends Component
{
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        $authorsResult = User::orderBy("name", "asc")->get()->collect();
        $authors = $authorsResult->filter(function (User $user) {
            return (is_array($user->roles) && in_array("author", $user->roles));
        });
        $authorInp = request('author');
        $default = '';
        if ($authorInp) {
            $default =
                $authors->first(function ($myAuthor) use ($authorInp) {
                    return $myAuthor->username === $authorInp;
                })->name ?? 'All';
        } else {
            $default = 'All';
        }

        return view('components.author-drop-down', [
            "authors" => $authors,
            "default" => $default
        ]);
    }
}
