@php   
    $styles = [
        'info' => [
            'bg-color' => 'bg-blue-50',
            'icon-color' => 'text-blue-400',
            'text-color' => 'text-blue-600',
            'icon' => 'info',
            'dismissable-bg-color' => 'bg-blue-50',
            'dismissable-bg-color-hover' => 'bg-blue-100',
            'dismissable-icon-color' => 'text-blue-500',
        ],
        'success' => [
            'bg-color' => 'bg-green-50',
            'icon-color' => 'text-green-400',
            'text-color' => 'text-green-600',
            'icon' => 'check',
            'dismissable-bg-color' => 'bg-green-50',
            'dismissable-bg-color-hover' => 'bg-green-100',
            'dismissable-icon-color' => 'text-green-500',
        ],
        'warning' => [
            'bg-color' => 'bg-yellow-50',
            'icon-color' => 'text-yellow-400',
            'text-color' => 'text-yellow-600',
            'icon' => 'warning',
            'dismissable-bg-color' => 'bg-yellow-50',
            'dismissable-bg-color-hover' => 'bg-yellow-100',
            'dismissable-icon-color' => 'text-yellow-500',
        ],
        'error' => [
            'bg-color' => 'bg-red-50',
            'icon-color' => 'text-red-400',
            'text-color' => 'text-red-600',
            'icon' => 'error',
            'dismissable-bg-color' => 'bg-red-50',
            'dismissable-bg-color-hover' => 'bg-red-100',
            'dismissable-icon-color' => 'text-red-500',
        ],
    ];
        
    $style =  $styles[$level];

    $icon = 'flash::icons.' . $style['icon'];
    $iconStyle = 'h-5 w-5 ' . $style['icon-color'];

   
@endphp

<div>
    @if($content)
    <div x-data="{ isShowing: @entangle('isShowing').defer }">
        <div class="p-4 rounded-md {{ $style['bg-color'] }}" role="alert" x-show="isShowing"
            x-transition:leave="transition duration-200 transform ease-in" x-transition:leave-end="opacity-0 scale-80">
            <div class="flex">
                <div class="flex-shrink-0">
                    <x-dynamic-component :component="$icon" :class="$iconStyle" />
                </div>
                <div class="ml-3">
                    <p class="text-sm font-medium {{ $style['text-color'] }}">
                        {!! $content !!}
                    </p>
                </div>
                @if($dismissable)
                <div class="pl-3 ml-auto">
                    <div class="-mx-1.5 -my-1.5">
                        <button type="button" x-on:click="isShowing = false"
                            class="inline-flex {{ $style['dismissable-bg-color'] }} rounded-md p-1.5 {{ $style['dismissable-icon-color'] }} hover:{{ $style['dismissable-bg-color-hover'] }} focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-{{ $style['dismissable-icon-color'] }} focus:ring-{{ $style['dismissable-icon-color'] }}">
                            <span class="sr-only">Dismiss</span>
                            <x-flash::icons.close class="w-5 h-5" />
                        </button>
                    </div>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endif
</div>