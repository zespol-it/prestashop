# PrestaShop 8 – Przykładowy moduł i skrypty integracyjne

## Spis treści
- [Opis](#opis)
- [Struktura katalogów](#struktura-katalogów)
- [Moduł własny](#moduł-własny)
- [Cache w module](#cache-w-module)
- [Import produktów przez API](#import-produktów-przez-api)
- [Praca z API zewnętrznych dostawców](#praca-z-api-zewnętrznych-dostawców)
- [Wymagania](#wymagania)
- [Instalacja i użycie](#instalacja-i-użycie)
- [Optymalizacja wydajności systemu sklepu (monolit)](#optymalizacja-wydajności-systemu-sklepu-monolit)
- [Optymalizacja sklepu pod Google PageSpeed](#optymalizacja-sklepu-pod-google-pagespeed)

## Opis
Repozytorium zawiera przykładowy własny moduł do PrestaShop 8 oraz skrypty do importu produktów przez API i integracji z zewnętrznymi usługami.

## Struktura katalogów
```
modules/
└── mycustommodule/
    ├── mycustommodule.php
    ├── config.xml
    ├── logo.png
    └── views/
        └── templates/
            └── hook/
                └── displayHome.tpl
scripts/
├── import_products.php
├── pswebservicelibrary.php
└── external_api_example.php
```

## Moduł własny
- Przykładowy moduł znajduje się w `modules/mycustommodule/`.
- Obsługuje hook `displayHome` i korzysta z cache.
- Plik `config.xml` zawiera metadane modułu.
- Plik `logo.png` to placeholder na logo.

## Cache w module
- Przykład użycia cache znajduje się w `mycustommodule.php` w metodzie `hookDisplayHome`.
- Czyszczenie cache: metoda `clearMyCache()`.

## Import produktów przez API
- Skrypt: `scripts/import_products.php`
- Wymaga pobrania biblioteki [PSWebServiceLibrary.php](https://github.com/PrestaShop/PrestaShop-webservice-lib/blob/master/PSWebServiceLibrary.php) i umieszczenia jej jako `scripts/pswebservicelibrary.php`.
- Skrypt tworzy nowy produkt przez PrestaShop Webservice API.

## Praca z API zewnętrznych dostawców
- Skrypt: `scripts/external_api_example.php`
- Przykład pobierania danych z zewnętrznego API przez cURL.
- Gotowy do rozbudowy o własną logikę importu do PrestaShop.

## Wymagania
- PrestaShop 8.x
- PHP 7.4+
- Dostęp do PrestaShop Webservice (włączony w panelu administracyjnym)

## Instalacja i użycie
1. Skopiuj katalog `mycustommodule` do katalogu `modules` w swojej instalacji PrestaShop.
2. Aktywuj moduł w panelu administracyjnym PrestaShop.
3. Skrypty z katalogu `scripts/` uruchamiaj z linii poleceń:
   - `php scripts/import_products.php`
   - `php scripts/external_api_example.php`
4. Uzupełnij dane dostępowe i adresy API w skryptach.
5. Pobierz bibliotekę PSWebServiceLibrary i umieść ją w `scripts/pswebservicelibrary.php`.

## Optymalizacja wydajności systemu sklepu (monolit)

### 1. Cache (pamięć podręczna)
- Włącz cache PrestaShop w panelu administracyjnym (`Zaawansowane > Wydajność`).
- Używaj cache w modułach (np. `isCached`).
- Opcje cache: pliki, Memcached, Redis (jeśli dostępne na serwerze).
- Cache szablonów Smarty: ustaw na „Kompiluj szablony tylko wtedy, gdy pliki są zmienione”.

### 2. Optymalizacja bazy danych
- Regularnie optymalizuj tabele (np. przez phpMyAdmin lub narzędzia CLI).
- Indeksuj często używane kolumny (np. w zamówieniach, produktach).
- Usuwaj niepotrzebne dane (stare logi, koszyki, sesje).

### 3. Optymalizacja frontendu
- Kompresuj i łącz pliki CSS/JS (włącz w panelu: Zaawansowane > Wydajność).
- Włącz CDN (Content Delivery Network) dla obrazów i assetów.
- Optymalizuj obrazy (np. WebP, kompresja bezstratna).
- Lazy loading dla obrazów produktów.

### 4. Serwer i PHP
- Używaj PHP 8.x (jeśli PrestaShop i Twoje moduły są kompatybilne).
- Włącz OPcache w PHP.
- Zwiększ limity pamięci i czasu wykonywania w `php.ini` (np. `memory_limit`, `max_execution_time`).
- Korzystaj z HTTP/2 (jeśli serwer obsługuje).

### 5. Moduły i rozszerzenia
- Wyłącz lub usuń nieużywane moduły – każdy aktywny moduł to dodatkowe zapytania i kod.
- Unikaj nadmiarowych hooków – sprawdź, czy Twój moduł nie jest podpięty do niepotrzebnych hooków.

### 6. Optymalizacja zapytań i kodu
- Unikaj zapytań w pętli – pobieraj dane hurtowo.
- Profiluj zapytania SQL (np. narzędzia typu Debug Profiler, logi MySQL).
- Używaj cache na poziomie kodu (np. cache wyników zapytań, cache API).

### 7. Monitorowanie i testy
- Używaj narzędzi do monitoringu (np. New Relic, Blackfire, Xdebug).
- Testuj wydajność (np. JMeter, Siege, Loader.io).
- Analizuj logi serwera i aplikacji.

### 8. Przykładowe narzędzia i komendy
- Czyszczenie cache PrestaShop z CLI:
  ```bash
  php bin/console cache:clear
  ```
- Optymalizacja bazy danych (MySQL):
  ```sql
  OPTIMIZE TABLE ps_orders, ps_cart, ps_customer;
  ```
- Włączenie OPcache w php.ini:
  ```
  opcache.enable=1
  opcache.memory_consumption=128
  opcache.max_accelerated_files=10000
  ```

### 9. Dodatkowe wskazówki
- Aktualizuj PrestaShop i moduły – nowsze wersje często mają poprawki wydajności.
- Rozważ migrację na lepszy hosting (jeśli obecny jest zbyt wolny).
- W przypadku dużych sklepów – rozważ podział na mikroserwisy lub dedykowane rozwiązania (np. osobny serwer dla bazy danych).

## Optymalizacja sklepu pod Google PageSpeed

Aby uzyskać wysokie wyniki w Google PageSpeed Insights, zastosuj poniższe praktyki:

### 1. Optymalizacja obrazów
- Używaj nowoczesnych formatów (WebP, AVIF).
- Kompresuj obrazy bezstratnie (np. TinyPNG, ImageMagick).
- Włącz lazy loading dla obrazów produktów i banerów.

### 2. Minimalizacja i łączenie zasobów
- Włącz łączenie i minifikację CSS/JS w panelu PrestaShop (`Zaawansowane > Wydajność`).
- Usuwaj nieużywane style i skrypty (np. z niepotrzebnych modułów).

### 3. Wydajność serwera
- Włącz kompresję GZIP na serwerze (np. przez .htaccess lub konfigurację serwera).
- Skorzystaj z HTTP/2 i CDN dla statycznych zasobów.

### 4. Renderowanie above the fold
- Przenieś krytyczne style CSS do `<head>` (Critical CSS).
- Odkładaj ładowanie niekrytycznych skryptów JS (atrybuty `defer`, `async`).

### 5. Cache przeglądarki
- Skonfiguruj długie nagłówki cache dla obrazów, CSS, JS (np. przez .htaccess):
  ```apache
  <IfModule mod_expires.c>
    ExpiresActive On
    ExpiresByType image/webp "access plus 1 year"
    ExpiresByType image/png "access plus 1 year"
    ExpiresByType text/css "access plus 1 month"
    ExpiresByType application/javascript "access plus 1 month"
  </IfModule>
  ```

### 6. Usuwanie zasobów blokujących renderowanie
- Przenieś JS na koniec strony lub użyj `defer`/`async`.
- Minimalizuj liczbę zewnętrznych fontów i skryptów.

### 7. Optymalizacja Google Fonts
- Wybieraj tylko potrzebne subsety i style.
- Ładuj fonty asynchronicznie lub przez `display=swap`.

### 8. Testowanie i monitorowanie
- Regularnie testuj sklep w [PageSpeed Insights](https://pagespeed.web.dev/).
- Analizuj rekomendacje i wdrażaj poprawki.

## Dodatkowa dokumentacja

- [Google Analytics 4](README_M4.md)
- [Google Ads (AdWords)](README_Adwords.md)
- [Google Optimize](README_GoogleOptimize.md)
- [Google Tag Manager](README_GoogleTagManager.md)
- [Awaryjne procedury i backup](README_Awaria.md)
- [Integracje z innymi systemami](README_OTHERS.md)

---
