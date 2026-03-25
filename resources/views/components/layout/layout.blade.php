<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Idea</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-background text-foreground">
    <x-layout.nav />

    <main class="max-w-7xl mx-auto px-6">
        {{ $slot }}
    </main>

    @session('success')
        {{-- <div x-data="{ show: true }" x-init="setTimeout(() => show = false, 3000)" x-show="show" x-transition.opacity.duration.300ms
            class="bg-primary px-4 py-3 absolute bottom-4 right-4 rounded-lg">
            {{ $value }}
        </div> --}}

        <div x-data="{
            show: true,
            duration: 3000,
            timer: null,
            init() {
                this.timer = setTimeout(() => this.dismiss(), this.duration)
            },
            dismiss() {
                clearTimeout(this.timer)
                this.show = false
            }
        }" x-show="show" x-transition:enter="transition ease-out duration-300"
            x-transition:enter-start="opacity-0 translate-x-full" x-transition:enter-end="opacity-100 translate-x-0"
            x-transition:leave="transition ease-in duration-200" x-transition:leave-start="opacity-100 translate-x-0"
            x-transition:leave-end="opacity-0 translate-x-full" @keydown.escape.window="dismiss()" role="alert"
            aria-live="assertive" class="fixed bottom-4 right-4 z-50">

            <div class="bg-primary px-4 py-3 rounded-lg shadow-lg">
                <div class="flex justify-between items-center gap-4">
                    <p class="text-sm font-medium">
                        {{ $value }}
                    </p>
                    <button @click="dismiss()" aria-label="Close message"
                        class="text-gray-400 hover:text-gray-600 dark:text-gray-800 dark:hover:text-gray-300 shrink-0">
                        &times;
                    </button>
                </div>
            </div>
        </div>
    @endsession
</body>

</html>
