<h2>New Contact Form Submission</h2>

<p><strong>Name:</strong> {{ $data['first_name'] }} {{ $data['last_name'] }}</p>
<p><strong>Email:</strong> {{ $data['email'] }}</p>
<p><strong>Phone:</strong> {{ $data['phone'] ?? 'N/A' }}</p>
<p><strong>Company:</strong> {{ $data['company'] ?? 'N/A' }}</p>
<p><strong>Inquiry Type:</strong> {{ $data['inquiry_type'] }}</p>

<h3>Message</h3>
<p>{{ $data['message'] }}</p>
