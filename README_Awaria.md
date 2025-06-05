# Postępowanie w przypadku awarii sklepu PrestaShop

Poniżej znajdziesz praktyczne wskazówki dotyczące pracy z awariami sklepów PrestaShop, przywracania z kopii zapasowej oraz ratowania sklepu.

## 1. Szybka diagnoza awarii

- Sprawdź, czy sklep jest całkowicie niedostępny, czy tylko część funkcji nie działa.
- Przejrzyj logi serwera (np. error_log, access_log) oraz logi PrestaShop (`var/logs/`, `app/logs/`).
- Sprawdź ostatnie zmiany w plikach, bazie danych, aktualizacje modułów lub szablonów.

## 2. Przywracanie sklepu z kopii zapasowej

- **Kopia plików:**
  - Przywróć pliki sklepu z ostatniej działającej kopii (np. przez FTP, panel hostingu).
- **Kopia bazy danych:**
  - Przywróć bazę danych z kopii (np. przez phpMyAdmin, narzędzia CLI, panel hostingu).
- **Synchronizacja:**
  - Upewnij się, że wersja plików i bazy danych są zgodne czasowo.
- **Testy:**
  - Po przywróceniu sprawdź działanie sklepu, logowanie, zamówienia, płatności.

## 3. Ratowanie sklepu bez pełnej kopii

- **Przywróć pojedyncze pliki lub katalogi** (np. tylko szablon, tylko moduł, tylko .htaccess).
- **Wyłącz problematyczne moduły** przez bazę danych (tabela `ps_module` – zmień `active` na 0).
- **Przywróć domyślny szablon** (zmiana w bazie danych, tabela `ps_configuration`).
- **Usuń cache PrestaShop** (usuń zawartość katalogów `var/cache/`, `app/cache/`, `cache/smarty/`).
- **Sprawdź uprawnienia plików i katalogów** (np. 755 dla katalogów, 644 dla plików).

## 4. Dobre praktyki backupu i prewencji

- Regularnie wykonuj kopie zapasowe plików i bazy danych (najlepiej automatycznie).
- Przechowuj kopie w bezpiecznym miejscu (np. chmura, zewnętrzny serwer).
- Testuj przywracanie kopii na środowisku testowym.
- Dokumentuj zmiany w sklepie (wdrożenia, aktualizacje, zmiany w kodzie).

## 5. Narzędzia i komendy

- **Przywracanie bazy MySQL z kopii:**
  ```bash
  mysql -u USER -p DATABASE < backup.sql
  ```
- **Przywracanie plików przez rsync:**
  ```bash
  rsync -av /backup/prestashop/ /var/www/prestashop/
  ```
- **Czyszczenie cache PrestaShop:**
  ```bash
  rm -rf var/cache/*
  rm -rf app/cache/*
  rm -rf cache/smarty/*
  ```

---

**Wskazówka:**  
W przypadku poważnych awarii nie nadpisuj od razu wszystkich plików i bazy – najpierw wykonaj kopię obecnego stanu, by móc wrócić do punktu wyjścia. 