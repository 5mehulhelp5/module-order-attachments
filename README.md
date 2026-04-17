<!-- SEO Meta -->
<!--
  Title: Panth Order File Attachments for Magento 2 | Attach Files to Order Items at Checkout
  Description: Panth Order Attachments lets Magento 2 customers upload and attach files to specific order items during checkout. Includes admin grid management, thumbnail preview, downloads, file size validation, multi-file support, and per-product attribute control. Compatible with Magento 2.4.4 - 2.4.8 and PHP 8.1 - 8.4.
  Keywords: magento 2 order attachments, file upload checkout, custom file upload, attach files to orders, magento 2 checkout file upload, order item attachments, magento 2 file upload extension
  Author: Kishan Savaliya (Panth Infotech)
  Canonical: https://github.com/mage2sk/module-order-attachments
-->

# Order File Attachments for Magento 2 | Upload Files to Order Items at Checkout

[![Visitors](https://visitor-badge.laobi.icu/badge?page_id=mage2sk.module-order-attachments&left_color=gray&right_color=0d9488&left_text=Visitors)](https://github.com/mage2sk/module-order-attachments)
[![Magento 2.4.4 - 2.4.8](https://img.shields.io/badge/Magento-2.4.4%20--%202.4.8-orange?logo=magento&logoColor=white)](https://magento.com)
[![PHP 8.1 - 8.4](https://img.shields.io/badge/PHP-8.1%20--%208.4-blue?logo=php&logoColor=white)](https://php.net)
[![License](https://img.shields.io/badge/License-Proprietary-lightgrey)]()
[![Packagist](https://img.shields.io/badge/Packagist-mage2kishan%2Fmodule--order--attachments-orange?logo=packagist&logoColor=white)](https://packagist.org/packages/mage2kishan/module-order-attachments)
[![Upwork Top Rated Plus](https://img.shields.io/badge/Upwork-Top%20Rated%20Plus-14a800?logo=upwork&logoColor=white)](https://www.upwork.com/freelancers/~016dd1767321100e21)
[![Panth Infotech Agency](https://img.shields.io/badge/Agency-Panth%20Infotech-14a800?logo=upwork&logoColor=white)](https://www.upwork.com/agencies/1881421506131960778/)
[![Website](https://img.shields.io/badge/Website-kishansavaliya.com-0D9488)](https://kishansavaliya.com)
[![Get a Quote](https://img.shields.io/badge/Get%20a%20Quote-Free%20Estimate-DC2626)](https://kishansavaliya.com/get-quote)

> **Order File Attachments** empowers Magento 2 merchants to accept customer-uploaded files at checkout on a per-product-item basis — ideal for print-on-demand, custom artwork, engraving instructions, prescription uploads, personalised gifts, B2B RFQs, and any store where orders require supporting documents.

**Panth Order Attachments** lets customers attach one or more files to specific order items directly during checkout. Store admins get a powerful backend grid to manage every uploaded file — with thumbnail previews, one-click downloads, order/item linking, and full file size validation. Enable or disable uploads per product via a simple product attribute, configure allowed file types and size limits globally, and support multi-file uploads where needed. Whether you sell custom-printed t-shirts, personalised mugs, business cards, engraved jewellery, or prescription eyewear, Order Attachments gives your customers a frictionless way to send you the files you need — and gives you a clean, searchable admin interface to retrieve them.

---

## 🚀 Need Custom Magento 2 Development?

> **Get a free quote for your project in 24 hours** — custom modules, Hyva themes, performance optimization, M1→M2 migrations, and Adobe Commerce Cloud.

<p align="center">
  <a href="https://kishansavaliya.com/get-quote">
    <img src="https://img.shields.io/badge/Get%20a%20Free%20Quote%20%E2%86%92-Reply%20within%2024%20hours-DC2626?style=for-the-badge" alt="Get a Free Quote" />
  </a>
</p>

<table>
<tr>
<td width="50%" align="center">

### 🏆 Kishan Savaliya
**Top Rated Plus on Upwork**

[![Hire on Upwork](https://img.shields.io/badge/Hire%20on%20Upwork-Top%20Rated%20Plus-14a800?style=for-the-badge&logo=upwork&logoColor=white)](https://www.upwork.com/freelancers/~016dd1767321100e21)

100% Job Success • 10+ Years Magento Experience
Adobe Certified • Hyva Specialist

</td>
<td width="50%" align="center">

### 🏢 Panth Infotech Agency
**Magento Development Team**

[![Visit Agency](https://img.shields.io/badge/Visit%20Agency-Panth%20Infotech-14a800?style=for-the-badge&logo=upwork&logoColor=white)](https://www.upwork.com/agencies/1881421506131960778/)

Custom Modules • Theme Design • Migrations
Performance • SEO • Adobe Commerce Cloud

</td>
</tr>
</table>

**Visit our website:** [kishansavaliya.com](https://kishansavaliya.com) &nbsp;|&nbsp; **Get a quote:** [kishansavaliya.com/get-quote](https://kishansavaliya.com/get-quote)

---

## Table of Contents

- [Why Order Attachments?](#why-order-attachments)
- [Key Features](#key-features)
- [Use Cases](#use-cases)
- [How It Works](#how-it-works)
- [Compatibility](#compatibility)
- [Installation](#installation)
- [Configuration](#configuration)
- [Admin Management](#admin-management)
- [Per-Product Attribute](#per-product-attribute)
- [File Validation and Security](#file-validation-and-security)
- [FAQ](#faq)
- [Support](#support)
- [About Panth Infotech](#about-panth-infotech)
- [Quick Links](#quick-links)

---

## Why Order Attachments?

Out of the box, Magento 2 has no native way for customers to upload files at checkout that are cleanly attached to a specific order item. Merchants selling customizable products, prescription products, or B2B documents are forced to:

- Shoehorn file uploads into custom options (tied to cart quote, not order item)
- Ask customers to email files after purchase (slow, error-prone, loses context)
- Build brittle custom modules that break on Magento upgrades

**Panth Order Attachments solves this properly:**

- Files are uploaded during product add-to-cart and carried through checkout
- Uploads are linked to the exact order item on order placement
- Admins see, preview, and download every file from a single searchable grid
- Per-product attribute controls which products accept uploads
- File size, extension, and multi-file rules are enforced server-side
- Works on both Hyva (Alpine.js) and Luma (vanilla JS) storefronts

---

## Key Features

### Customer Upload Experience

- **Drag-and-drop upload widget** on the product page with progress bars
- **Thumbnail preview** for images, file-type badges for documents
- **Multi-file support** — up to N files per item (configurable)
- **Customer notes** — optional message travels with each attachment
- **Lightbox gallery** — click to enlarge image attachments in cart, checkout, and order view
- **Mobile-friendly** — touch-friendly uploads with drag-drop where supported

### Cart and Checkout Integration

- Attachments appear on quote items as rich `additional_options` cards
- Visible in cart page, minicart, and checkout order summary
- Cart item edit preserves, adds, or removes attachments as the customer updates
- Carries through to order placement via `sales_order_place_after` observer
- Shown on "My Account → Orders → View Order" with download links

### Admin Management

- **Dedicated admin grid** — `Sales → Panth Infotech → Order Attachments`
- **Order detail tab** — "Order Attachments" section on admin order view
- **Thumbnail preview column** — scan uploads at a glance
- **Filter and search** — by order ID, customer, SKU, date, file type, status
- **One-click download** from grid or order view
- **ACL resources** for view and download permissions

### Configuration and Control

- **Per-product attribute** — `panth_allow_order_attachment` (Yes/No)
- **Allowed extensions** — configurable whitelist (e.g. jpg, png, pdf, ai, psd, eps, docx, zip)
- **File size validation** — global max file size (MB) enforced client + server
- **Max files per item** — cap the number of uploads per cart line item
- **Custom upload label** — override the widget heading per store
- **Show-in-cart / Show-in-checkout** toggles

### Security and Performance

- **MEQP compliant** — Adobe Magento Extension Quality Program tested
- **SHA-256 hashed filenames** on disk — original names never used as path
- **Server-side MIME + extension + size validation** on every upload
- **Honeypot + rate limiting** (20 uploads per 10-minute window) against bots
- **Ownership validation** on download and thumbnail endpoints
- **Soft-delete** — attachments are never hard-deleted by customers
- **Hyva and Luma compatible** — full support on both frontends

---

## Use Cases

- **Print-on-demand stores** — artwork for t-shirts, mugs, posters, canvas prints
- **Personalised gifts** — photos for photo books, engraved jewellery, custom cases
- **Prescription products** — opticians and pharmacies receive prescription PDFs
- **Business cards and stationery** — customer-uploaded logos and designs
- **Custom embroidery and engraving** — reference images and instructions per product
- **Signage and large-format printing** — vector and high-res files with per-item rules
- **B2B procurement** — PO documents, specs, and drawings attached to specific line items

---

## How It Works

1. Admin enables **Allow Order Attachments** on specific products
2. Customer visits product page — drag-and-drop upload widget appears
3. Customer uploads file(s); client- and server-side validation runs
4. Uploads are linked to the quote item when product is added to cart
5. Attachments show in cart, minicart, and checkout summary
6. On order placement, an observer copies attachments to the order item
7. Admin manages files from the Order Attachments grid and order view tab
8. Customer sees uploaded files in "My Account → Orders"

---

## Compatibility

| Requirement | Versions Supported |
|---|---|
| Magento Open Source | 2.4.4, 2.4.5, 2.4.6, 2.4.7, 2.4.8 |
| Adobe Commerce | 2.4.4, 2.4.5, 2.4.6, 2.4.7, 2.4.8 |
| Adobe Commerce Cloud | 2.4.4 — 2.4.8 |
| PHP | 8.1.x, 8.2.x, 8.3.x, 8.4.x |
| MySQL | 8.0+ |
| MariaDB | 10.4+ |
| Hyva Theme | 1.0+ (full Alpine.js support) |
| Luma Theme | Native support (vanilla JS) |
| Required | `mage2kishan/module-core` (free, auto-installed) |

Tested on:
- Magento 2.4.8-p4 with PHP 8.4
- Magento 2.4.7 with PHP 8.3
- Magento 2.4.6 with PHP 8.2

---

## Installation

### Composer Installation (Recommended)

```bash
composer require mage2kishan/module-order-attachments
bin/magento module:enable Panth_Core Panth_OrderAttachments
bin/magento setup:upgrade
bin/magento setup:di:compile
bin/magento setup:static-content:deploy -f
bin/magento cache:flush
```

### Manual Installation via ZIP

1. Download the ZIP from [Packagist](https://packagist.org/packages/mage2kishan/module-order-attachments) or the [Adobe Commerce Marketplace](https://commercemarketplace.adobe.com)
2. Extract to `app/code/Panth/OrderAttachments/`
3. Also install `Panth_Core` to `app/code/Panth/Core/` (required dependency)
4. Run the same commands as above

### Verify Installation

```bash
bin/magento module:status Panth_OrderAttachments
# Expected: Module is enabled
```

---

## Configuration

Navigate to **Stores → Configuration → Panth Extensions → Order Attachments**.

### General

| Setting | Default | Description |
|---|---|---|
| Enable Module | Yes | Master on/off switch for Order Attachments. |

### Upload Settings

| Setting | Default | Description |
|---|---|---|
| Allowed Extensions | jpg,jpeg,png,gif,pdf,doc,docx,zip | Comma-separated whitelist. |
| Max File Size (MB) | 10 | Server-enforced maximum per file. |
| Max Files Per Item | 5 | Maximum attachments per cart line item. |

### Display Settings

| Setting | Default | Description |
|---|---|---|
| Upload Label | Upload Your Design | Custom heading displayed above the upload widget. |
| Show in Cart | Yes | Display attachment cards on the cart page and minicart. |
| Show in Checkout | Yes | Display attachment cards in the checkout order summary. |

### Product-Level Control

Edit any product → **Order Attachments** attribute group → set **Allow Order Attachments** to Yes/No.

---

## Admin Management

### Order Detail Tab

Open any order in admin; the **Order Attachments** tab lists:
- File name (clickable download)
- Linked product (clickable)
- File size and extension
- Uploader (customer or guest)
- Customer note
- Upload date

### Dedicated Grid

Navigate to **Sales → Panth Infotech → Order Attachments** for a cross-order view:
- Thumbnail preview column
- Filename, product (linked), order ID (linked), customer, file size, extension, status
- Created / updated dates
- Download action
- Filters: order ID, customer email, SKU, date range, file type, size range

---

## Per-Product Attribute

The module installs a product attribute `panth_allow_order_attachment` (Boolean) in the **Order Attachments** attribute group.

| Value | Behaviour |
|---|---|
| No | Upload widget is hidden on the product page (default). |
| Yes | Upload widget appears; customer may attach files before adding to cart. |

You can set this at product, attribute set, or attribute group level.

---

## File Validation and Security

- **Stored filenames** — SHA-256 hashed; original user-supplied names never touch disk paths
- **Extension whitelist** — only configured extensions are accepted (server-side check)
- **Size limit** — enforced client-side (JS) and server-side (PHP)
- **MIME sniffing** — file contents validated, not just extension
- **Honeypot field** — catches bots submitting the upload form
- **Rate limiting** — 20 uploads per 10-minute window per customer/session
- **Ownership validation** — download and thumbnail endpoints verify the requesting user owns the file
- **Soft-delete** — customers cannot hard-delete; admins can via the grid
- **Storage path** — `var/order_attachments/` — not publicly browsable

---

## FAQ

### How is this different from Magento's native "file" custom option?

Native file custom options are tied to the cart quote item and don't persist cleanly as a first-class order record. Panth Order Attachments creates dedicated `panth_quote_attachment` and `panth_order_attachment` tables, linked to the sales order item, ensuring files remain accessible for the full order lifetime — including reorders, invoices, and RMAs.

### Can customers upload multiple files per product?

Yes. Set **Max Files Per Item** in configuration (default 5). Each enabled product in the cart accepts up to that many files.

### Does it support Hyva?

Yes. The frontend widget has both Luma (PHTML + vanilla JS) and Hyva (Alpine.js + Tailwind) implementations, auto-selected via `Panth\Core\Helper\Theme`.

### What file types are supported?

Any extension you configure. Defaults: jpg, jpeg, png, gif, pdf, doc, docx, zip. You can add ai, psd, eps, svg, tif, xlsx, etc.

### Where are files stored?

In `var/order_attachments/` with SHA-256 hashed filenames. The directory is not publicly browsable; files are served only through authenticated controllers.

### Can guests use Order Attachments?

Yes. Both guest and registered customer checkouts are supported.

### Can the admin delete or replace an attachment after the order is placed?

Yes. Admins can soft-delete or download any attachment from the grid and order view tab.

### Does it work with Adobe Commerce Cloud?

Yes. Files are stored in the writable `var/` directory which is persisted across deploys on ACC.

### Does it support multi-store?

Yes. Configuration respects default → website → store view scope. Attachments are stored per order regardless of store view.

### Is a REST API available?

REST endpoints for listing and downloading attachment metadata are included. GraphQL support is on the roadmap.

---

## Support

| Channel | Contact |
|---|---|
| Email | kishansavaliyakb@gmail.com |
| Website | [kishansavaliya.com](https://kishansavaliya.com) |
| WhatsApp | +91 84012 70422 |
| GitHub Issues | [github.com/mage2sk/module-order-attachments/issues](https://github.com/mage2sk/module-order-attachments/issues) |
| Upwork (Top Rated Plus) | [Hire Kishan Savaliya](https://www.upwork.com/freelancers/~016dd1767321100e21) |
| Upwork Agency | [Panth Infotech](https://www.upwork.com/agencies/1881421506131960778/) |

Response time: 1-2 business days for paid licenses.

### 💼 Need Custom Magento Development?

<p align="center">
  <a href="https://kishansavaliya.com/get-quote">
    <img src="https://img.shields.io/badge/%F0%9F%92%AC%20Get%20a%20Free%20Quote-kishansavaliya.com%2Fget--quote-DC2626?style=for-the-badge" alt="Get a Free Quote" />
  </a>
</p>

<p align="center">
  <a href="https://www.upwork.com/freelancers/~016dd1767321100e21">
    <img src="https://img.shields.io/badge/Hire%20Kishan-Top%20Rated%20Plus-14a800?style=for-the-badge&logo=upwork&logoColor=white" alt="Hire on Upwork" />
  </a>
  &nbsp;&nbsp;
  <a href="https://www.upwork.com/agencies/1881421506131960778/">
    <img src="https://img.shields.io/badge/Visit-Panth%20Infotech%20Agency-14a800?style=for-the-badge&logo=upwork&logoColor=white" alt="Visit Agency" />
  </a>
  &nbsp;&nbsp;
  <a href="https://kishansavaliya.com">
    <img src="https://img.shields.io/badge/Visit%20Website-kishansavaliya.com-0D9488?style=for-the-badge" alt="Visit Website" />
  </a>
</p>

---

## License

Commercial — see `LICENSE.txt`. One license per Magento production installation. Includes 12 months of free updates and email support.

---

## About Panth Infotech

Built and maintained by **Kishan Savaliya** — [kishansavaliya.com](https://kishansavaliya.com) — a **Top Rated Plus** Magento developer on Upwork with 10+ years of eCommerce experience.

**Panth Infotech** is a Magento 2 development agency specialising in high-quality, security-focused extensions and themes for both Hyva and Luma storefronts. Our extension suite covers SEO, performance, checkout, product presentation, customer engagement, and store management — over 34 modules built to MEQP standards and tested across Magento 2.4.4 to 2.4.8.

Browse the full catalog on the [Adobe Commerce Marketplace](https://commercemarketplace.adobe.com) or [Packagist](https://packagist.org/packages/mage2kishan/).

### Quick Links

- 🌐 **Website:** [kishansavaliya.com](https://kishansavaliya.com)
- 💬 **Get a Quote:** [kishansavaliya.com/get-quote](https://kishansavaliya.com/get-quote)
- 👨‍💻 **Upwork Profile (Top Rated Plus):** [upwork.com/freelancers/~016dd1767321100e21](https://www.upwork.com/freelancers/~016dd1767321100e21)
- 🏢 **Upwork Agency:** [upwork.com/agencies/1881421506131960778](https://www.upwork.com/agencies/1881421506131960778/)
- 📦 **Packagist:** [packagist.org/packages/mage2kishan/module-order-attachments](https://packagist.org/packages/mage2kishan/module-order-attachments)
- 🐙 **GitHub:** [github.com/mage2sk/module-order-attachments](https://github.com/mage2sk/module-order-attachments)
- 🛒 **Adobe Marketplace:** [commercemarketplace.adobe.com](https://commercemarketplace.adobe.com)
- 📧 **Email:** kishansavaliyakb@gmail.com
- 📱 **WhatsApp:** +91 84012 70422

---

<p align="center">
  <strong>Ready to add file attachments to your Magento 2 orders?</strong><br/>
  <a href="https://kishansavaliya.com/get-quote">
    <img src="https://img.shields.io/badge/%F0%9F%9A%80%20Get%20Started%20%E2%86%92-Free%20Quote%20in%2024h-DC2626?style=for-the-badge" alt="Get Started" />
  </a>
</p>

---

**SEO Keywords:** magento 2 order attachments, magento 2 file upload checkout, custom file upload magento, attach files to orders magento, magento 2 order file upload extension, magento 2 checkout upload, order item attachments magento, magento 2 print on demand upload, magento 2 artwork upload, magento 2 prescription upload, magento 2 personalised products upload, magento 2 customer file upload, magento 2 multi file upload, magento 2 thumbnail preview admin, magento 2 order attachment grid, magento 2 per product file upload, magento 2 file size validation, magento 2 B2B file upload, magento 2 custom product file upload, magento 2 hyva file upload, magento 2 luma file upload, magento 2.4.8 extension, php 8.4 magento module, panth order attachments, kishan savaliya magento, panth infotech magento, top rated plus magento freelancer, hire magento developer upwork, custom magento development, mage2kishan, mage2sk
