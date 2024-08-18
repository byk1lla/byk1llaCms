<?php require View("static/header")?>

<div class="container mx-auto py-12 bg-gray-100">
    <h2 class="text-4xl font-bold text-center mb-6 text-gray-800">İletişim</h2>
    <p class="text-lg text-center mb-8 text-gray-600 max-w-3xl mx-auto">
        Aşağıdaki formu kullanarak bizimle iletişime geçebilirsiniz. Projeleriniz, hizmetlerimiz veya işbirliği olanakları hakkında her türlü sorunuz için size en kısa sürede yanıt vereceğiz. Lütfen iletişim bilgilerinizi doğru ve eksiksiz bir şekilde doldurunuz, böylece size daha iyi hizmet verebiliriz. Yaptırmak istediğiniz projeyle ilgili detayları mesajınızda belirtmeyi unutmayın.
    </p>

    <form onsubmit="return false;" id="contactForm" method="POST" class="max-w-4xl mx-auto bg-white p-8 rounded-lg shadow-xl">
        <!-- İsim Girişi -->
        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2" for="name"><i class="fas fa-user mr-2"></i>İsminiz</label>
            <input type="text" id="name" name="name" class="w-full px-4 py-3 border rounded-lg bg-gray-200 text-gray-900 focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Adınızı giriniz" required>
        </div>

        <!-- E-posta Girişi -->
        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2" for="email"><i class="fas fa-envelope mr-2"></i>E-posta</label>
            <input type="email" id="email" name="email" class="w-full px-4 py-3 border rounded-lg bg-gray-200 text-gray-900 focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="E-posta adresinizi giriniz" required>
        </div>

        <!-- Telefon Numarası -->
        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2" for="phone"><i class="fas fa-phone-alt mr-2"></i>Telefon Numarası</label>
            <input type="tel" id="phone" name="gsm" class="w-full px-4 py-3 border rounded-lg bg-gray-200 text-gray-900 focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Telefon numaranızı giriniz" required>
        </div>

        <!-- Konu -->
        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2" for="subject"><i class="fas fa-tag mr-2"></i>Konu</label>
            <input type="text" id="subject" name="subject" class="w-full px-4 py-3 border rounded-lg bg-gray-200 text-gray-900 focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Konuyu yazınız" required>
        </div>

        <!-- Mesaj -->
        <div class="mb-6">
            <label class="block text-gray-700 font-bold mb-2" for="message"><i class="fas fa-comment-dots mr-2"></i>Mesajınız</label>
            <textarea id="message" name="message" rows="5" class="w-full px-4 py-3 border rounded-lg bg-gray-200 text-gray-900 focus:outline-none focus:ring-2 focus:ring-green-500" placeholder="Mesajınızı buraya yazınız" required></textarea>
        </div>

        <!-- Gönder Butonu -->
        <button type="submit" class="w-full bg-green-500 text-white py-3 rounded-lg shadow-lg hover:bg-green-600 transition duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-green-600">
            <i class="fas fa-paper-plane mr-2"></i>Gönder
        </button>

        <input type="hidden" name="submit" value="1">
    </form>
</div>

<?php require View("static/footer")?>
