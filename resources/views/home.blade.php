@include ('includes.header')
        <div id="hero-home" class="hero">
            <p>A little space for book lovers</p>
            <div>
                <h1>Find your next favorite story.</h1>
                <p>Discover books that inspire, comfort and stay with you long after the last page.</p>
            </div>
            <a href="{{ route('catalog') }}">Explore the catalog ⤴</a>
        </div>

        <div id="hero-section">
            <h1>Discover our collection</h1>
            <p>Stories for every mood, every moment and every kind of reader.</p>
            <div id="hero-section-images">

                <div class="hero-images">
                    <div class="image-container">
                        <img src="{{ asset('images/home/classic.jpg') }}" alt="Classic books">
                    </div>
                    <p class="hero-p">Classic</p>
                    <p class="hero-desc">Timeless stories</p>
                </div>

                <div class="hero-images">
                    <div class="image-container">
                        <img src="{{ asset('images/home/fiction.jpeg') }}" alt="Fiction books">
                    </div>
                    <p class="hero-p">Fiction</p>
                    <p class="hero-desc">Stories to get lost in</p>
                </div>

                <div class="hero-images">
                    <div class="image-container">
                        <img src="{{ asset('images/home/health.jpg') }}" alt="Health books">
                    </div>
                    <p class="hero-p">Personal health</p>
                    <p class="hero-desc">Ideas that inspire</p>
                </div>

                <div class="hero-images">
                    <div class="image-container">
                        <img src="{{ asset('images/home/romance.jpg') }}" alt="Romance books">
                    </div>
                    <p class="hero-p">Romance</p>
                    <p class="hero-desc">For the hopeless romantics</p>
                </div>

            </div>
@include ('includes.footer')