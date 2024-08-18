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
