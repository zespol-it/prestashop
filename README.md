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

---
