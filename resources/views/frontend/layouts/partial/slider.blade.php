<!-- ======= Hero Section ======= -->
<section id="hero">
    <a href="https://idabaward.com" target="_blank" rel="noopener noreferrer" class="hero-link">
        <div class="hero-container">
            <!-- Content optional, ekhane dynamic text o rakhte paren -->
        </div>
    </a>
</section><!-- End Hero -->

<style>
    /* Hero Parent Container */
#hero {
    width: 100%;
    height: 100vh; /* Athoba apnar height dorkar onujayi (e.g., 600px) set korun */
}

.hero-link {
    display: block;
    width: 100%;
    height: 100%;
    text-decoration: none;
}

/* Background Image Set Up */
.hero-container {
    width: 100%;
    height: 100%;
    background-image: url('{{ asset('public/images/pages/hero-banner.png') }}');
    background-size: cover;       /* Container scaling smooth rakhar jonno */
    background-position: center;  /* Image exact center-e align korbe */
    background-repeat: no-repeat; /* Chhobi repeat hobe na */
    cursor: pointer;
    transition: transform 0.3s ease; /* Hover effect Option (Optional) */
}

/* Hover-e halka zoom effect (Optional) */
.hero-link:hover .hero-container {
    transform: scale(1.01);
}

@media (max-width: 768px) {
    #hero {
        /* Mobile-e screen size smaller hone height adjust korar jonno */
        height: 35vh; 
        min-height: 300px;
    }

    .hero-container {
        /* Mobile layout-e image focus thik rakhar jonno position center */
        background-position: center center;
        background-size: cover; /* Ba aspect ratio hold korte 'contain' o use korte paren */
    }
    
    #feature{
        display:none;
    }
}
</style>