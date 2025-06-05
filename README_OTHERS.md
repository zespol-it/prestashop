# Integracje techniczne z zewnętrznymi usługami w PrestaShop

## 1. Praca techniczna z aplikacjami email marketingu (Mailerlite, GetResponse itp.)

- **Integracja przez moduł:**
  - Skorzystaj z oficjalnych lub zewnętrznych modułów integrujących PrestaShop z wybraną platformą (np. Mailerlite, GetResponse).
  - Moduły umożliwiają automatyczny eksport kontaktów, synchronizację subskrybentów, obsługę double opt-in.
- **Integracja przez API:**
  - Wykorzystaj API platformy do wysyłki kontaktów, tagowania użytkowników, uruchamiania kampanii.
  - Przykład (Mailerlite, PHP):
    ```php
    $ch = curl_init('https://api.mailerlite.com/api/v2/subscribers');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
      'Content-Type: application/json',
      'X-MailerLite-ApiKey: TWÓJ_API_KEY'
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
      'email' => $email,
      'name' => $name
    ]));
    $response = curl_exec($ch);
    curl_close($ch);
    ```
- **Dobre praktyki:**
  - Upewnij się, że użytkownik wyraził zgodę na newsletter (RODO).
  - Testuj integrację na środowisku testowym.

## 2. Praca techniczna z systemami marketing automation (Edrone, Salesmanago, Quarticon, Samito itp.)

- **Integracja przez moduł:**
  - Zainstaluj oficjalny moduł danej platformy (np. Edrone, Salesmanago).
  - Skonfiguruj klucz API, identyfikatory, reguły zdarzeń.
- **Integracja przez GTM lub kod JS:**
  - Wklej kod śledzenia (JavaScript) w szablonie lub przez Google Tag Manager.
  - Przekazuj dynamiczne dane (np. o produktach, koszyku, zamówieniach) do skryptu platformy.
- **Dobre praktyki:**
  - Testuj poprawność wysyłanych zdarzeń (np. add_to_cart, purchase).
  - Sprawdzaj, czy nie dublujesz zdarzeń.

## 3. Praca techniczna z Baselinker

- **Integracja przez moduł:**
  - Skorzystaj z oficjalnego modułu Baselinker lub gotowych integracji na Addons.
  - Moduł umożliwia synchronizację zamówień, produktów, stanów magazynowych.
- **Integracja przez API:**
  - Wykorzystaj [API Baselinker](https://api.baselinker.com/) do własnych automatyzacji (np. import/eksport zamówień, synchronizacja stanów).
  - Przykład (PHP):
    ```php
    $ch = curl_init('https://api.baselinker.com/connector.php');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
      'X-BLToken: TWÓJ_TOKEN'
    ]);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode([
      'method' => 'getOrders',
      'parameters' => []
    ]));
    $response = curl_exec($ch);
    curl_close($ch);
    ```
- **Dobre praktyki:**
  - Regularnie testuj synchronizację i sprawdzaj logi integracji.

## 4. Praca techniczna z Allegro

- **Integracja przez Baselinker:**
  - Najprostszy sposób – połącz Allegro z PrestaShop przez Baselinker.
- **Integracja przez moduł Allegro:**
  - Skorzystaj z oficjalnych lub zewnętrznych modułów do obsługi Allegro (np. wystawianie aukcji, pobieranie zamówień).
- **Integracja przez API Allegro:**
  - Wykorzystaj [REST API Allegro](https://developer.allegro.pl/) do własnych automatyzacji (np. wystawianie ofert, pobieranie zamówień).
  - Przykład (PHP, pobieranie ofert):
    ```php
    $ch = curl_init('https://api.allegro.pl/sale/offers');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
      'Authorization: Bearer TWÓJ_TOKEN',
      'Accept: application/vnd.allegro.public.v1+json'
    ]);
    $response = curl_exec($ch);
    curl_close($ch);
    ```
- **Dobre praktyki:**
  - Upewnij się, że integracja obsługuje aktualizacje statusów, synchronizację stanów i cen.
  - Testuj integrację na środowisku testowym.

---

**Wskazówka:**  
Przed wdrożeniem każdej integracji sprawdź dostępność oficjalnych modułów i dokumentację API. Testuj na kopii sklepu, aby uniknąć problemów w środowisku produkcyjnym. 