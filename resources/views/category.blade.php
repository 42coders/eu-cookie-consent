{{-- Popup Category --}}
<div>
    {{-- Popup Category need a cookies definition to get displayed--}}
    @if(isset($category['cookies']))
        {{-- Popup Category Title --}}
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
            {{-- Popup Category description only if its set in the config --}}
            @if(isset($category['description']))
                @if($multiLanguageSupport)
                    {{ __('eu-cookie-consent::cookies.'.$category['description']) }}
                @else
                    {{ $category['description'] }}
                @endif
            @endif
        </p>
        {{-- Popup Category iteration through the single cookies defined in the config --}}
        @foreach($category['cookies'] as $cookieName => $cookie)
            @include('eu-cookie-consent::cookie')
        @endforeach
    @endif
</div>
