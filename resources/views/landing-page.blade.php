<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Ecommerce Example</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Montserrat%7CRoboto:300,400,700" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
        <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
        <link rel="stylesheet" href="{{ asset('css/responsive.css') }}">

    </head>
    <body>
        @include('inc.navbar')
        <header class="with-background">
            {{-- <div class="top-nav container">
                    <div class="logo">FourSeventy</div>
                    <ul>
                        <li>
                            <a href="/">Home <span class="sr-only">(current)</span></a>
                        </li>
                        <li>
                        <a href="/about">About</a>
                        </li>
                        <li >
                            <a href="/posts">Blog</a>
                        <li>
                            <a href="/shop">Shop</a>
                        </li>
                        </li>
                        <li>
                            <a href="{{ route('cart.index') }}">Cart <span class="cart-count">
                                @if (Cart::instance('default')->count() > 0)
                                <span>{{ Cart::instance('default')->count() }}</span></span>
                                @endif
                            </a>
                        </li>
                    </ul>
            </div> <!-- end top-nav --> --}}
            <div class="hero container">
                <div class="hero-copy">
                    <h1>Ecommerce and Blog Website</h1>
                    <p>Project built for Bracu CSE 470: Software Engineering course.</p>
                    <div class="hero-buttons">
                        <a href="/posts" class="button button-white">Blog Post</a>
                        <a href="https://github.com/mubtasimrobin" class="button button-white">GitHub</a>
                    </div>
                </div> <!-- end hero-copy -->

                <div class="hero-image">
                    <img src="img/cover.png" alt="hero image">
                </div> <!-- end hero-image -->
            </div> <!-- end hero -->
        </header>

        <div class="featured-section">

            <div class="container">
                <h1 class="text-center">Buy Vintage Products!</h1>
                <br>

                {{-- <p class="section-description">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore vitae nisi, consequuntur illum dolores cumque pariatur quis provident deleniti nesciunt officia est reprehenderit sunt aliquid possimus temporibus enim eum hic.</p> --}}

                <div class="products text-center">
                    @foreach ($products as $product)
                        <div class="product">
                            <a href="{{ route('shop.show', $product->slug) }}"><img src="{{ asset('img/products/'.$product->slug.'.jpg') }}" alt="product"></a>
                            <a href="{{ route('shop.show', $product->slug) }}"><div class="product-name">{{ $product->name }}</div></a>
                            <div class="product-price">{{ $product->presentPrice() }}</div>
                        </div>
                    @endforeach

                </div> <!-- end products -->

                <div class="text-center button-container">
                    <a href="{{ route('shop.index') }}" class="button">View more products</a>
                </div>

            </div> <!-- end container -->

        </div> <!-- end featured-section -->


        @include('partials.footer')


    </body>
</html>
