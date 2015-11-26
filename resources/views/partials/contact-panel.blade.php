<div id="contactbox">
    <h3>Contact us:</h3>
    <p><em>Your ideas and feedbacks concern us, let them reach us!</em></p>
    <form class="form-horizontal" role="form" method="POST" action="{{ url('/contact') }}">
        <input type="hidden" name="_token" value="{{ csrf_token() }}">
        
        <div class="form-group">
            <textarea class="form-control" placeholder="Your message here" required name="contact-msg" id="" rows="10"></textarea>
        </div>

        <div class="form-group">
                <input type="submit" value="send" class="btn btn-primary">
        </div>
    </form>
</div>