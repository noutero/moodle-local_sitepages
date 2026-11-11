# Site pages (`local_sitepages`)

Create custom site pages outside courses (pretty URLs, homepage / My courses overrides).

**Author:** Bartłomiej Ścibior  
**License:** GNU GPL v3 or later — see `LICENSE.txt`  
**Maturity:** Beta (`0.2.0`)

## Install

1. Unzip so the folder is `{moodleroot}/local/sitepages`
2. Visit **Site administration → Notifications**
3. Manage pages: **Site administration → Pages → Manage site pages**

Pages always work at `/local/sitepages/view.php?slug=your-slug` (no server rewrite required).

## Optional: pretty URLs

Pretty links need **both**:

1. A matching web-server rewrite
2. **Pretty page URLs** enabled under Site pages settings

Optional setting **Pretty URL prefix** (e.g. `sites`) changes generated links from `/welcome` to `/sites/welcome`. The rewrite rule must use the same prefix.

Keep Pretty page URLs **off** until rewrite is verified — otherwise Moodle will generate short links that 404.

### Root style (`/welcome`)

**Apache** (Moodle document root `.htaccess`, after `RewriteEngine On`):

```apache
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^([A-Za-z0-9_-]+)/?$ local/sitepages/view.php?slug=$1 [QSA,L]
```

**Nginx** (keep your existing Moodle PHP handling):

```nginx
location / {
    try_files $uri $uri/ @moodle_sitepages;
}
location @moodle_sitepages {
    rewrite ^/([A-Za-z0-9_-]+)/?$ /local/sitepages/view.php?slug=$1 last;
}
```

Leave **Pretty URL prefix** empty.

### Prefixed style (`/sites/welcome`) — recommended on busy sites

Safer: avoids clashing with top-level Moodle paths (`admin`, `course`, `login`, `my`, …).

Set **Pretty URL prefix** to `sites` (or another segment).

**Apache:**

```apache
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^sites/([A-Za-z0-9_-]+)/?$ local/sitepages/view.php?slug=$1 [QSA,L]
```

**Nginx:**

```nginx
location ^~ /sites/ {
    rewrite ^/sites/([A-Za-z0-9_-]+)/?$ /local/sitepages/view.php?slug=$1 last;
}
```

Notes:

- Slugs: letters, numbers, hyphens only
- After changing rewrite or prefix, purge Moodle caches and re-test both `/local/sitepages/view.php?slug=…` and the pretty URL

## Access restrictions

Per page (edit form → **Access restrictions**):

| Control | Effect |
|--------|--------|
| **Visible** | Off → managers only |
| **Allow guests** | Logged-out visitors may view (ignored if role/cohort limits are set) |
| **Restrict to roles** | Viewer must have **at least one** of the selected roles (any context) |
| **Restrict to cohorts** | Viewer must be in **at least one** of the selected cohorts |

Role and cohort limits combine with **AND**. Users with **Manage site pages** always bypass limits. Site-wide deny/allow for logged-in users also uses capability `local/sitepages:view`.

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

- **Public issue tracker** (Marketplace / anonymous): https://github.com/noutero/moodle-local-sitepages-tracker/issues
- Private source (this repo): https://github.com/noutero/moodle-local_sitepages
- PageTiler tracker (separate): https://github.com/noutero/pagetiler-moodle-tracker/issues
