# EMAS eKYC

Marketing website and admin platform for EMAS eKYC (Electronic Know Your Customer), built with Laravel.

## Tech Stack

| Layer | Technology |
|-------|-----------|
| Backend | Laravel 13, PHP 8.3 |
| Frontend | Alpine.js, Tailwind CSS 4, DaisyUI 5 |
| Admin Panel | Filament 5 |
| Build Tool | Vite 8 |
| Database | SQLite (dev), MySQL/PostgreSQL (prod) |
| Queue/Cache/Session | Database-backed (dev), Redis recommended (prod) |

## Features

- **40+ marketing pages** covering features, solutions, country-specific landing pages, and whitepapers
- **Knowledge Hub** (blog) with tag filtering, pagination, and published/draft workflow
- **Contact form** with honeypot spam protection, rate limiting, and queued email delivery
- **Admin panel** (Filament) for managing posts, tags, clients, and injectable site scripts
- **Caching layer** with automatic invalidation on model changes
- **Soft deletes** on posts for data retention

## Prerequisites

- PHP 8.3+
- Composer
- Node.js 20+ and npm
- SQLite (dev) or MySQL/PostgreSQL (prod)

## Setup

```bash
# Clone and install everything (dependencies, .env, key, migrations, assets)
composer setup

# Or manually:
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm install
npm run build
```

## Development

```bash
# Start all dev services concurrently (server, queue, logs, vite)
composer dev
```

This runs:
- `php artisan serve` on port 8000
- `php artisan queue:listen` for async jobs
- `php artisan pail` for log tailing
- `npm run dev` for Vite HMR

## Testing

```bash
composer test
```

Tests use in-memory SQLite with array drivers for cache, queue, and session. Current test coverage includes:

- **ContactController** - validation, honeypot, rate limiting, mail queueing
- **PostController** - published/unpublished filtering, tag filtering, slugs, 404s

## Admin Panel

Access at `/admin`. Requires a user with `is_admin = true`.

```bash
# Create an admin user via tinker
php artisan tinker
> User::factory()->create(['name' => 'Admin', 'email' => 'admin@example.com', 'is_admin' => true]);
```

Manages: Posts, Tags, Clients (logo carousel), Site Scripts (analytics/tracking injection).

## Project Structure

```
app/
  Filament/Resources/   # Admin panel resources (Posts, Clients, Tags, SiteScripts)
  Http/Controllers/     # ContactController, PostController
  Http/Requests/        # StoreContactRequest (validation)
  Mail/                 # ContactFormMail (queued)
  Models/               # User, Post, Tag, Client, SiteScript
  Providers/            # View composers, cache bindings
resources/views/
  components/           # Layout, nav, footer, sidebar, post-card
  errors/               # 404 page
  mail/                 # Contact form email template
  pages/                # All marketing pages, knowledge hub, contact
routes/
  web.php               # All route definitions
```

## Route Groups

| Prefix | Description |
|--------|-------------|
| `/` | Homepage, about, careers |
| `/contact` | Contact form (GET + throttled POST) |
| `/features-and-components/*` | Identity verification, user screening, additional verification |
| `/solutions/*` | Country pages, industry solutions, whitepapers |
| `/resources/*` | Knowledge hub, guides, events, privacy policy |
| `/admin` | Filament admin panel |

## Environment Variables

Key variables to configure for production:

```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com

DB_CONNECTION=mysql
DB_HOST=...
DB_DATABASE=...

CACHE_STORE=redis
SESSION_DRIVER=redis
QUEUE_CONNECTION=redis

MAIL_MAILER=smtp
MAIL_HOST=...
MAIL_FROM_ADDRESS=noreply@your-domain.com

FREEPIK_API_KEY=...
```

## Deployment

Targeting **Laravel Cloud**. Production checklist:

- [ ] Set `APP_ENV=production`, `APP_DEBUG=false`
- [ ] Configure production database (MySQL/PostgreSQL)
- [ ] Configure Redis for cache, session, and queue
- [ ] Set up SMTP mail provider (SendGrid, Mailgun, or SES)
- [ ] Run `php artisan migrate --force`
- [ ] Run `npm run build` for production assets
- [ ] Set up queue worker
- [ ] Configure SSL and DNS

## License

Proprietary. All rights reserved.
