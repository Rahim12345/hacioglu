<section class="reviews">
    @foreach($reviews as $review)
        <div class="review">
            <img
                src="{{ asset('files/home/brands/'.$review->photo) }}"
                alt="{{ $review->{'alt_'.app()->getLocale()} }}"
            />
        </div>
    @endforeach
</section>
