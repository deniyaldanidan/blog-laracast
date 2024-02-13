<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <title>{{ $title . ' | Blogger' ?? 'Blogger' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'foreground': '#02010f',
                        'background': '#f7f5ff',
                        'primary': '#2f21f6',
                        'secondary': '#fa767d',
                        'accent': '#f7a73d',
                    },
                    spacing: {
                        space: "50px"
                    }
                }
            }
        }
    </script>

    <style>
        @tailwind base;
        @tailwind components;
        @tailwind utilities;

        @layer components {
            .scrollbar-styled {
                &::-webkit-scrollbar {
                    width: 7.5px;
                }

                &::-webkit-scrollbar-track {
                    background: #777;
                    border-radius: 2.5px;
                }

                &::-webkit-scrollbar-thumb {
                    background: #222;
                    border-radius: 2.5px;
                }

                &::-webkit-scrollbar-thumb:hover {
                    background: #444;
                }
            }
        }
    </style>
</head>

<body class="bg-background text-foreground m-0">
    <x-main-header />
    <main class="px-space min-h-screen py-10">
        {{ $slot }}
    </main>
    @include('partials.subscribe-section')
    <x-main-footer />
    <h1 class="bg-black text-white"></h1>
    {{-- <x-toast :message="'Hello Good Day'" status="warn" /> --}}
    @if (session()->has('success'))
        <x-toast :message="session('success')" :status="'success'" />
    @endif
    @if (session()->has('error'))
        <x-toast :message="session('error')" :status="'error'" />
    @endif

    <script src="/js/toast-script.js"></script>
</body>

</html>
