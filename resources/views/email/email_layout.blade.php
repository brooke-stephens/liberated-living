<!DOCTYPE html>
<html lang="en-US">
<head>
    <meta charset="utf-8">
</head>
<body>
<h2>New Contact Request From {{ $sitename }}</h2>

<div>
    Hi, Susan. You had a form submission from your contact page.  
    <br><br>
    <strong>Subject:</strong>
    <hr><br>
    {{ $clientsubject }}<br>
	<br><br><strong>Message:</strong><hr><br>

  {{ $body }}

    
</div>

</body>
</html>