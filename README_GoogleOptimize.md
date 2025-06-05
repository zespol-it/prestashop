# Integracja i praca techniczna z Google Optimize w PrestaShop

Poniżej znajdziesz praktyczne wskazówki dotyczące integracji i pracy z Google Optimize w sklepie PrestaShop.

## 1. Dodanie Google Optimize do sklepu

- **Przez Google Tag Manager:**
  - Najwygodniejszy sposób – dodaj kontener Google Optimize jako tag w GTM.
  - Skonfiguruj reguły uruchamiania (np. na wszystkich stronach lub wybranych podstronach).

- **Ręcznie:**
  - Wklej kod Optimize w `<head>` szablonu, tuż po kodzie Google Analytics (gtag.js):
    ```html
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());
      gtag('config', 'G-XXXXXXXXXX');
    </script>
    <!-- Google Optimize -->
    <script src="https://www.googleoptimize.com/optimize.js?id=OPT-YYYYYYY"></script>
    ```
    Zamień `G-XXXXXXXXXX` na swój identyfikator GA4, a `OPT-YYYYYYY` na swój identyfikator kontenera Optimize.

## 2. Tworzenie eksperymentów (testów A/B)

- Skonfiguruj eksperymenty w panelu Google Optimize (np. test A/B, testy przekierowań, testy wielowariantowe).
- Wybierz stronę lub elementy do testowania (np. przycisk, baner, tekst).
- Określ cele eksperymentu (np. kliknięcia, konwersje, czas na stronie).
- Połącz Optimize z Google Analytics 4 dla zaawansowanej analityki.

## 3. Najlepsze praktyki

- Upewnij się, że kod Optimize ładuje się jak najwcześniej w `<head>` (minimalizuje to tzw. "flicker effect").
- Testuj tylko istotne elementy – zbyt wiele wariantów może wydłużyć czas eksperymentu.
- Analizuj wyniki w Google Optimize i Google Analytics.
- Po zakończeniu testu wdrażaj zwycięski wariant i usuń niepotrzebne eksperymenty.

## 4. Debugowanie i weryfikacja

- Użyj rozszerzenia [Google Optimize Chrome Extension](https://chrome.google.com/webstore/detail/google-optimize/)
- Sprawdzaj, czy eksperymenty są aktywne i poprawnie przypisują użytkowników do wariantów.

---

**Wskazówka:**  
Google Optimize najlepiej działa w połączeniu z Google Tag Managerem i Google Analytics 4. Pozwala to na szybkie wdrażanie testów bez ingerencji w kod źródłowy sklepu. 