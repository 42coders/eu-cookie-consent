<div>
    @if(isset($cookie['description']))
        <p>
            @if($multiLanguageSupport)
                {{ __('eu-cookie-consent::cookies.'.$cookie['description']) }}
            @else
                {{ $cookie['description'] }}
            @endif
        </p>
    @endif
    <input type="checkbox" id="{{ $cookieName }}" name="{{ $cookieName }}" class="category-{{$categoryName}}" value="1" @if(isset($cookie['forced'])) checked="checked" disabled="disabled" @endif }}>
    @if(isset($cookie['forced']))
        <input type="hidden" name="{{ $cookieName }}" value="1">
    @endif
    <label for="{{ $cookieName }}">
        @if($multiLanguageSupport)
            {{ __('eu-cookie-consent::cookies.'.$cookieName) }}
        @else
            {{ $cookie['title'] }}
        @endif
    </label>
</div>
