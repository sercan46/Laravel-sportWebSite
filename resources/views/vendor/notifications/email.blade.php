@component('mail::message')
{{-- Greeting --}}
@if (! empty($greeting))
# {{ $greeting }}
@else
@if ($level == 'error')
# @lang('Whoops!')
@else
# @lang('Merhaba!')
@endif
@endif

{{-- Intro Lines --}}
@foreach ($introLines as $line)
{{ $line }}

@endforeach

{{-- Action Button --}}
@isset($actionText)
<?php
switch ($level) {
        case 'success':
        case 'error':
            $color = $level;
            break;
        default:
            $color = 'success';
}
?>
@component('mail::button', ['url' => $actionUrl, 'color' => $color])
{{ $actionText }}
@endcomponent
@endisset

{{-- Outro Lines --}}
@foreach ($outroLines as $line)
{{ $line }}

@endforeach

{{-- Salutation --}}
@if (! empty($salutation))
{{ $salutation }}
@else
@lang('Saygılar'),<br>{{ config('app.name') }}
@endif

{{-- Subcopy --}}
@isset($actionText)
@slot('subcopy')
@lang(
    "Eğer\":actionText\"butonuna tıklayamıyorsanız aşağıdaki adresi tarayıcınıza yazınıp enter tuşuna basınız.",
    [
        'actionText' => $actionText,

    ]
    )
 ({!! $actionUrl !!})

@endslot
@endisset
@endcomponent
