@props([
    'card' => false,
    'search'=>false,
    'hero'=> false
])
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <link rel="icon" href="images/favicon.ico" />
        <link
            rel="stylesheet"
            href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
            integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
            crossorigin="anonymous"
            referrerpolicy="no-referrer"
        />
        {{-- alpine js library link --}}
        <script src="//unpkg.com/alpinejs" defer></script>
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        colors: {
                            laravel: "#ef3b2d",
                        },
                    },
                },
            };
        </script>
        <title>LaraGigs | Find Laravel Jobs & Projects</title>
    </head>
    <body class="mb-48">
        <div class="header">
            {{$header}}
        </div>
        <div class="hero">
            @if($hero)
                {{ $hero }}
            @endif
        </div>
        <div class="search">
            @if($search)
            {{ $search }}
            @endif
        </div>
        <div class="card">
            @if($card)
            {{$card}}
            @endif
        </div>
        <div class="content">
            {{$slot}}
        </div>
        <div class="footer">
            {{$footer}}
        </div>
    </body>

    </html>
