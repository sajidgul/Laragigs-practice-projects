<x-layouts.layout>
    <x-slot name="header">
        <x-includes.header></x-includes.header>
    </x-slot>
    <x-slot name="hero">
        <x-includes.hero></x-includes.hero>
    </x-slot>
    <x-slot name="search">
        <x-includes.search></x-includes.search>
    </x-slot>
    <x-slot name="card">
        <x-includes.card>
            <a href="/" class="inline-block text-black ml-4 mb-4"
            ><i class="fa-solid fa-arrow-left"></i> Back
        </a>
        
        <div class="mx-4">
            <div class="bg-gray-50 border border-gray-200 p-10 rounded">
                <div
                class="flex flex-col items-center justify-center text-center"
                >
                <img
                class="w-48 mr-6 mb-6"
                src="{{asset('assets/images/no-image.png')}}"
                alt=""
                />
                    <h3 class="text-2xl mb-2">{{ $listing->title }}</h3>
                    <div class="text-xl font-bold mb-4">{{ $listing->company }}</div>
                    <x-includes.listing-tags :tagsCsv="$listing->tags"></x-includes.listing-tags>
                    <div class="text-lg my-4">
                        <i class="fa-solid fa-location-dot"></i> {{ $listing->location }}
                    </div>
                    <div class="border border-gray-200 w-full mb-6"></div>
                    <div>
                        <h3 class="text-3xl font-bold mb-4">
                            Job Description
                        </h3>
                        <div class="text-lg space-y-6">
                            <p>
                                {{ $listing->description }}
                            </p>
                            <a
                            href="mailto:{{ $listing->email }}"
                            class="block bg-laravel text-white mt-6 py-2 rounded-xl hover:opacity-80"
                            ><i class="fa-solid fa-envelope"></i>
                            Contact Employer</a
                            >
                            
                            <a
                            href="{{ $listing->website }}"
                            target="_blank"
                            class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                            ><i class="fa-solid fa-globe"></i> Visit
                            Website</a
                            >
                            {{-- <a
                            href="/edit/{{ $listing->id }}"
                            target="_blank"
                            class="block bg-black text-white py-2 rounded-xl hover:opacity-80"
                            ><i class="fa-solid fa-pencil"></i> Edit</a
                            >
                            <form method="POST" action="/listings/{{ $listing->id }}">
                            @csrf
                            @method('PUT')
                            <button class="bg-black text-white"><i class="fa-solid fa-trash"></i> Delete</button>
                            </form> --}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </x-includes.card>
    </x-slot>

    <x-slot name="footer">
        <x-includes.footer></x-includes.footer>
    </x-slot>

</x-layouts.layout>
