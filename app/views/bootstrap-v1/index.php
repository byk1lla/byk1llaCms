<?php require View("static/header") ?>
<div class="container py-5">
    <!-- Hero Bölümü -->
    <section class="text-center py-5 bg-dark text-white">
        <h1 class="display-4 fw-bold"><?= setting('hero_title') ?></h1>
        <p class="lead"><?= setting('hero_description') ?></p>
        <a href="#services" class="btn btn-success btn-lg mt-3">Hizmetlerimizi Keşfedin</a>
    </section>

    <!-- Hizmetler -->
    <section id="services" class="py-5">
        <h2 class="text-center mb-5">Hizmetlerimiz</h2>
        <div class="row g-4">
            <?php

            foreach ($services as $service): ?>
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <h3 class="card-title"><?= $service['title'] ?></h3>
                            <p class="card-text"><?= $service['description'] ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Portföy -->
    <section id="portfolio" class="py-5 bg-light">
        <h2 class="text-center mb-5">Portföyümüz</h2>
        <div class="row g-4">
            <?php foreach ($portfolios as $portfolio): ?>
                <div class="col-md-4">
                    <div class="card h-100">
                        <?php
                        $file_extension = pathinfo($portfolio['image'], PATHINFO_EXTENSION);
                        $video_extensions = ['mp4', 'webm', 'ogg'];

                        if (in_array(strtolower($file_extension), $video_extensions)): ?>
                            <video class="card-img-top blur-sm" src="<?= $portfolio['image'] ?>" muted></video>
                        <?php else: ?>
                            <img class="card-img-top blur-sm" src="<?= $portfolio['image'] ?>" alt="Portföy Medyası">
                        <?php endif; ?>

                        <div class="card-body">
                            <h5 class="card-title"><?= htmlspecialchars($portfolio['title']) ?></h5>
                            <p class="card-text"><?= htmlspecialchars($portfolio['description']) ?></p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Müşteri Yorumları -->
    <section id="testimonials" class="py-5">
        <h2 class="text-center mb-5">Müşteri Yorumları</h2>
        <div class="row g-4">
            <?php
            $testimonials = [
                ['text' => '"Wel Studios, harika bir iş çıkardı! 3D baskılar mükemmel."', 'author' => 'Müşteri 1'],
                ['text' => '"Profesyonel hizmet ve mükemmel sonuçlar."', 'author' => 'Müşteri 2'],
                ['text' => '"Projelerimi zamanında ve bütçeye uygun tamamladılar."', 'author' => 'Müşteri 3']
            ];
            foreach ($testimonials as $testimonial): ?>
                <div class="col-md-4">
                    <div class="card text-center">
                        <div class="card-body">
                            <blockquote class="blockquote">
                                <p class="mb-0"><?= $testimonial['text'] ?></p>
                                <footer class="blockquote-footer mt-3"><?= $testimonial['author'] ?></footer>
                            </blockquote>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- İletişim -->
    <section id="contact" class="py-5 bg-dark text-white">
        <h2 class="text-center mb-5">İletişim</h2>
        <form action="/contact" method="POST" class="bg-white p-4 rounded-lg shadow-lg text-dark mx-auto" style="max-width: 500px;">
            <div class="mb-3">
                <label for="name" class="form-label">İsim</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">E-posta</label>
                <input type="email" inputmode="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="mb-3">
                <label for="gsm" class="form-label">Telefon Numaranız</label>
                <input type="tel" inputmode="tel" class="form-control" id="gsm" name="gsm" required>
            </div>
            <div class="mb-3">
                <label for="subject" class="form-label">Konu</label>
                <input type="text" class="form-control" id="subject" name="subject" required>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Mesaj</label>
                <textarea class="form-control" id="message" name="message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-success w-100">Gönder</button>
        </form>
    </section>
</div>
<script>
    document.querySelectorAll('video').forEach(video => {
        video.addEventListener('mouseenter', () => {
            video.play();
            video.classList.remove('blur-sm');
        });
        video.addEventListener('mouseleave', () => {
            video.pause();
            video.classList.add('blur-sm');
        });
    });


</script>

<style>

    .blur-sm {
        filter: blur(4px);
        transition: filter 0.3s ease-in-out;
    }

    .blur-sm:hover {
        filter: blur(0);
    }
</style>
<?php require View("static/footer") ?>
