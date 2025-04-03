@extends('layouts.default')

@section('content')
    <div class="flex justify-center">
        <form action="{{ route('contacts.store') }}" method="POST" id="contactForm">
            @csrf
            <div class="sm:min-w-110 rounded-2xl bg-white dark:bg-gray-800 dark:text-white duration-300 ease-in-out">
                <div class="w-full border-b border-gray-300 dark:border-gray-700 py-6 px-4 mb-5">
                    <h2 class="text-center font-semibold text-4xl">Contact</h2>
                </div>

                <div class="px-4 sm:px-8">
                    <div class="flex flex-col justify-center">
                        <div class="w-full mt-4 mb-8">
                            <input
                                class="w-full py-1.5 px-2 border-b-2 border-gray-300 dark:border-gray-700 hover:border-cyan-500 duration-300 ease-in-out focus:outline-none focus:border-cyan-500"
                                type="text" placeholder="Full Name" name="name" value="{{ old('name') }}">
                            @error('name')
                                <p class="mt-2 text-yellow-400 text-sm">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="w-full mb-8">
                            <input
                                class="w-full py-1.5 px-2 border-b-2 border-gray-300 dark:border-gray-700 hover:border-cyan-500 duration-300 ease-in-out focus:outline-none focus:border-cyan-500"
                                type="text" placeholder="Email" name="email" value="{{ old('email') }}">
                            @error('email')
                                <p class="mt-2 text-yellow-400 text-sm">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="w-full mb-8">
                            <textarea
                                class="w-full py-1.5 px-2 border-b-2 border-gray-300 dark:border-gray-700 hover:border-cyan-500 duration-300 ease-in-out focus:outline-none focus:border-cyan-500"
                                name="message" id="message" placeholder="Message" rows="4">{{ old('message') }}</textarea>
                            @error('message')
                                <p class="mt-2 text-yellow-400 text-sm">
                                    <i class="fa-solid fa-triangle-exclamation"></i>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                    </div>

                    <div class="flex flex-col gap-y-7 pb-8">
                        <div class="grow">
                            <a class="px-2.5 py-0.5 text-sm rounded-full bg-gray-400/75 dark:bg-gray-700 text-white hover:cursor-pointer hover:bg-gray-600 duration-300 ease-in-out"
                                id="btnResetFormContent">
                                <i class="fa-solid fa-eraser"></i>
                                Reset
                            </a>
                        </div>
                        <div class="grow text-center">
                            <button
                                class="w-full text-lg text-white bg-cyan-500 py-3 rounded-full hover:cursor-pointer hover:bg-cyan-400 hover:shadow-md hover:shadow-cyan-300/25 duration-300 ease-in-out"
                                type="submit">
                                Submit
                                <i class="fa-solid fa-paper-plane ms-1"></i>
                            </button>
                        </div>
                        <div class="grow text-center mt-1">
                            <a class="text-sm text-cyan-500 hover:text-cyan-600 duration-300 ease-in-out" href="">
                                Back to Home page
                            </a>
                        </div>
                    </div>

                </div>
            </div>
        </form>

    </div>


    @if (session('contact'))
        <x-modal id="messageBack">
            <div class="text-end">
                <a onclick="closeModal('messageBack')"><i
                        class="fa-solid fa-xmark text-2xl text-gray-700 cursor-pointer hover:text-gray-600 duration-300 ease-in-out"></i></a>
            </div>
            <div class="text-center">
                <i class="fa-solid fa-check text-green-500 text-5xl py-3 px-3.5 bg-green-500/30 rounded-full"></i>
            </div>
            <div class="mb-2">
                <h3 class="text-2xl dark:text-white text-center font-semibold">
                    Contact message sent!
                </h3>
            </div>
            <div>
                <p class="font-semibold dark:text-white">Name:</p>
                <p class="text-gray-600 dark:text-gray-400">{{ session()->get('contact')->name }}</p>
            </div>
            <div>
                <p class="font-semibold dark:text-white">Email:</p>
                <p class="text-gray-600 dark:text-gray-400">{{ session()->get('contact')->email }}</p>
            </div>
            <div>
                <p class="font-semibold dark:text-white">Message:</p>
                <p class="text-gray-600 dark:text-gray-400">{{ session()->get('contact')->limitMessage(130) }}</p>
            </div>
        </x-modal>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                openModal('messageBack');
            });
        </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('btnResetFormContent').addEventListener('click', function() {
                document.getElementById('contactForm').querySelectorAll("input, textarea").forEach((
                    element) => {
                    if (element.name !== '_token') {
                        element.value = '';
                    }
                });
            });
        });
    </script>
@endsection
