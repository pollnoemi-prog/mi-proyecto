<x-guest-layout>

    {{-- CSS propio del registro --}}
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">

    <div class="register-page">

        <!-- LADO IZQUIERDO -->
        <div class="register-info">

            <div class="brand">
                GLAM<span>STORE</span>
            </div>

            <div class="info-content">

                <p class="small-title">
                    BIENVENIDA A GLAM STORE
                </p>

                <h1>
                    Crea tu cuenta.<br>
                    <span>Descubre tu estilo.</span>
                </h1>

                <p>
                    Regístrate para descubrir nuestros productos,
                    conocer nuestras novedades y disfrutar de una
                    experiencia de compra pensada para ti.
                </p>

                <div class="beauty-decoration">
                    <span>✦</span>
                    BEAUTY
                    <span>✦</span>
                </div>

            </div>

        </div>


        <!-- LADO DERECHO -->
        <div class="register-container">

            <div class="register-card">

                <div class="register-logo">
                    GLAM<span>STORE</span>
                </div>

                <h2>
                    Crear una cuenta
                </h2>

                <p class="register-subtitle">
                    Regístrate para comenzar
                </p>


                {{-- ERRORES DE VALIDACIÓN --}}
                <x-validation-errors class="validation-errors" />


                {{-- FORMULARIO ORIGINAL DE LARAVEL --}}
                <form method="POST" action="{{ route('register') }}">

                    @csrf


                    <!-- NOMBRE -->
                    <div class="form-group">

                        <x-label
                            for="name"
                            value="{{ __('Nombre') }}"
                            class="form-label"
                        />

                        <x-input
                            id="name"
                            class="form-input"
                            type="text"
                            name="name"
                            :value="old('name')"
                            required
                            autofocus
                            autocomplete="name"
                            placeholder="Escribe tu nombre"
                        />

                    </div>


                    <!-- CORREO -->
                    <div class="form-group">

                        <x-label
                            for="email"
                            value="{{ __('Correo electrónico') }}"
                            class="form-label"
                        />

                        <x-input
                            id="email"
                            class="form-input"
                            type="email"
                            name="email"
                            :value="old('email')"
                            required
                            autocomplete="username"
                            placeholder="ejemplo@correo.com"
                        />

                    </div>


                    <!-- CONTRASEÑA -->
                    <div class="form-group">

                        <x-label
                            for="password"
                            value="{{ __('Contraseña') }}"
                            class="form-label"
                        />

                        <x-input
                            id="password"
                            class="form-input"
                            type="password"
                            name="password"
                            required
                            autocomplete="new-password"
                            placeholder="Crea una contraseña"
                        />

                    </div>


                    <!-- CONFIRMAR CONTRASEÑA -->
                    <div class="form-group">

                        <x-label
                            for="password_confirmation"
                            value="{{ __('Confirmar contraseña') }}"
                            class="form-label"
                        />

                        <x-input
                            id="password_confirmation"
                            class="form-input"
                            type="password"
                            name="password_confirmation"
                            required
                            autocomplete="new-password"
                            placeholder="Repite tu contraseña"
                        />

                    </div>


                    <!-- TÉRMINOS -->
                    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())

                        <div class="terms">

                            <x-label for="terms">

                                <div class="terms-content">

                                    <x-checkbox
                                        name="terms"
                                        id="terms"
                                        required
                                    />

                                    <div class="terms-text">

                                        {!! __('Acepto los :terms_of_service y la :privacy_policy', [

                                            'terms_of_service' =>
                                            '<a target="_blank"
                                            href="'.route('terms.show').'"
                                            class="terms-link">
                                            '.__('Terms of Service').'
                                            </a>',

                                            'privacy_policy' =>
                                            '<a target="_blank"
                                            href="'.route('policy.show').'"
                                            class="terms-link">
                                            '.__('Privacy Policy').'
                                            </a>',

                                        ]) !!}

                                    </div>

                                </div>

                            </x-label>

                        </div>

                    @endif


                    <!-- ACCIONES -->
                    <div class="register-actions">

                        <button
                            type="submit"
                            class="register-button"
                        >
                            Crear cuenta
                        </button>

                        <a
                            href="{{ route('login') }}"
                            class="login-link"
                        >
                            ¿Ya tienes una cuenta?
                            <span>Inicia sesión</span>
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>


    {{-- JS propio del registro --}}
    <script src="{{ asset('js/register.js') }}"></script>

</x-guest-layout>
