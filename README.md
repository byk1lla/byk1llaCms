# byk1llaCMS

byk1llaCMS, içerik yönetim sistemi (CMS) olarak geliştirilmiş, kullanıcı dostu arayüzü ve kolay yönetim imkanı sunan modern bir PHP tabanlı sistemdir. Yönetim paneli ile içerikleri, ürünleri, kategorileri ve projeleri kolaylıkla yönetebilirsiniz.

## Özellikler

- **Dinamik Yönetim Paneli**: Kategoriler, ürünler ve portföy öğelerini yönetmek için zengin bir arayüz.
- **SEO Desteği**: SEO dostu URL yapısı ve dinamik olarak oluşturulan `sitemap.xml`.
- **Tema Yönetimi**: Farklı tema seçenekleri ile sitenizin görünümünü kolayca değiştirme.
- **Kullanıcı Yetkilendirme**: Güvenli admin giriş sistemi.
- **Medya Yönetimi**: Ürünler ve projeler için video ve resim yükleyebilme.
- **Portföy Yönetimi**: Portföy öğeleri oluşturma ve düzenleme.
- **Veritabanı Yedekleme ve Geri Yükleme**: Kolayca veritabanı yedekleme ve geri yükleme fonksiyonları.
- **Dinamik Ayarlar**: Yönetim panelinden site ayarları, logo ve favicon değiştirme.
- **Responsive Tasarım**: Tüm cihazlar için uyumlu tasarım.

## Temalar ve Admin Sayfası
### Mavi Tema(tailwind-mavi)
<details>
<summary>Sayfalar</summary>
    
- [Ana Sayfa](https://github.com/user-attachments/assets/2006f2f1-d596-485b-9991-ac2df56ebafe)
- [İletişim](https://github.com/user-attachments/assets/c23e1bd7-0dcd-4f8b-abb0-e9ae26dfe269)
- [Diğer Sayfalar](https://github.com/user-attachments/assets/cffe224d-b49b-4e10-926d-407718fc12b1)
</details>

### Yeşil Tema(tailwind-yesil)
<details>
<summary>Sayfalar</summary>
 yeşil sayfa daha henüz yapım aşamasında lütfen daha sonra tekrar kontrol edin
</details>

### Admin Sayfası
<details>
<summary>Sayfalar</summary>
    
- [Giriş Sayfası](https://github.com/user-attachments/assets/e40dab3f-f2b9-42d0-a8eb-7e48f0bcb871)
- [Müşteri Sayfası](https://github.com/user-attachments/assets/c8897a71-9482-4523-8393-e698fbd60bd7)
- [Kategoriler Sayfası](https://github.com/user-attachments/assets/965462a0-c763-495b-92e2-ff34acdadc86)
- [Kullanıcılar Sayfası](https://github.com/user-attachments/assets/e3c2a757-3b15-4ae7-a9e1-d5dbacb26c0a)
- [Ürünler Sayfası](https://github.com/user-attachments/assets/b287cd80-3d23-4901-ac31-429057f57ec8)
- [Pörtföyler Sayfası](https://github.com/user-attachments/assets/5b129c1e-5977-46cb-9122-8cfe4a04dd5e)
- [Hizmetler Sayfası](https://github.com/user-attachments/assets/6d6763f3-e0d0-43d2-80cd-f32a524e8963)

</details>
## Gereksinimler

- PHP 7.4 ve üstü (Önerilen: PHP 8.0+)
- MySQL veya MariaDB veritabanı
- Apache veya Nginx web sunucusu
- `mod_rewrite` etkin olmalıdır

## Kullanılan Paketler

- **PDO**: PHP ile güvenli veritabanı bağlantıları sağlamak için kullanılır.
- **SweetAlert**: Kullanıcı dostu uyarı ve mesaj pencereleri oluşturmak için kullanılır.
- **TailwindCSS**: Modern CSS framework'ü ile responsive tasarımlar.
- **FontAwesome**: İkon seti ve yazı tipleri.
- **Datatables**: Admin panelinde tablo verileri için dinamik arama ve filtreleme fonksiyonu.
- **Admin-Dashboard**: Mazer Admin Dashboard Kullanıyoruz.

## Kurulum

1. **Depoyu Klonlayın**: Projeyi yerel bilgisayarınıza klonlayın.
    ```bash
    git clone https://github.com/kullanici-adi/byk1llaCMS.git
    cd byk1llaCMS
    ```

2. **Veritabanını Ayarlayın**: `byk1llaCms.sql` dosyasını indirin ve veritabanınıza içe aktarın.
   - SQL dosyasını MySQL veya MariaDB veritabanınıza aktararak gerekli tabloları oluşturun.

3. **Veritabanı Bağlantı Bilgilerini Güncelleyin**: `app/config.php` dosyasındaki veritabanı bağlantı ayarlarını kendi sunucunuza göre yapılandırın:
    ```php
    $db = new PDO("mysql:host=localhost;dbname=veritabani_adi;charset=utf8", "kullanici_adi", "sifre");
    ```

4. **Composer Paketlerini Yükleyin** (Eğer Composer kullanıyorsanız):
    ```bash
    composer install
    ```

5. **.htaccess Ayarları**: Apache kullanıyorsanız `.htaccess` dosyasını projenize ekleyin:
    ```apache
    RewriteEngine On
    RewriteRule ^([a-zA-Z-0-9-_/]+)$ index.php [QSA]
    ```

6. **Veritabanı Tabloları**: SQL dosyasını veritabanınıza içe aktarın.
    ```sql
    -- Tabloların oluşturulacağı SQL komutları byk1llaCms.sql dosyasında yer alır.
    ```

7. **Yönetim Paneline Erişim**: Admin paneline giriş yapabilmek için tarayıcınızda aşağıdaki URL'yi ziyaret edin:
    ```bash
    http://localhost/byk1llaCMS/admin
    ```
   Yönetici girişi için:
    - **Kullanıcı adı**: `admin`
    - **Şifre**: `admin123`

## Dosya Yapısı

- **/app**: Uygulamanın temel dosyaları (modeller, kontroller, ayarlar).
- **/public**: Statik dosyalar (CSS, JS, görüntüler).
- **/admin**: Yönetim paneli dosyaları.
- **/app/views**: Tema ve sayfa görünüm dosyaları.
- **/assets**: Proje varlıkları (ikonlar, resimler).
- **/sitemap.php**: Dinamik sitemap oluşturma.

## Tema Yönetimi

Temalar, `app/views` klasöründe saklanır. Mevcut temaları yönetmek ve yeni tema eklemek için `app/views/` klasörüne yeni bir klasör oluşturabilir ve ilgili statik dosyaları bu klasöre ekleyebilirsiniz.

## SEO ve Sitemap

SEO uyumluluğunu artırmak için, CMS otomatik olarak dinamik bir `sitemap.xml` oluşturur. Bu sitemap, Google ve diğer arama motorlarına içeriklerinizi düzenli olarak bildirir. Ayrıca SEO dostu URL yapıları kullanılır.

### Sitemap URL:
```http
  https://YOUR_WEB_URL/sitemap.xml
```


## Katkıda Bulunma

Katkıda bulunmak istiyorsanız lütfen bir `fork` yapın ve kendi dalınızı oluşturun:
1. Depoyu `fork` edin
2. Bir `branch` oluşturun (`git checkout -b yeni-ozellik`)
3. Yaptığınız değişiklikleri `commit` edin (`git commit -am 'Yeni özellik ekle'`)
4. `Branch`inizi `push` edin (`git push origin yeni-ozellik`)
5. Bir `Pull Request` oluşturun

## Lisans

Bu proje [MIT lisansı](LICENSE) altında lisanslanmıştır.
