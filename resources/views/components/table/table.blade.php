@props([
    'stickyScroll' => null,
    'customClass' => 'mb-12',
])

<div {{ $attributes->merge(['class' => 'overflow-hidden']) }} >
    <table class="min-w-full {{ $customClass }}" style="border-collapse: separate !important; border-spacing: 0px;">
        <thead class="bg-wild-sand-900">
        <tr>
            {{ $head }}

        </tr>
        </thead>

        <tbody class="bg-grey-800  divide-wild-sand-700">
        {{ $body }}
        </tbody>
    </table>
</div>
