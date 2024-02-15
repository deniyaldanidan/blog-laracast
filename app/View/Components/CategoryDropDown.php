<?php

namespace App\View\Components;

use App\Models\Category;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class CategoryDropDown extends Component
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
        $categories = Category::all();
        $categoryInp = request('category');
        $default = '';
        if ($categoryInp) {
            $default =
                $categories->first(function ($myCat) use ($categoryInp) {
                    return $myCat->slug === $categoryInp;
                })->name ?? 'All';
        } else {
            $default = 'All';
        }

        return view('components.category-drop-down', [
            "categories" => $categories,
            "default" => $default
        ]);
    }
}
