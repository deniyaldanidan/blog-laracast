<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">
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

        html {
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="bg-background text-foreground m-0 scroll-smooth">
    {{ $slot }}
    <x-session-flash />
</body>

</html>
