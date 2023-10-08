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
    {{-- SLOT START --}}
    {{-- alpine js library used --}}
    @if(session()->has('success'))
    <div x-data="{show: true}" x-init="setTimeout(()=>show = false, 3000)" x-show="show" class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-48 py-3">
        <p>
            {{ session('success') }}
        </p>
    </div>
        
    @endif
    <div
                class="lg:grid lg:grid-cols-2 gap-4 space-y-4 md:space-y-0 mx-4"
            >
                <!-- Item 1 -->
                @foreach($listings as $listing)
                <div class="bg-gray-50 border border-gray-200 rounded p-6">
                    <div class="flex">
                        <img
                            class="hidden w-48 mr-6 md:block"
                            src="{{ $listing->logo ? asset('storage/'.$listing->logo):asset('assets/images/no-image.png') }}"
                            alt=""
                        />
                        <div>
                            <h3 class="text-2xl">
                                <a href="/show/{{$listing->id}}">{{$listing->title}}</a>
                            </h3>
                            <div class="text-xl font-bold mb-4">{{$listing->company}}</div>
                            <x-includes.listing-tags :tagsCsv="$listing->tags"></x-includes.listing-tags>
                            <div class="text-lg mt-4">
                                <i class="fa-solid fa-location-dot"></i> {{$listing->location}}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
    </div>
    {{-- SLOT END --}}
    <x-slot name="footer">
        <x-includes.footer></x-includes.footer>
    </x-slot>
    
    <div class="mt-6 p-6 right-0">
        {{ $listings->links() }}
    </div>
</x-layouts.layout>
