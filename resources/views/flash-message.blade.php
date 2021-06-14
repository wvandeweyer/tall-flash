@php   
    $style =  config('flash.styles.' . flash()->level)
@endphp

<div>
    @if(flash()->message)
    <div x-data="{ isShowing: true }">
        <div class="p-4 rounded-md {{ $styles['bg-color'] }}" role="alert" x-show="isShowing"
            x-transition:leave="transition duration-200 transform ease-in" x-transition:leave-end="opacity-0 scale-80">

            <div class="flex">
                <div class="flex-shrink-0">
                    <x-dynamic-component :component="$styles['icon']" class="w-5 h-5" :class="{{ $styles['icon-color'] }}" />
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium {{ $styles['text-color'] }}">
                        {{ flash()->message }}
                    </p>
                </div>
                @if($flash()->dismissable)
                <div class="pl-3 ml-auto">
                    <div class="-mx-1.5 -my-1.5">
                        <button type="button" x-on:click="isShowing = false"
                            class="inline-flex {{ $styles['dismissable-bg-color'] }} rounded-md p-1.5 {{ $styles['dimissable-icon-color'] }} hover:{{ $styles['dismissable-bg-color-hover'] }} focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-{{ $getAlertColor() }}-50 focus:ring-{{ $getAlertColor() }}-600">
                            <span class="sr-only">Dismiss</span>
                            <x-gmdi-clear class="w-5 h-5" />
                        </button>
                    </div>
                </div>
                @endif
            </div>
        </div>

    </div>
    @endif
</div>