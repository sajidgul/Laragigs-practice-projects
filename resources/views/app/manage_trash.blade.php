<x-layouts.layout>
    <x-slot name="header">
        <x-includes.header></x-includes.header>
    </x-slot>
    @if(session()->has('success'))
    <div x-data="{show: true}" x-init="setTimeout(()=>show = false, 3000)" x-show="show" class="fixed top-0 left-1/2 transform -translate-x-1/2 bg-laravel text-white px-48 py-3">
        <p>
            {{ session('success') }}
        </p>
    </div>
        
    @endif
<div class="bg-gray-50 border border-gray-200 p-10 rounded">
    <header>
        <h1
            class="text-3xl text-center font-bold my-6 uppercase"
        >
            Trash Bin
        </h1>
        <button class="absolute right-10 bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
            <a href="manage">Go to Listings</a>
        </button><br><br>
    </header>

    <table class="w-full table-auto rounded-sm">
        <tbody>
                @foreach ($listings as $listing)
                    
                <tr class="border-gray-300">
                    <td
                    class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                    >
                    <a href="">
                        {{ $listing->title }}
                    </a>
                </td>
                <td
                class="px-4 py-8 border-t border-b border-gray-300 text-lg"
                >
                <a
                href="/manage_restore/{{ $listing->id }}"
                class="text-blue-400 px-6 py-2 rounded-xl"
                ><i
                class="fa-solid fa-pen-to-square"
                ></i>
                Restore</a
                >
            </td>
            <td
            class="px-4 py-8 border-t border-b border-gray-300 text-lg"
            >
            <form method="POST" action="/manage_force_delete/{{ $listing->id }}">
                @csrf
                @method('PUT')
                <button class="text-red-600">
                    <i
                    class="fa-solid fa-trash-can"
                    ></i>
                    Delete
                </button>
                
            </form>
        </td>
    </tr>
    @endforeach
        </tbody>
    </table>
</div>
<x-slot name="footer">
    <x-includes.footer></x-includes.footer>
</x-slot>
</x-layouts.layout>