@extends('layouts.default')

@section('content')
    @if ($contacts->isNotEmpty())
        <div class="mb-16">
            <form action="{{ route('contacts.index') }}" method="GET">
                <div class="flex flex-wrap items-center gap-4 dark:text-white duration-300 ease-in-out">
                    <div>
                        <select name="order"
                            class="bg-white px-5 py-2.5 rounded-full dark:bg-gray-800 hover:cursor-pointer hover:outline-2 hover:outline-cyan-500 focus:outline-2 focus:outline-offset-0 focus:outline-cyan-500 duration-300 ease-in-out"
                            id="">
                            <option disabled>Order by</option>
                            <option value="desc" selected>Descending</option>
                            <option value="asc" @selected(request()->get('order') === 'asc')>Ascending</option>
                        </select>
                    </div>
                    <div class="flex gap-4 items-center">
                        <div class="grow">
                            <input
                                class="w-full bg-white px-5 py-2.5 rounded-full dark:bg-gray-800 hover:cursor-pointer hover:outline-2 hover:outline-cyan-500 focus:outline-2 focus:outline-offset-0 focus:outline-cyan-500 duration-300 ease-in-out"
                                type="text" placeholder="Search for a keyword..." name="keyword"
                                value="{{ request()->get('keyword') }}">
                        </div>
                        <div class="grow">
                            <button type="submit"
                                class="w-full text-white bg-cyan-500 py-2 px-3 rounded-full hover:cursor-pointer hover:bg-cyan-400 hover:shadow-md 
                        hover:shadow-cyan-300/25 duration-300 ease-in-out">
                                <i class="fa-solid fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <div class="flex flex-wrap gap-10 justify-center">
            @foreach ($contacts as $contact)
                <div class="grow sm:min-w-100 bg-white dark:bg-gray-800 p-6 rounded-3xl duration-300 ease-in-out">
                    <div class="border-b border-gray-300 dark:border-gray-600 pb-3">
                        <p class="text-end dark:text-white">{{ $contact->formatDate() }}</p>
                        <h3 class="dark:text-white text-xl font-semibold duration-300 ease-in-out">{{ $contact?->name }}
                        </h3>
                    </div>
                    <div class="mt-5">
                        <p class="text-gray-600 dark:text-gray-400 duration-300 ease-in-out">
                            {{ $contact->message }}
                        </p>
                    </div>
                    <div class="mt-5">
                        <p class="text-cyan-600 text-end">{{ $contact->email }}</p>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-12">
            {{ $contacts->links() }}
        </div>
    @else
        <div>
            <h3 class="text-white text-xl text-center">No contact messages found</h3>
        </div>
    @endif
@endsection
