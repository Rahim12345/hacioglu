<section class="contact-info" id="elaqe">
    <div class="container-contact">
        <div class="column-3">
            <h2>@lang('static.email')</h2>
            <p>
                <a href="mailto:{{ \App\Helpers\Contactor::get('email') }}">{{ \App\Helpers\Contactor::get('email') }}</a>
            </p>
        </div>
        <div class="column-3">
            <h2>@lang('static.phone')</h2>
            <p>
                <a href="tel:{{ \App\Helpers\Contactor::get('telfon') }}">{{ \App\Helpers\Contactor::get('telfon_oxunaqli') }}</a>
            </p>
            <a class="btn btn-outline-primary w-100" href="tel:{{ \App\Helpers\Contactor::get('telfon') }}"
            ><i class="fa fa-phone"></i> @lang('static.zeng_edin')</a
            >
        </div>
        <div class="column-3">
            <h2>@lang('static.unvan')</h2>
            <p>{{ \App\Helpers\Contactor::get('address_'.app()->getLocale()) }}</p>
        </div>
    </div>
</section>

<section class="result-show">
    <input type="hidden" id="lat" value="{{ \App\Helpers\Contactor::get('lat') }}">
    <input type="hidden" id="long" value="{{ \App\Helpers\Contactor::get('long') }}">
    <div id="map"></div>
</section>
