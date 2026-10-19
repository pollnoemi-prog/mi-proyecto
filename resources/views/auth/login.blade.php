<x-guest-layout>

    <!-- CSS del login -->
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">


    <div class="login-page">

        <!-- =================================
             LADO IZQUIERDO
        ================================== -->

        <div class="login-info">

            <div class="brand">
                GLAM<span>STORE</span>
            </div>


            <div class="login-info-content">

                <p class="small-title">
                    BIENVENIDA DE NUEVO
                </p>

                <h1>
                    Tu belleza,<br>
                    <span>tu estilo.</span>
                </h1>

                <p>
                    Inicia sesión y continúa descubriendo
                    productos de belleza pensados para ti.
                </p>


                <div class="beauty-decoration">

                    <span>✦</span>

                    BEAUTY

                    <span>✦</span>

                </div>

            </div>

        </div>


        <!-- =================================
             LADO DERECHO
        ================================== -->

        <div class="login-container">

            <div class="login-card">


                <!-- LOGO -->
                <div class="login-logo">
                    GLAM<span>STORE</span>
                </div>


                <h2>
                    Iniciar sesión
                </h2>

                <p class="login-subtitle">
                    Ingresa a tu cuenta para continuar
                </p>


                <!-- MENSAJE DE ESTADO -->

                @session('status')

                    <div class="status-message">

                        {{ $value }}

                    </div>

                @endsession


                <!-- ERRORES -->

                <x-validation-errors class="validation-errors" />


                <!-- =================================
                     FORMULARIO ORIGINAL DE LARAVEL
                ================================== -->

                <form
                    method="POST"
                    action="{{ route('login') }}"
                    id="loginForm"
                >

                    @csrf


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
                            autofocus
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
                            autocomplete="current-password"
                            placeholder="Escribe tu contraseña"
                        />

                    </div>


                    <!-- RECORDARME -->

                    <div class="remember-container">

                        <label
                            for="remember_me"
                            class="remember-label"
                        >

                            <x-checkbox
                                id="remember_me"
                                name="remember"
                                class="remember-checkbox"
                            />

                            <span>
                                {{ __('Recordarme') }}
                            </span>

                        </label>


                        @if (Route::has('password.request'))

                            <a
                                href="{{ route('password.request') }}"
                                class="forgot-link"
                            >
                                ¿Olvidaste tu contraseña?
                            </a>

                        @endif

                    </div>


                    <!-- BOTÓN -->

                    <button
                        type="submit"
                        class="login-button"
                        id="loginButton"
                    >
                        Iniciar sesión
                    </button>


                    <!-- REGISTRO -->

                    <div class="register-link">

                        ¿No tienes una cuenta?

                        <a href="{{ route('register') }}">
                            Regístrate
                        </a>

                    </div>

                </form>

            </div>

        </div>

    </div>


    <!-- JS del login -->
    <script src="{{ asset('js/login.js') }}"></script>

</x-guest-layout>
