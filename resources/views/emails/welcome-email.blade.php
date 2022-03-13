@component('mail::message')
# Welcome to freeCodeGram

This is a community of a fellow developers and we love that you have joined us.

@component('mail::button', ['url' => ''])
Maybe a verify button?
@endcomponent

All the best,<br>
{{ config('app.name') }}, gucci PHP framework!
@endcomponent
