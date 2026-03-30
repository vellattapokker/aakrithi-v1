@extends('layouts.app')
@section('title', 'Our Story | Aakrithi - The Shape of Modern Tradition')
@section('meta_title', 'About Aakrithi | Handcrafted Ethnic Wear & Artisanal Journey')
@section('meta_description', 'Discover the story behind Aakrithi – a boutique dedicated to blending traditional Indian craftsmanship with modern fashion. Learn about our commitment to sustainable and artisanal clothing.')
@section('meta_keywords', 'Aakrithi story, traditional Indian boutique, handcrafted ethnic wear, sustainable fashion, artisanal clothing journey')

@section('content')
<div class="about-hero">
    <div class="container">
        <h1>Our Story</h1>
        <p>Aakrithi — The Shape of Modern Tradition</p>
    </div>
</div>

<div class="container">
    <div class="about-section">
        <div class="about-text">
            <h2>The Beginning</h2>
            <p>Founded in 2026, Aakrithi Clothing was born out of a desire to blend traditional Indian craftsmanship with modern, minimalist silhouettes. Our journey started in a small workshop with a single mission: to create clothing that speaks to the contemporary soul while honoring our rich textile heritage.</p>
        </div>
        <div class="about-image">
            <img src="{{ asset('images/workshop.png') }}" alt="Aakrithi artisanal workshop – where traditional Indian craftsmanship meets modern design" style="border-radius: var(--border-radius);">
        </div>
    </div>

    <div class="about-section" style="direction: rtl;">
        <div class="about-text" style="direction: ltr;">
            <h2>Our Philosophy</h2>
            <p>Every garment is a dialogue between tradition and innovation. We source textiles from local artisans across India, ensuring fair wages and sustainable practices. Our designs are minimal yet expressive, functional yet beautiful.</p>
        </div>
        <div class="about-image" style="direction: ltr;">
            <img src="{{ asset('images/cat_dresses.png') }}" alt="Sustainable and ethically sourced designer dresses by Aakrithi" style="border-radius: var(--border-radius);">
        </div>
    </div>

    <div style="text-align:center; margin-bottom: 3rem;">
        <h2 style="margin-bottom: 3rem;">Our Values</h2>
        <div class="values-grid">
            <div class="value-card">
                <h3>Sustainability</h3>
                <p>Ethically sourced materials and eco-friendly practices at every step of production.</p>
            </div>
            <div class="value-card">
                <h3>Craftsmanship</h3>
                <p>Each piece is meticulously crafted by skilled artisans preserving traditional techniques.</p>
            </div>
            <div class="value-card">
                <h3>Inclusivity</h3>
                <p>Fashion for every body, every age, and every occasion. Style knows no boundaries.</p>
            </div>
        </div>
    </div>
</div>
@endsection
