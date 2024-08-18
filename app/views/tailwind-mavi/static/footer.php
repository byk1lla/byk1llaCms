<div id="cookieConsent" class="fixed bottom-0 inset-x-0 p-4 bg-blue-700 text-white text-center" style="display:none;">
    <div class="flex justify-center items-center">
        <span class="mr-4">Bu web sitesi, en iyi deneyimi sunmak için çerezler kullanmaktadır.</span>
        <button onclick="acceptCookies()" class="bg-blue-500 text-white font-semibold py-2 px-4 rounded hover:bg-blue-600">Kabul Et</button>
    </div>
</div>
<footer class="bg-blue-900 text-white py-6">
    <div class="container mx-auto flex flex-col md:flex-row justify-between items-center">
        <div class="flex items-center mb-4 md:mb-0">
            <img src="<?=URL . setting('favicon')?>" alt="Wel Studios Logo" class="h-12 w-12 mr-3">
            <span class="text-xl font-semibold"><?=setting('title')?></span>
        </div>
        <nav class="space-x-4 text-center">
            <a href="/privacy-policy" class="hover:underline">Gizlilik Politikası</a>
            <a href="/terms-of-service" class="hover:underline">Kullanım Koşulları</a>
            <a href="/contact" class="hover:underline">İletişim</a>
        </nav>
        <div class="text-center mt-4 md:mt-0">
            <p class="text-sm">&copy; 2024 <?=setting('title')?> Tüm hakları saklıdır.</p>
        </div>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="<?=assets("js/cookie.js")?>"></script>
<script src="<?=assets("index.js")?>"></script>
<script src="<?=assets("plugins.js")?>"></script>
<script src="<?=plugins("sweetalert2/sweetalert2.min.js")?>"></script>

</body>
</html>