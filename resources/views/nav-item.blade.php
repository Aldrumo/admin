@if ($tag === 'x-jet-nav-link')
    <x-jet-nav-link href="{{ $item->route !== null ? route($item->route) : $item->url }}"
    :active="$item->route !== null ? request()->routeIs($item->route) : ''">
    {{ __($item->text) }}
    </x-jet-nav-link>
@elseif ($tag === 'x-jet-responsive-nav-link')
    <x-jet-responsive-nav-link href="{{ $item->route !== null ? route($item->route) : $item->url }}"
                    :active="$item->route !== null ? request()->routeIs($item->route) : ''">
        {{ __($item->text) }}
    </x-jet-responsive-nav-link>
@endif
