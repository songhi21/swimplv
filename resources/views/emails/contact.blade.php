@component('mail::message')

<span style="font-weight: bold; color:rgb(17, 17, 17);font-family: Lucida Handwriting;">Swim Project 3 </span>
<br>
<strong>from: www.swimproject3.com</strong>
<br>
<h2><b>Contact Form Submission</b></h2>
<br>
<b>Name:</b><span>{{ $data['name'] }}</span> 
<br>
<b>Email:</b><span>{{ $data['email'] }}</span> 
<br>
<br>
<strong>Message:</strong>
<br>
<br>
<p>{{ $data['message'] }}</p>

@endcomponent