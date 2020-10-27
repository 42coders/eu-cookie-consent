<div style="{{ config('eu-cookie-consent.popup_style') }}" class="{{ config('eu-cookie-consent.popup_classes') }}">
    @if(isset($config['title']))
        <div style="width: 100%;">
            <p>
                <b>
                    @if($multiLanguageSupport)
                        {{ __('eu-cookie-consent::cookies.'.$config['title']) }}
                    @else
                        {{ $config['title'] }}
                    @endif
                </b>
            </p>
        </div>
    @endif
    @if(isset($config['description']))
        <div style="width: 100%;">
            @if($multiLanguageSupport)
                {{ __('eu-cookie-consent::cookies.'.$config['description']) }}
            @else
                {{ $config['description'] }}
            @endif
        </div>
    @endif
        <div style="width: 100%;">
    <form action="{{ config('eu-cookie-consent.route') }}" method="POST">

            @foreach($config['categories'] as $categoryName => $category)
                @include('eu-cookie-consent::category')
            @endforeach
        </div>
        <div style="margin-top: 20px;">
            <style>
                .eu-popup-save-button{
                    background-color: white;
                    padding: 10px;
                    padding-left: 20px;
                    padding-right: 20px;
                    border: 1px lightgray solid;
                    border-radius: 10px;
                }
                .eu-popup-save-button:hover{
                    background-color: lightgray;
                    cursor: pointer;
                }
            </style>
            <button type="submit" class="eu-popup-save-button">
                @if($multiLanguageSupport)
                    {{__('eu-cookie-consent::cookies.save')}}
                @else
                    {{ $config['saveButton'] }}
                @endif
            </button>
    </form>
        </div>
</div>
