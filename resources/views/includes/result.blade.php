<section class="result-show">
    <div class="row small">
        @foreach($pairs as $pair)
            <div class="imageReveal">
                <img
                    src="{{ asset('images/'.$pair->before_image) }}"
                    title="@lang('static.evvel')"
                />
                <img
                    src="{{ asset('images/'.$pair->after_image) }}"
                    title="@lang('static.sonra')"
                />
            </div>
        @endforeach
    </div>
</section>
