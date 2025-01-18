<ul class="items-center hidden lg:flex fi-topbar">
    @foreach($navigations as $navigation)
    <li
        class="fi-topbar-item {{ isset($navigation['active']) && $navigation['active'] ? 'fi-topbar-item-active' : '' }}">
        <a class="fi-topbar-item-label {{ isset($navigation['icon-position']) && $navigation['icon-position'] ? 'flex-row-reverse' : '' }}"
            href="{{ $navigation['url'] }}">
            @if(isset($navigation['icon']))
            <x-icon class="fi-topbar-item-label-icon" name="{{ $navigation['icon'] }}" />
            @endif
            @if(isset($navigation['label']))
            {{ $navigation['label'] }}
            @endif
        </a>
    </li>
    @endforeach
</ul>