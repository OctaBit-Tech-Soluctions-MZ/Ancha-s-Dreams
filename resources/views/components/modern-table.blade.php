
    <!-- Start Enrole Course  -->
    <div class="rbt-dashboard-content bg-color-white rbt-shadow-box">
        <div>
            <div class="section-title">
                <h4 class="rbt-title-style-3">{{ $title }}</h4>
            </div>

            <div class="rbt-dashboard-table table-responsive mobile-table-750">
                <table class="rbt-table table table-borderless">
                    @if (isset($header))
                        <thead>
                            {{ $header }}
                        </thead>
                    @endif
                    <tbody>
                        {{ $slot }}
                    </tbody>
                </table>
            </div>

        </div>
    </div>
    <!-- End Enrole Course  -->
