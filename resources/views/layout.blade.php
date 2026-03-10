<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com?plugins=forms,container-queries"></script>

    <link href="https://fonts.googleapis.com/css2?family=Work+Sans:wght@300;400;500;600;700&amp;display=swap" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&amp;display=swap" rel="stylesheet"/>
    <script id="tailwind-config">
            tailwind.config = {
                darkMode: "class",
                theme: {
                    extend: {
                        colors: {
                            "primary": "#006b5f",
                            "background-light": "#f5f8f8",
                            "background-dark": "#0f2321",
                        },
                        fontFamily: {
                            "display": ["Work Sans"]
                        },
                        borderRadius: {"DEFAULT": "0.25rem", "lg": "0.5rem", "xl": "0.75rem", "full": "9999px"},
                    },
                },
            }
        </script>
    <title>Document</title>
</head>


<body class="bg-background-light dark:bg-background-dark font-display text-slate-900 dark:text-slate-100 min-h-screen pb-20">
    <header class="sticky top-0 z-50 bg-background-light/80 dark:bg-background-dark/80 backdrop-blur-md px-4 py-3 flex items-center justify-between gap-4">
<div class="flex items-center gap-2">
<a href="{{ route('home') }}" class="flex items-center gap-2">

<span class="material-symbols-outlined text-primary text-3xl">auto_stories</span>
<h1 class="text-xl font-bold tracking-tight text-primary">Book Haven</h1>
</a>
</div>
<button class="relative p-2 rounded-full hover:bg-primary/10 transition-colors">
</button>
</header>
@yield('content')
</body>
</html>
