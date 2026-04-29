<x-app-layout>
    <x-slot name="header">
        <h2 class="h4 text-dark mb-0">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow-sm mb-4">
                    <div class="card-body p-4">
                        <div style="max-width: 600px;">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm mb-4">
                    <div class="card-body p-4">
                        <div style="max-width: 600px;">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>
                </div>

                <div class="card shadow-sm border-danger mb-4">
                    <div class="card-body p-4">
                        <div style="max-width: 600px;">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
