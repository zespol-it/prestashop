# Integracja i praca techniczna z Google Ads (AdWords) w PrestaShop

Poniżej znajdziesz praktyczne wskazówki dotyczące integracji i pracy z usługami Google Ads (AdWords) w sklepie PrestaShop.

## 1. Dodanie tagu konwersji Google Ads

- **Ręcznie:**  
  Wklej kod konwersji w odpowiednim miejscu szablonu (np. na stronie potwierdzenia zamówienia):
  ```html
  <!-- Global site tag (gtag.js) - Google Ads: AW-XXXXXXXXX -->
  <script async src="https://www.googletagmanager.com/gtag/js?id=AW-XXXXXXXXX"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'AW-XXXXXXXXX');
    gtag('event', 'conversion', {
      'send_to': 'AW-XXXXXXXXX/XXXXXXXXXXXX',
      'value': {{$order_total}},
      'currency': 'PLN',
      'transaction_id': '{{$order_id}}'
    });
  </script>
  ```
  Zamień `AW-XXXXXXXXX` i `XXXXXXXXXXXX` na swoje identyfikatory Google Ads.

- **Przez Google Tag Manager:**  
  Dodaj tag konwersji Google Ads w GTM i ustaw regułę na wywołanie na stronie potwierdzenia zamówienia.

## 2. Remarketing Google Ads

- **Ręcznie:**  
  Dodaj tag remarketingowy Google Ads do `<head>` szablonu lub przez GTM:
  ```html
  <script async src="https://www.googletagmanager.com/gtag/js?id=AW-XXXXXXXXX"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    gtag('config', 'AW-XXXXXXXXX');
  </script>
  ```

- **Dynamiczny remarketing e-commerce:**
  - Przekazuj do tagu dane o produktach, np. ID, kategoria, cena.
  - Przykład (na stronie produktu):
    ```html
    <script>
      gtag('event', 'view_item', {
        'send_to': 'AW-XXXXXXXXX',
        'value': {{$product_price}},
        'items': [{
          'id': '{{$product_id}}',
          'google_business_vertical': 'retail'
        }]
      });
    </script>
    ```

## 3. Najlepsze praktyki

- Używaj Google Tag Managera do zarządzania tagami i konwersjami.
- Przekazuj dynamiczne wartości (ID zamówienia, kwota, produkty) do tagów konwersji.
- Testuj wdrożenie za pomocą [Tag Assistant](https://tagassistant.google.com/) i podglądu GTM.
- Upewnij się, że tagi nie są dublowane (np. tylko jedna konwersja na zamówienie).
- Regularnie sprawdzaj poprawność danych w panelu Google Ads.

## 4. Przykładowe zdarzenia Google Ads

- `conversion` – konwersja (np. zakup)
- `view_item` – wyświetlenie produktu (remarketing)
- `add_to_cart` – dodanie do koszyka (remarketing)

---

**Wskazówka:**  
Dla pełnej automatyzacji i zgodności z Google Ads zaleca się korzystanie z Google Tag Managera oraz gotowych modułów PrestaShop do integracji z Google Ads i remarketingiem. 