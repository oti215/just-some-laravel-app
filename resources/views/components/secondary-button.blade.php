@props(['text', 'href' => null])

<x-button :text="$text" :href="$href" secondary outline {{ $attributes }} />