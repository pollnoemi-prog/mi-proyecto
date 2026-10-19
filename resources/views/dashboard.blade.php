<x-app-layout>
    <x-slot name="header">
        <div class="dashboard-header">
            <div>
                <p class="header-small">GLAMSTORE</p>
                <h2 class="header-title">Dashboard</h2>
            </div>

            <div class="header-welcome">Bienvenida 💗</div>
        </div>
    </x-slot>

    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

    <div class="dashboard-page">
        <!-- BIENVENIDA -->
        <section class="welcome-section">
            <div class="welcome-text">
                <p class="welcome-small">BIENVENIDA A GLAMSTORE</p>

                <h1>
                    Tu belleza,<br>
                    <span>tu estilo.</span>
                </h1>

                <p class="welcome-description">
                    Descubre productos de belleza, maquillaje
                    y cuidado personal pensados para ti.
                </p>

                <a href="#productos" class="shop-button">Explorar productos</a>
            </div>

            <div class="welcome-decoration">
                <div class="beauty-circle">✦</div>
                <span>BEAUTY</span>
            </div>
        </section>

        <!-- TARJETAS -->
        <section class="dashboard-cards">
            <div class="dashboard-card">
                <div class="card-icon">🛍️</div>
                <div>
                    <p class="card-title">Productos</p>
                    <p class="card-number">120+</p>
                </div>
            </div>

            <div class="dashboard-card">
                <div class="card-icon">💄</div>
                <div>
                    <p class="card-title">Categorías</p>
                    <p class="card-number">8</p>
                </div>
            </div>

            <div class="dashboard-card">
                <div class="card-icon">💕</div>
                <div>
                    <p class="card-title">Ofertas</p>
                    <p class="card-number">15</p>
                </div>
            </div>
        </section>

        <!-- PRODUCTOS -->
        <section class="products-section" id="productos">
            <div class="section-heading">
                <div>
                    <p class="section-small">DESCUBRE</p>
                    <h2>Productos destacados</h2>
                </div>

                <a href="#" class="see-more">Ver todos →</a>
            </div>

            <div class="products-grid">
                <div class="product-card">
                    <div class="product-image">💄</div>
                    <div class="product-info">
                        <p class="product-category">Maquillaje</p>
                        <h3>Lip Gloss</h3>
                        <p class="product-price">$199.00</p>
                        <button class="product-button">Ver producto</button>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-image">🧴</div>
                    <div class="product-info">
                        <p class="product-category">Skincare</p>
                        <h3>Serum Facial</h3>
                        <p class="product-price">$249.00</p>
                        <button class="product-button">Ver producto</button>
                    </div>
                </div>

                <div class="product-card">
                    <div class="product-image">💋</div>
                    <div class="product-info">
                        <p class="product-category">Maquillaje</p>
                        <h3>Lipstick</h3>
                        <p class="product-price">$179.00</p>
                        <button class="product-button">Ver producto</button>
                    </div>
                </div>
            </div>
        </section>

        <!-- CATEGORÍAS -->
        <section class="categories-section">
            <div class="section-heading">
                <div>
                    <p class="section-small">EXPLORA</p>
                    <h2>Categorías</h2>
                </div>
            </div>

            <div class="categories-grid">
                <div class="category-card">
                    <span>💄</span>
                    <h3>Maquillaje</h3>
                </div>

                <div class="category-card">
                    <span>🧴</span>
                    <h3>Skincare</h3>
                </div>

                <div class="category-card">
                    <span>💅</span>
                    <h3>Uñas</h3>
                </div>

                <div class="category-card">
                    <span>✨</span>
                    <h3>Accesorios</h3>
                </div>
            </div>
        </section>

        <!-- OFERTA -->
        <section class="offer-section">
            <div>
                <p class="offer-small">OFERTA ESPECIAL</p>
                <h2>
                    Todo lo que necesitas<br>
                    para sentirte increíble.
                </h2>

                <p>
                    Descubre nuestros productos favoritos
                    y encuentra tu nuevo básico de belleza.
                </p>

                <a href="#productos" class="offer-button">Comprar ahora</a>
            </div>

            <div class="offer-decoration">✦</div>
        </section>
    </div>

    <script src="{{ asset('js/dashboard.js') }}"></script>
</x-app-layout>
