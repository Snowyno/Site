<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" dir="{{ config()->get('direction') }}">
    
    <head>

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">

        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{-- Generate seo tags --}}
        {!! SEO::generate() !!}

        {{-- Favicon --}}
        <link rel="icon" type="image/png" href="{{ src( settings('general')->favicon ) }}"/>

        {{-- Fonts --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        {{-- Livewire styles --}}
        @livewireStyles

        {{-- Styles --}}
        <link href="{{ mix('css/app.css') }}" rel="stylesheet">

        {{-- Custom fonts --}}
		{!! settings('appearance')->font_link !!}

		{{-- Custom css --}}
        <style>
            :root {
                --color-primary  : {{ settings('appearance')->colors['primary'] }};
                --color-primary-h: {{ hex2hsl( settings('appearance')->colors['primary'] )[0] }};
                --color-primary-s: {{ hex2hsl( settings('appearance')->colors['primary'] )[1] }}%;
                --color-primary-l: {{ hex2hsl( settings('appearance')->colors['primary'] )[2] }}%;
            }
            html {
                font-family: @php echo settings('appearance')->font_family @endphp, sans-serif !important;
                background-image: url(https://p2win.com.br/public/img/auth/blur.jpg);
                background-size: cover;
            }
            body{
                background: none;
            }
        </style>

        {{-- Styles --}}
        @stack('styles')

        {{-- JavaScript variables --}}
        <script>
            __var_app_url        = "{{ url('/') }}";
            __var_app_locale     = "{{ app()->getLocale() }}";
            __var_rtl            = @js(config()->get('direction') === 'ltr' ? false : true);
            __var_primary_color  = "{{ settings('appearance')->colors['primary'] }}";
            __var_axios_base_url = "{{ url('/') }}/";
            __var_currency_code  = "{{ settings('currency')->code }}";
        </script>

        {{-- Custom head code --}}
        @if (settings('appearance')->custom_code_head_main_layout)
            {!! settings('appearance')->custom_code_head_main_layout !!}
        @endif

    </head>

    <body>

        <center>
        <main style="margin-top: 10%; border-radius: 25px" class="flex w-full flex-col items-center bg-white dark:bg-navy-700 lg:max-w-md">
        @yield('content')
        </main>
        </center>


        {{-- Notification --}}
        <x-notifications position="top-center" z-index="z-[60]" />

        {{-- Livewire scripts --}}
        @livewireScripts

        {{-- Wire UI --}}
        <wireui:scripts />

        {{-- Core Js --}}
        <script defer src="{{ mix('js/app.js') }}"></script>

        {{-- Helpers --}}
        <script src="{{ url('public/js/utils.js') }}"></script>

        {{-- Custom scripts --}}
        @stack('scripts')

        {{-- Custom footer code --}}
        @if (settings('appearance')->custom_code_footer_main_layout)
            {!! settings('appearance')->custom_code_footer_main_layout !!}
        @endif

    </body>

</html>