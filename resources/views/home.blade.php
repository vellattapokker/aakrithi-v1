@extends('layouts.app')
@section('meta_title', setting('site_title', 'Aakrithi - Modern Fashion Ecommerce'))
@section('meta_description', setting('site_description', 'Discover our curated collection of artisanal clothing designed for comfort and elegance.'))
@section('meta_keywords', setting('meta_keywords', 'fashion, artisanal, ethnic wear, saree, kurta'))

@section('content')
{{-- Hero --}}
<section class="hero">
    <div class="hero-content fade-in-up">
        <span class="hero-subtitle">Spring / Summer 2026</span>
        <h1 class="hero-title">Timeless Style for the Modern Soul</h1>
        <p class="hero-description">Discover our curated collection of artisanal clothing designed for comfort and elegance.</p>
        <div class="hero-actions">
            <a href="{{ route('shop') }}" class="btn-primary">Shop Collection <i data-lucide="arrow-right"></i></a>
            <a href="{{ route('about') }}" class="btn-secondary">Explore Stories</a>
        </div>
    </div>
</section>

{{-- Categories --}}
<div class="container">
    <div class="section-header">
        <div>
            <h2>Shop by Category</h2>
        </div>
        <a href="{{ route('shop') }}">View All</a>
    </div>
    <div class="categories-grid">
        <a href="{{ route('category', 'apparels') }}" class="category-item">
            <img src="{{ asset('images/cat_dresses.png') }}" alt="Designer Kurthies" loading="lazy">
            <div class="category-overlay">Designer Kurthies</div>
        </a>
        <a href="{{ route('category', 'kutties') }}" class="category-item">
            <img src="{{ asset('images/cat_sets.png') }}" alt="Kerala Sets" loading="lazy">
            <div class="category-overlay">Kerala Sets</div>
        </a>
        <a href="{{ route('category', 'decors') }}" class="category-item">
            <img src="{{ asset('images/cat_sarees.png') }}" alt="Embroidered Sarees" loading="lazy">
            <div class="category-overlay">Embroidered Sarees</div>
        </a>
    </div>

    {{-- Featured Products --}}
    <div class="section-header">
        <div>
            <h2>Signature Collections</h2>
            <p>Handpicked pieces for your wardrobe</p>
        </div>
        <a href="{{ route('shop') }}">View All</a>
    </div>
    <div class="products-grid">
        @foreach($products as $product)
        <a href="{{ route('product', $product->slug) }}" class="product-card" style="text-decoration:none; color:inherit;">
            <div class="product-image-container">
                @if($product->badge)
                <span class="badge">{{ $product->badge }}</span>
                @endif
                <img src="{{ $product->image }}" alt="{{ $product->name }}" class="product-image" loading="lazy">
                <div class="product-overlay">
                    <span class="overlay-btn primary">
                        <i data-lucide="shopping-bag"></i>
                    </span>
                    <button class="overlay-btn" onclick="event.preventDefault(); addToWishlist({{ $product->id }});"><i data-lucide="heart"></i></button>
                </div>
            </div>
            <div class="product-info">
                <p class="product-category">{{ $product->category }}</p>
                <h3 class="product-name">{{ $product->name }}</h3>
                <p class="product-price">₹{{ number_format($product->price) }}</p>
            </div>
        </a>
        @endforeach
    </div>

    {{-- Instagram --}}
    <div class="section-header center">
        <h2>Follow @aakrithiclothing</h2>
        <p>Inspired by our community around the globe</p>
    </div>
    <div class="instagram-grid">
        <div class="instagram-item"><img src="{{ asset('images/insta_1.png') }}" alt="Instagram post" loading="lazy"></div>
        <div class="instagram-item"><img src="{{ asset('images/prod_1.png') }}" alt="Instagram post" loading="lazy"></div>
        <div class="instagram-item"><img src="{{ asset('images/prod_2.png') }}" alt="Instagram post" loading="lazy"></div>
        <div class="instagram-item"><img src="{{ asset('images/prod_3.png') }}" alt="Instagram post" loading="lazy"></div>
        <div class="instagram-item"><img src="{{ asset('images/cat_dresses.png') }}" alt="Instagram post" loading="lazy"></div>
        <div class="instagram-item"><img src="{{ asset('images/cat_sets.png') }}" alt="Instagram post" loading="lazy"></div>
    </div>
</div>
@endsection
