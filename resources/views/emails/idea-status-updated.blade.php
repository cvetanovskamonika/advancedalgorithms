@component('mail::message')
# Algorithm Status Updated

The algorithm: {{ $idea->title }}

has been updated to a status of:

{{ $idea->status->name }}

@component('mail::button', ['url' => route('idea.show', $idea)])
View Algorithm
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent