# Integracja i praca techniczna z Google Analytics 4 (GA4) w PrestaShop

Aby skutecznie korzystać z GA4 w sklepie PrestaShop, wykonaj poniższe kroki:

## 1. Dodanie kodu GA4 do sklepu

- **Ręcznie:**  
  Wklej kod śledzenia GA4 (`gtag.js`) w `<head>` szablonu (np. w pliku `themes/your-theme/templates/_partials/head.tpl`):
  ```html
  <!-- Global site tag (gtag.js) - Google Analytics -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=G-XXXXXXXXXX"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'G-XXXXXXXXXX');
  </script>
  ```
  Zamień `G-XXXXXXXXXX` na swój identyfikator GA4.

- **Przez Google Tag Manager:**  
  Dodaj kod GTM do szablonu, a konfigurację GA4 wykonaj w panelu GTM.

## 2. Wysyłanie zdarzeń e-commerce do GA4

- **Ręcznie (zalecane dla zaawansowanych):**
  - Dodawaj zdarzenia e-commerce (np. `view_item`, `add_to_cart`, `purchase`) w odpowiednich miejscach szablonów lub modułów.
  - Przykład wysłania zdarzenia zakupu:
    ```html
    <script>
      gtag('event', 'purchase', {
        transaction_id: '{{$order_id}}',
        value: {{$order_total}},
        currency: 'PLN',
        items: [
          // Wstaw dane produktów
        ]
      });
    </script>
    ```
  - Dane dynamiczne możesz przekazywać przez Smarty lub JavaScript.

- **Przez moduł PrestaShop:**
  - Skorzystaj z oficjalnych lub zewnętrznych modułów do integracji GA4 (np. "Google Analytics 4 & Google Tag Manager").
  - Moduły te automatyzują wysyłkę zdarzeń e-commerce.

## 3. Weryfikacja i debugowanie

- Użyj rozszerzenia [Google Tag Assistant](https://tagassistant.google.com/) do sprawdzenia poprawności implementacji.
- Sprawdzaj dane w czasie rzeczywistym w panelu GA4 (zakładka "DebugView").

## 4. Dobre praktyki

- Przekazuj jak najwięcej danych o produktach (ID, nazwa, kategoria, cena, ilość).
- Upewnij się, że nie dublujesz zdarzeń (np. podwójne wysyłki `purchase`).
- Aktualizuj kod śledzenia po zmianach w szablonach lub koszyku.

## 5. Przykładowe zdarzenia e-commerce GA4

- `view_item_list` – wyświetlenie listy produktów
- `view_item` – wyświetlenie szczegółów produktu
- `add_to_cart` – dodanie do koszyka
- `remove_from_cart` – usunięcie z koszyka
- `begin_checkout` – rozpoczęcie procesu zakupu
- `purchase` – finalizacja zakupu

---

**Wskazówka:**  
Dla pełnej automatyzacji i zgodności z GA4 zaleca się korzystanie z Google Tag Managera oraz gotowych modułów, które wspierają Enhanced Ecommerce dla GA4. 