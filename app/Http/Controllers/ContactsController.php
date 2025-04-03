<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;

class ContactsController extends Controller
{
    public function index(Request $request)
    {
        $query = Contact::query();

        $query->when($request->get('keyword'), function (Builder $builder) use ($request) {
            $builder->where(function (Builder $b) use ($request) {
                $b->whereLike('name', '%' . $request->get('keyword') . '%')
                    ->orWhereLike('email', '%' . $request->get('keyword') . '%')
                    ->orWhereLike('message', '%' . $request->get('keyword') . '%');
            });
        });

        $query->when($request->get('order'), function (Builder $builder) use ($request) {
            if ($request->get('order') === 'asc') {
                $builder->orderBy('created_at', 'ASC');
            } else {
                $builder->orderBy('created_at', 'DESC');
            }
        });

        $query->when(empty($request->all()), function(Builder $builder) {
            $builder->orderBy('created_at', 'DESC');
        });

        $contacts = $query->paginate(8);

        return view('pages.contacts.index', compact('contacts'));
    }

    public function create()
    {
        return view('pages.contacts.create');
    }

    public function store(Request $request)
    {
        $contact = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:1000'
        ]);

        $contact = Contact::create($contact);

        return to_route('contacts.create')->with([
            'contact' => $contact,
        ]);
    }
}
