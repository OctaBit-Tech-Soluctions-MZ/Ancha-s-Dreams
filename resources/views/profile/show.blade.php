<div>

    <x-slot name="header">
        <h2 class="h4 text-dark fw-semibold">
            {{ __('Perfil') }}
        </h2>
    </x-slot>

    <div class="container mt-4">
        <div class="py-4">
            @if (Laravel\Fortify\Features::canUpdateProfileInformation())
                <div class="mb-4">
                    @livewire('profile.update-profile-information-form')
                </div>

                <hr>
            @endif

            @if (Laravel\Fortify\Features::enabled(Laravel\Fortify\Features::updatePasswords()))
                <div class="mt-4">
                    @livewire('profile.update-password-form')
                </div>

                <hr>
            @endif

            @if (Laravel\Fortify\Features::canManageTwoFactorAuthentication())
                <div class="mt-4">
                    @livewire('profile.two-factor-authentication-form')
                </div>

                <hr>
            @endif

            <div class="mt-4">
                @livewire('profile.logout-other-browser-sessions-form')
            </div>

            @if (Laravel\Jetstream\Jetstream::hasAccountDeletionFeatures())
                <hr>

                <div class="mt-4">
                    @livewire('profile.delete-user-form')
                </div>
            @endif
        </div>
    </div>
</div>
