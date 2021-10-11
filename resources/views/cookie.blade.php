<div>
    {{-- Popup Cookie description only gets displayed if set in config --}}
    @if(isset($cookie['description']))
        <p>
            @if($multiLanguageSupport)
                {{ __('eu-cookie-consent::cookies.'.$cookie['description']) }}
            @else
                {{ $cookie['description'] }}
            @endif
        </p>
    @endif
    {{-- Popup Cookie checkbox with Label --}}
    <input type="checkbox" id="{{ $cookieName }}" name="{{ $cookieName }}" class="eu-cookie-consent-category-{{$categoryName}} eu-cookie-consent-cookie" value="1" @if( !isset($cookie['forced']) && \the42coders\EuCookieConsent\EuCookieConsent::canIUse($cookieName)) checked="checked" @endif @if(isset($cookie['forced'])) checked="checked" disabled="disabled" @endif }}>
    {{-- For the foreced cookies we need this workaround with hidden input because we set the original input disabled --}}
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
