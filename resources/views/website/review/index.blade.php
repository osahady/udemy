<ul>
    @foreach ($reviews as $review)
        <li>{{ $review->stars }}</li>
    @endforeach
</ul>
