<div class="container">
    <h1>Congratulations!!!</h1>
    <p>Dear Applicant,</p>
    <hr>
    @if($custom_email_body != null)
        <p>{{ $custom_email_body }}</p>
        @else
        <p>Dear Applicant, Your application is approved . You will be notified about further process soon.</p>
    @endif
</div>