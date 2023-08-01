<div 
    class="max-w-full z-0"
    x-data="{open:false, selected: false}"
    >
    <div 
        class="relative"
    >
        <button 
            type="button" 
            class="w-full flex items-center justify-between" 
            @click="selected = !selected; open = !open"
        >    
            <?= $buttonText ?>
            <svg 
                class="h-3 w-3" 
                viewBox="0 0 24 24" 
                fill="none" 
                stroke="currentColor" 
                stroke-width="2">
                <line x1="12" y1="5" x2="12" y2="19" x-show="!open" />
                <line x1="5" y1="12" x2="19" y2="12" />
            </svg>
        </button>

        <div 
            class="relative overflow-hidden transition-all max-h-0 duration-700" 
            x-ref="container1" 
            x-bind:style="selected ? 'max-height: ' + $refs.container1.scrollHeight + 'px' : ''"
        >
            <?= $slot ?>
        </div>
    </div>
</div>