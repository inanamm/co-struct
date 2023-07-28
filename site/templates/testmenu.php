<!DOCTYPE html>
<html lang="de" class="h-full">
<?php snippet('head') ?>

<body   
    class="relative h-full"
    x-data="{ menuOpen: false }"
>
    <header>
        <button @click="menuOpen = !menuOpen" class="fixed bottom-3 right-3 z-10" :aria-expanded="menuOpen" aria-controls="navigation" aria-label="Navigation Menu">
        <svg 
            class="h-6 w-6 text-csblue group-open:rotate-45 transition-transform origin-left" 
            viewBox="0 0 24 24" 
            fill="none" 
            stroke="currentColor" 
            stroke-width="2">  
            <line x1="12" y1="5" x2="12" y2="19" x-show="!menuOpen" />
            <line x1="5" y1="12" x2="19" y2="12" />
        </svg>
        </button>
    </header>
    
    <nav id="navigation" 
    x-show="menuOpen" 
    class="h-96 w-full flex bg-csyellow fixed bottom-0 left-0" 
        x-transition:enter="transition duration-500 ease-in-out"
        x-transition:enter-start="translate-y-full"
        x-transition:enter-end="translate-y-0"
        x-transition:leave="transition ease-in-out duration-300"
        x-transition:leave-start="translate-y-0"
        x-transition:leave-end="translate-y-full">
        <ul>
            <li>
                <a href="/">Here</a>
            </li>
        </ul>
    </nav>

</body>


</html>