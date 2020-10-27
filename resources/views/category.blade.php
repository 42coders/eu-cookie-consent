<div>
    @if(isset($category['cookies']))
        <p>
            <b>
                @if($multiLanguageSupport)
                    {{ __('eu-cookie-consent::cookies.'.$categoryName) }}
                @else
                    {{ $category['title'] }}
                @endif
            </b>
        </p>
        <p>
            @if(isset($category['description']))
                @if($multiLanguageSupport)
                    {{ __('eu-cookie-consent::cookies.'.$category['description']) }}
                @else
                    {{ $category['description'] }}
                @endif
            @endif
        </p>
        @foreach($category['cookies'] as $cookieName => $cookie)
            @include('eu-cookie-consent::cookie')
        @endforeach
    @endif
</div>
