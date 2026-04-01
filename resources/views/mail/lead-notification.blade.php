<h2>New Lead Captured</h2>

<p><strong>Name:</strong> {{ $lead->first_name }} {{ $lead->last_name }}</p>
<p><strong>Email:</strong> {{ $lead->email }}</p>
<p><strong>Phone:</strong> {{ $lead->phone ?? 'N/A' }}</p>
<p><strong>Company:</strong> {{ $lead->company ?? 'N/A' }}</p>

<h3>Activity Details</h3>
<p><strong>Type:</strong> {{ ucfirst(str_replace('_', ' ', $activity->type)) }}</p>
@if($activity->landingPage)
<p><strong>Page:</strong> {{ $activity->landingPage->title }}</p>
@endif
@if($activity->metadata)
<h4>Submitted Data</h4>
<ul>
@foreach($activity->metadata as $key => $value)
    @if($value && !in_array($key, ['website', '_token']))
    <li><strong>{{ ucfirst(str_replace('_', ' ', $key)) }}:</strong> {{ $value }}</li>
    @endif
@endforeach
</ul>
@endif
