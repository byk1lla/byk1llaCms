<?php
require View("static/header");
?>

<div class="container mx-auto py-12">
    <!-- Portfolyo Başlığı -->
    <section class="text-center py-20 bg-green-500 text-white">
        <h1 class="text-5xl font-bold mb-4"><?= htmlspecialchars($portfolioData['title']) ?></h1>
        <p class="text-xl"><?= htmlspecialchars($portfolioData['description']) ?></p>
    </section>

    <!-- Portfolyo İçeriği -->
    <section class="py-12">
        <div class="max-w-4xl mx-auto bg-white shadow-lg rounded-lg overflow-hidden">
            <?php
            $file_extension = pathinfo($portfolioData['image'], PATHINFO_EXTENSION);
            $video_extensions = ['mp4', 'webm', 'ogg'];

            if (in_array(strtolower($file_extension), $video_extensions)): ?>
                <video class="w-full h-auto" controls>
                    <source src="<?=  $portfolioData['image'] ?>" type="video/<?= $file_extension ?>">
                    Tarayıcınız bu videoyu desteklemiyor.
                </video>
            <?php else: ?>
                <img class="w-full h-auto" src="<?= $portfolioData['image'] ?>" alt="<?= htmlspecialchars($portfolioData['title']) ?>">
            <?php endif; ?>

            <div class="p-6">
                <h2 class="text-3xl font-semibold mb-4"><?= htmlspecialchars($portfolioData['title']) ?></h2>
                <p class="text-gray-700 text-lg"><?= htmlspecialchars($portfolioData['description']) ?></p>
            </div>
        </div>
    </section>


</div>

<?php require View("static/footer"); ?>
