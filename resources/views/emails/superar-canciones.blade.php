<x-mail::message>
    <img src="{{ $message->embedData(
        data: '<svg class="h-2 w-2"
        xmlns="http://www.w3.org/2000/svg"
        viewBox="0 0 20 20">
        <path fill-rule="evenodd"
            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
            clip-rule="evenodd" />
        </svg>',
        name: 'logo.svg',
        contentType: 'image/svg+xml',
    )}}" />


# Introduction

![]({{ $message->embed(public_path('storage/imagenes/1.jpg')) }})

The **body** of your <strong>message</strong>.

<x-mail::button :url="''">
Button Text
</x-mail::button>

<x-mail::panel>
This is the panel content.
</x-mail::panel>

<x-mail::table>
| Laravel       | Table         | Example       |
| ------------- | :-----------: | ------------: |
| Col 2 is      | Centered      | $10           |
| Col 3 is      | Right-Aligned | $20           |
</x-mail::table>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
