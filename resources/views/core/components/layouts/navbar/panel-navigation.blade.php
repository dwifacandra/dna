<ul class="items-center hidden lg:flex fi-topbar" wire:poll.keep-alive>
    @foreach($navigations as $navigation)
    <li class="fi-topbar-item {{ $navigation->active === 1 ? 'fi-topbar-item-active' : '' }}">
        <a class="fi-topbar-item-label {{ $navigation->icon_position === \App\Core\Enums\IconNavigationPosition::End ? 'flex-row-reverse' : '' }}"
            href="{{ route($navigation->url) }}">
            @if(isset($navigation->icon))
            <x-icon class="fi-topbar-item-label-icon" name="{{ $navigation->icon }}" />
            @endif
            @if($navigation->icon_only === 0)
            {{ $navigation->label }}
            @endif
            @if($navigation->icon_only === 1)
            <span class="tooltip"> {{ $navigation->label }} </span>
            @endif
        </a>
    </li>
    @endforeach
</ul>