# Site pages (`local_sitepages`)

Create custom site pages outside courses (pretty URLs, homepage / My courses overrides).

**Author:** Bartłomiej Ścibior  
**License:** GNU GPL v3 or later — see `LICENSE.txt`  
**Maturity:** Beta (`0.2.0`)

## Install

1. Unzip so the folder is `{moodleroot}/local/sitepages`
2. Visit **Site administration → Notifications**
3. Manage pages: **Site administration → Pages → Manage site pages**

## Optional: PageTiler

If `mod_pagetiler` is installed, pages can use **Edit with PageTiler**. Site pages works without PageTiler.

## Bundle

Distributed with **PageTiler** (`mod_pagetiler`) as one product (two ZIP packages).

## Tests

Behat: `@local_sitepages` under `tests/behat/`.  
CI: `.github/workflows/moodle-ci.yml` (moodle-plugin-ci).

## Support / source

Private GitHub (Marketplace form):

- Source: https://github.com/noutero/moodle-local_sitepages
- Issues: https://github.com/noutero/moodle-local_sitepages/issues
