<!DOCTYPE html>
<html>

<head>
    <title></title>
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
    <div class="main-box">
        <div class="design-box">
            <header class="flex-space-box">
                <div class="logo">
                    <a href="#">
                        <img src="{{ asset('assets/images/logo.svg') }}">
                    </a>
                </div>
                <div class="account-detail flex-space-box">
                    <div class="users-box flex-space-box">
                        <div class="user-thumb">
                            <img src="{{ asset('assets/images/user.jpg') }}">
                        </div>
                        <div class="user-name">Williams White</div>
                    </div>
                    <div class="button-box">
                        <button class="blue-button flex-space-box">Logout
                            <img src="{{ asset('assets/images/icon-logout.svg') }}"></button>
                    </div>
                </div>
            </header>

            <div id="render"></div>

            <section class="title-box-top">
                <h1 class="page-title">
                    <b>Subscription Plans</b>
                </h1>
                <h2 class="x-small-title">
                    <strong>You may choose the plans which will be best suited your requirements.</strong>
                </h2>
            </section>

            <form action="{{ route('get-subscription') }}" method="post" id="frmSubscription">
                @csrf
                <section class="plans-box">
                    <h2 class="title-small section-title">
                        <strong>Our New Plans</strong>
                    </h2>
                    <div id="accordion" class="accordion">
                        @foreach ($plans as $key => $plan)
                            <div class="accordion-item plan-box">
                                <div class="card-header collapsed" data-toggle="collapse"
                                    href="#collapse{{ $key }}">
                                    <div class="flex-space-box top-arrow-box">
                                        <h3 class="title">
                                            <b>
                                                {{ $plan['title'] }}
                                                <sub>(Any {{ $plan['min_package'] }} Full Packages)</sub>
                                            </b>
                                        </h3>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="21.988" height="12.569"
                                            viewBox="0 0 21.988 12.569">
                                            <path id="Path_22845" data-name="Path 22845"
                                                d="M10.992,0A1.542,1.542,0,0,0,9.9.46L.453,9.927a1.549,1.549,0,0,0,2.191,2.19l8.35-8.376,8.348,8.372a1.549,1.549,0,1,0,2.195-2.187L12.093.455A1.537,1.537,0,0,0,11,0Z"
                                                fill="#232323" />
                                        </svg>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="general-check-box round">
                                            <input type="radio" name="subscription[{{ $plan['id'] }}][plan]"
                                                id="cbWeeklyPlan{{ $key }}" data-id="{{ $plan['id'] }}"
                                                data-type="Weekly Subscription Plan" class="plan-type"
                                                value="{{ $plan['weekly_price'] }}">
                                            <label for="cbWeeklyPlan{{ $key }}">
                                                ${{ number_format($plan['weekly_price'], 2) }}
                                                <sub>Weekly Plan</sub>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="general-check-box round">
                                            <input type="radio" name="subscription[{{ $plan['id'] }}][plan]"
                                                id="cbMonthlyPlan{{ $key }}" data-id="{{ $plan['id'] }}"
                                                data-type="Monthly Subscription Plan" class="plan-type"
                                                value="{{ $plan['monthly_price'] }}">
                                            <label for="cbMonthlyPlan{{ $key }}">
                                                ${{ number_format($plan['monthly_price'], 2) }}
                                                <sub>Monthly Plan</sub>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div id="collapse{{ $key }}" class="card-body collapse"
                                    data-parent="#accordion">
                                    <div id="subaccordion{{ $key }}" class="accordion sub-accordion">
                                        @foreach ($packages as $pkey => $package)
                                            <div class="accordion-item">
                                                <div class="card-header collapsed" data-toggle="collapse"
                                                    href="#collapseSub_{{ $key }}_{{ $pkey }}">
                                                    <div class="flex-space-box top-arrow-box">
                                                        <div class="general-check-box with-no-label">
                                                            <input type="checkbox"
                                                                name="subscription[{{ $plan['id'] }}][package][]"
                                                                id="cbPackage{{ $key }}{{ $pkey }}"
                                                                value="{{ $package['id'] }}">
                                                            <label class="title-small"
                                                                for="cbPackage{{ $key }}{{ $pkey }}">
                                                                {{ $package['title'] }}
                                                            </label>
                                                        </div>
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="21.988"
                                                            height="12.569" viewBox="0 0 21.988 12.569">
                                                            <path id="Path_22845" data-name="Path 22845"
                                                                d="M10.992,0A1.542,1.542,0,0,0,9.9.46L.453,9.927a1.549,1.549,0,0,0,2.191,2.19l8.35-8.376,8.348,8.372a1.549,1.549,0,1,0,2.195-2.187L12.093.455A1.537,1.537,0,0,0,11,0Z"
                                                                fill="#232323" />
                                                        </svg>
                                                    </div>
                                                </div>
                                                <div id="collapseSub_{{ $key }}_{{ $pkey }}"
                                                    class="card-body collapse"
                                                    data-parent="#subaccordion{{ $key }}">
                                                    <div class="sub-accordion-content">
                                                        <p>{{ $package['description'] }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </section>

                <section class="action-btn">
                    <button type="submit" class="blue-button medium-size-btn" id="btnSubmit">
                        Proceed to Pay
                    </button>
                </section>
            </form>
        </div>

        <div class="photo-box">
            <img src="{{ asset('assets/images/sidebar-panel.jpg') }}">
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>

    <script>
        $("#frmSubscription").submit(function(e) {
            e.preventDefault();

            let count = 0;
            let form = $(this),
                url = form.attr('action'),
                formData = new FormData(this);

            for (var pair of formData.entries()) {
                count++;
            }

            if (count > 1) {
                $.ajax({
                    type: "POST",
                    url: url,
                    data: formData,
                    beforeSend: function() {
                        $('#btnSubmit').hide();
                    },
                    success: function(res) {
                        $('#btnSubmit').show();

                        if (res.success) {
                            $("#frmSubscription")[0].reset();
                            $('.title-box-top, .plans-box, .action-btn').addClass('d-none')
                            $('#render').html(res.html);
                        } else {
                            alert(res.msg);
                        }
                    },
                    cache: false,
                    contentType: false,
                    processData: false
                });
            } else {
                alert('Please select plan first!');
            }
        });

        $('.plan-type').on('click', function() {
            $('.plans-box').append('<input type="hidden" name="subscription[' + $(this).attr('data-id') +
                '][type]" value="' + $(this).attr('data-type') + '" />');
        });
    </script>
</body>

</html>
