<section class="youtube">
    <div class="container-youtube">
        <div class="text-section">
            <h1>{{ config('app.name') }}</h1>
            <p>@lang('static.netice_gosteririk')</p>
            <a href="tel:{{ \App\Helpers\Contactor::get('telfon') }}" style="text-decoration: none" class="call-button">@lang('static.zeng_edin')</a>
        </div>

        <div class="video-section">
            {!! \App\Helpers\Contactor::get('youtube_link') !!}
        </div>
        <div class="second-section">
            <div class="about">
                <h1>@lang('static.about')</h1>
            </div>
            <div class="seconds">
                <h1>@lang('static.60_saniyede')</h1>
            </div>
        </div>
    </div>
</section>
