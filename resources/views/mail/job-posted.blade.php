<h2>
    {{ $job->title }}
</h2>

<p>
    Congrats! Your job has been Posted on our website.
</p>

<p>
    <a href="{{ url('/jobs/' . $job->id) }}">View Your Job Listing</a>
</p>
