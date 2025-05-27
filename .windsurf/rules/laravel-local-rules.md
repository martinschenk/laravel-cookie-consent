---
trigger: manual
---

# 🌿 Windsurf Coding-Regeln – Laravel-Projekte

## 🧍️‍♂️ Grundprinzipien

- **Keep it simple**: Keine Spielereien – nur bewährte Laravel-Mittel.
- **Konsistenz**: Code folgt dem Projektstil. Kein Wildwuchs.
- **Respekt**: Architektur, Datenbank und Services **nie ändern**, außer ausdrücklich erlaubt.
- **Arbeite im Rahmen**: Nur die vorgesehenen Verzeichnisse bearbeiten.
- **Keine Überraschungen**: Verhalten darf sich beim Refactoring **nie** ändern.

## ⚙️ Projekt-Setup

- **Laravel-Version**: 11
- **PHP-Version**: 8.2+
- **Coding-Style**: PSR-12, `strict_types`
- **Architektur**: Queue-basiert, config-gesteuert
- **Dokumentation**: PHPDoc mit @param, @return

## 📁 Fokus-Verzeichnisse (nur hier arbeiten)

- `app/`, `config/`, `routes/`, `resources/`, `database/`, `tests/`

## ❌ Ausschlüsse

- `vendor/`, `node_modules/`, `.env`, `public/build/`, `storage/`, `bootstrap/cache/`

## 📦 Struktur & Codequalität

- **Kleine Dateien**: Idealfall <200 Zeilen
- **Keine Logik in Views oder Controllern** – nutze Services
- **SOLID-Prinzipien einhalten**: insbesondere SRP (eine Verantwortung pro Klasse)
- **Wiederverwendbarkeit statt Wiederholung**
- **Nur produktionsreifer Code** – keine Mocks, keine Platzhalter

## ✅ Tests & Sicherheit

- **Unit- und Feature-Tests** schreiben
- **Input validieren**, **Prepared Statements**, **CSRF-Schutz**
- **Policies nutzen**, **HTTPS erzwingen**

## 🚀 Deployment

- Git-basierter Workflow mit **post-receive-Hook**
- Automatische Ausführung von:
  - `composer install`
  - `npm run build`
  - `php artisan config:cache`, etc.
- `.env` bleibt unberührt, Dev nutzt `.env.prod`

## 🛠️ Tinker Quick-Use (Beispiel)

```bash
php artisan tinker --execute="App\Models\Article::count()"
```

## 🧪 Testrichtlinien

- Services = testbar & entkoppelt
- Kein globaler Zustand
- Datenbanktests mit `RefreshDatabase`
- **Faktoren: Klarheit, Stabilität, Vorhersagbarkeit**

