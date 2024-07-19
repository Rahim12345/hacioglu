<section class="gallery" id="portfolio">
    <div class="gallery-container">
        <h2 class="gallery-title">@lang('menu.portfolio')</h2>
        {{--        <p>--}}
        {{--            This gallery contains only a small part of the work of our detailing--}}
        {{--            center.<br/>--}}
        {{--            And your car will be in the top gallery of our website.--}}
        {{--        </p>--}}
        <div id="lightgallery" class="gallery">
            @foreach($works as $work)
                <a
                    href="{{ asset('files/home/brands/'.$work->photo) }}"
                    class="gallery-item"
                >
                    <img
                        src="{{ asset('files/home/brands/'.$work->photo) }}"
                        alt="{{ $work->{'alt_'.app()->getLocale()} }}"
                    />
                </a>
            @endforeach
            <!-- Add more images as needed -->
        </div>
    </div>
</section>
