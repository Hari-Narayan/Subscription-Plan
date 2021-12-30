<section class="text-center download-section">
    <div class="image-box">
        <img src="{{ asset('assets/images/successfful-image.png') }}">
    </div>
    <h3>Payment Successful!</h3>
    <h4>Download Our App</h4>
    <div class="download-buttons">
        <div class="download-item">
            <a href="#">
                <img src="{{ asset('assets/images/google-play-badge.svg') }}">
            </a>
        </div>
        <div class="download-item">
            <a href="#">
                <img src="{{ asset('assets/images/app-store-apple.svg') }}">
            </a>
        </div>
    </div>
</section>

<section class="main-plan-item current-plan">
    <h2 class="title-small section-title">
        <strong>Subscribed plans</strong>
    </h2>
    @foreach ($subscribed as $value)
        <div class="plan-box highlight-border mb-4">
            <div class="flex-space-box flex-align-top">
                <div class="label-line">
                    <span class="highlight-color">
                        {{ $value['type'] }}
                    </span>
                </div>
                <img src="{{ asset('assets/images/checked-round-green.svg') }}">
            </div>
            <h3 class="title"><b>{{ $value['name'] }}</b></h3>
            <div class="flex-space-box flex-align-bottom">
                <h4 class="x-small-title medium">
                    @foreach ($value['packages'] as $item)
                        <span class="badge badge-pill badge-primary p-2">
                            {{ $item['title'] }}
                        </span>
                    @endforeach
                </h4>
                <span class="page-title">
                    <strong>${{ number_format($value['price'], 2) }}</strong>
                </span>
            </div>
        </div>
    @endforeach
</section>
