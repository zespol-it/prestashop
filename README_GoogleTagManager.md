# Integracja i praca techniczna z Google Tag Manager (GTM) w PrestaShop

Poniżej znajdziesz praktyczne wskazówki dotyczące integracji i pracy z Google Tag Manager w sklepie PrestaShop.

## 1. Dodanie Google Tag Manager do sklepu

- **Ręcznie:**
  - Wklej kod kontenera GTM w `<head>` oraz zaraz po otwarciu `<body>` w głównym szablonie (np. `themes/your-theme/templates/_partials/head.tpl` oraz `layout-both-columns.tpl`):
    ```html
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-XXXXXXX');</script>
    <!-- End Google Tag Manager -->
    ```
    Zaraz po otwarciu `<body>`:
    ```html
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-XXXXXXX"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->
    ```
    Zamień `GTM-XXXXXXX` na swój identyfikator kontenera GTM.

- **Przez moduł PrestaShop:**
  - Skorzystaj z gotowych modułów do integracji GTM (np. "Google Tag Manager" na Addons).

## 2. Przykładowe tagi i reguły w GTM

- Google Analytics 4 (GA4)
- Google Ads (konwersje, remarketing)
- Facebook Pixel
- Hotjar, Microsoft Clarity
- Niestandardowe zdarzenia e-commerce (np. add_to_cart, purchase)

## 3. Przekazywanie danych do dataLayer

- Przekazuj dynamiczne dane (np. o produktach, zamówieniach) do `dataLayer` w szablonach lub modułach:
  ```html
  <script>
    window.dataLayer = window.dataLayer || [];
    window.dataLayer.push({
      'event': 'purchase',
      'transaction_id': '{{$order_id}}',
      'value': {{$order_total}},
      'currency': 'PLN',
      'items': [
        // dane produktów
      ]
    });
  </script>
  ```
- Dzięki temu tagi w GTM mogą korzystać z tych danych do wysyłki zdarzeń.

## 4. Najlepsze praktyki

- Testuj wdrożenie za pomocą trybu podglądu GTM i [Tag Assistant](https://tagassistant.google.com/).
- Utrzymuj porządek w tagach, regułach i zmiennych (nazywaj je czytelnie).
- Ogranicz liczbę tagów uruchamianych na każdej stronie do niezbędnego minimum.
- Regularnie sprawdzaj poprawność danych i działanie tagów.

---

**Wskazówka:**  
Google Tag Manager pozwala na szybkie wdrażanie i zarządzanie tagami marketingowymi bez konieczności modyfikacji kodu źródłowego sklepu. Ułatwia integrację z wieloma narzędziami analitycznymi i reklamowymi. 