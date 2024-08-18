<?php require View("static/header") ?>

<div class="container mx-auto py-12">
    <!-- Hero Bölümü -->
    <section class="text-center py-20 bg-gray-800 text-white">
        <h1 class="text-5xl font-bold mb-4"><?= setting('hero_title') ?></h1>
        <p class="text-xl"><?= setting('hero_description') ?></p>
        <a href="#services"
           class="mt-6 inline-block bg-green-500 text-white py-2 px-4 rounded-lg shadow-lg hover:bg-green-600">Hizmetlerimizi
            Keşfedin</a>
    </section>

    <!-- Hizmetler -->
    <section id="services" class="py-12">
        <h2 class="text-3xl font-bold text-center mb-8">Hizmetlerimiz</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Hizmet Kartları -->
            <?php foreach ($services as $service): ?>
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <h3 class="text-2xl font-semibold mb-4"><?= htmlspecialchars($service['title']) ?></h3>
                    <p><?= htmlspecialchars($service['description']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <!-- Portföy -->
    <div class="relative overflow-x-auto md:overflow-hidden w-full">
        <h2 class="text-3xl font-bold text-center mb-8">Portföyümüz</h2>

        <!-- Carousel Track -->
        <div id="carousel" class="carousel-track flex">
            <?php foreach ($portfolios as $portfolio): ?>
                <div class="carousel-item relative w-64 mx-4 transform transition-transform duration-300 hover:scale-110">
                    <figure class="relative w-full h-auto overflow-hidden rounded-lg">
                        <?php
                        $file_extension = pathinfo($portfolio['image'], PATHINFO_EXTENSION);
                        $video_extensions = ['mp4', 'webm', 'ogg'];

                        if (in_array(strtolower($file_extension), $video_extensions)): ?>
                            <video class="object-cover w-full h-full max-w-xs mx-auto blur-sm transition-transform duration-300 transform hover:scale-110 hover:blur-none"
                                   src="<?= $portfolio['image'] ?>" autoplay="true" muted loop>
                                Tarayıcınız video etiketini desteklemiyor.
                            </video>
                        <?php else: ?>
                            <img class="object-cover w-full transition-transform duration-300 transform hover:scale-110 hover:blur-none"
                                 src="<?= $portfolio['image'] ?>" alt="Portföy Medyası" />
                        <?php endif; ?>

                        <!-- İncele Butonu (Fotoğrafın üstünde) -->
                        <button onclick="window.location.href='/portfolio/<?=$portfolio["id"]?>'"
                                class="absolute bottom-4 left-1/2 transform -translate-x-1/2 bg-green-500 text-white py-2 px-4 rounded-lg hover:bg-green-600 transition duration-300 ease-in-out">
                            İncele
                        </button>
                    </figure>

                    <div class="mt-4 text-center">
                        <h3 class="text-2xl font-semibold truncate"><?= htmlspecialchars($portfolio['title']) ?></h3>
                        <p class="text-gray-600 truncate"><?= htmlspecialchars($portfolio['description']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <!-- Müşteri Yorumları -->
    <section id="testimonials" class="py-12">
        <h2 class="text-3xl font-bold text-center mb-8">Müşteri Yorumları</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Yorum Kartları -->
            <?php
            if($testimonials):
            foreach ($testimonials as $testimonial): ?>
                <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                    <p class="italic"><?= htmlspecialchars($testimonial['comment']) ?> - <?= htmlspecialchars($testimonial['customer_name']) ?></p>
                </div>

            <?php  endforeach;
            else:?>
            <div class="bg-white p-6 rounded-lg shadow-lg text-center">
                <p class="italic">Henüz daha kimse yorum yapmamis :(</p>
            </div>
            <?php endif; ?>
        </div>
    </section>

</div>

<?php require View("static/footer") ?>
