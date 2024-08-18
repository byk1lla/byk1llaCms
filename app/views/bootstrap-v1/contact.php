


<?php require View("static/header")?>

<div class="container py-5 bg-light">
    <h2 class="text-center mb-4">İletişim</h2>
    <p class="text-center mb-4 text-muted">
        Lütfen bize yaptırmak istediğiniz projeyi mesajınızda belirtiniz.
    </p>
    <form action="/contact" method="POST" class="bg-primary text-white p-4 rounded-lg mx-auto" style="max-width: 500px;">
        <div class="mb-3">
            <label for="name" class="form-label text-white">İsminiz</label>
            <input type="text" class="form-control bg-secondary text-white" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label text-white">E-posta</label>
            <input type="email" inputmode="email" class="form-control bg-secondary text-white" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="phone" class="form-label text-white">Telefon Numarası</label>
            <input type="tel" inputmode="tel" class="form-control bg-secondary text-white" id="phone" name="gsm" required>
        </div>
        <div class="mb-3">
            <label for="subject" class="form-label text-white">Konu</label>
            <input type="text" class="form-control bg-secondary text-white" id="subject" name="subject" required>
        </div>
        <div class="mb-3">
            <label for="message" class="form-label text-white">Mesajınız</label>
            <textarea class="form-control bg-secondary text-white" id="message" name="message" rows="5" required></textarea>
        </div>
        <button type="submit" class="btn btn-success w-100">Gönder</button>
    </form>
</div>


<?php require View("static/footer")?>
