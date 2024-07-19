<section class="services-section" id="xidmetler">
    <div class="gallery-container">
        <h2 class="gallery-title">@lang('menu.services')</h2>
    </div>
</section>
<section class="services-section">
    @foreach($services as $service)
        <div class="service-card">
            <a href="{{ route('front.services',['slug'=>$service->{'slug_'.app()->getLocale()}]) }}">
                <div
                        class="cover-image"
                        style="
            background-image: url('{!! asset('files/services/'.$service->photo) !!}');
          "
                ></div>
                <div class="service-content">
                    <h3>{!! $service->{'name_'.app()->getLocale()} !!}</h3>
                    <div class="arrow"><i class="fa fa-chevron-right" aria-hidden="true"></i></div>
                </div>
            </a>
        </div>
    @endforeach
</section>
