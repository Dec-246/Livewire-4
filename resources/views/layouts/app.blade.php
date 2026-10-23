<html>
    <head>
        @livewireScripts
    </head>

    <body>
        <aside class="min-w-64 bg-zinc-100 h-full">
        </aside>

        <main class="pt-8">{{ $slot }}</main>

        @livewireScripts
    </body>
</html>
