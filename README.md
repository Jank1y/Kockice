# 🎲 PHP Igra z Igralnimi Kockami

Simulacija igre s tremi uporabniki, kjer vsak vrže 3 kocke. Na koncu se izračuna zmagovalec z največjim seštevkom. V primeru neodločenega rezultata se izpišejo vsi zmagovalci.

## 📌 Avtor

**Ime:** Jan Tavčar Kukanja
**Projekt ustvarjen:** maj 2025  
**Tehnologije:** PHP, HTML, CSS, JavaScript, XAMPP (Apache), sejna podpora (`$_SESSION`)

---

## 🧩 Funkcionalnosti

- Vnos 3 uporabnikov (ime, priimek, naslov)
- Za vsakega uporabnika se simulira met 3 igralnih kock (naključna števila 1–6)
- Vizualni prikaz kock (slike)
- Izračun skupnega rezultata
- Izpis zmagovalca/cev
- Samodejna preusmeritev nazaj na začetni obrazec po 10 sekundah
- Uporaba sej za shranjevanje podatkov med zahtevki

---

## 🚀 Zagon projekta z XAMPP

### 1. Namesti [XAMPP](https://www.apachefriends.org/index.html)

- Priporočeno: Windows XAMPP z Apache in PHP

### 2. Kopiraj projekt v `htdocs`

- Razpakiraj mapo `dice_game`
- Vsebina naj bo v:

### 3. Zaženi XAMPP in Apache

- Odpri XAMPP Control Panel
- Klikni **Start** pri **Apache**

### 4. Odpri aplikacijo v brskalniku

```bash
http://localhost/dice_game/
