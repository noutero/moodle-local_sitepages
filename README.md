# Site pages (`local_sitepages`)

Create custom site pages outside courses (pretty URLs, homepage / My courses overrides).

**Author:** Bartłomiej Ścibior  
**License:** GNU GPL v3 or later — see `LICENSE.txt`  
**Maturity:** Beta (`0.2.0`)

## Install

1. Unzip so the folder is `{moodleroot}/local/sitepages`
2. Visit **Site administration → Notifications**
3. Manage pages: **Site administration → Pages → Manage site pages**

Pages always work at `/local/sitepages/view.php?slug=your-slug`.

### Optional: pretty URLs (`/your-slug`)

1. Configure web-server rewrite (Apache example in Moodle document root):

```apache
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^([A-Za-z0-9_-]+)/?$ local/sitepages/view.php?slug=$1 [QSA,L]
```

Nginx: rewrite `/([A-Za-z0-9_-]+)/?` → `/local/sitepages/view.php?slug=$1` for requests that are not real files/directories (full examples in the admin guide / docs URL).

2. Enable **Pretty page URLs (/slug)** under Site pages settings.
3. Keep that setting off until rewrite is verified.

## Optional: PageTiler

If `mod_pagetiler` is installed, pages can use **Edit with PageTiler**. Site pages works without PageTiler.

## Bundle

Distributed with **PageTiler** (`mod_pagetiler`) as one product (two ZIP packages).

## Tests

Behat: `@local_sitepages` under `tests/behat/`.  
CI: `.github/workflows/moodle-ci.yml` (moodle-plugin-ci).

## Documentation

Admin guide: https://pagetiler.ivent.pl/local/sitepages/view.php?slug=docs (demo) — install, PageTiler builder, pretty URL rewrite (Apache/Nginx), homepage and My courses overrides.

## Support / source

- **Public issue tracker** (Marketplace / anonymous): https://github.com/noutero/pagetiler-moodle-tracker/issues  
  Use labels or mention `mod_pagetiler` / `local_sitepages` in the issue.
- Private source (this repo): https://github.com/noutero/moodle-local_sitepages
