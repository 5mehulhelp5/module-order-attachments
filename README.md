<!-- SEO Meta -->
<!--
  Title: Magento 2 Order Attachments Extension | Upload Files to Order Items at Checkout | Hyva + Luma | Panth Infotech
  Description: Panth Order Attachments lets Magento 2 customers upload files to specific order items during checkout. Includes admin grid management, thumbnail previews, downloads, file size and extension validation, multi-file support, and a per-product attribute toggle. Compatible with Magento 2.4.4 to 2.4.8 and PHP 8.1 to 8.4. Built by Top Rated Plus Magento developer Kishan Savaliya.
  Keywords: magento 2 order attachments, magento 2 file upload checkout, attach files to orders magento 2, magento 2 order item file upload, magento 2 checkout file upload extension, magento 2 print on demand upload, magento 2 prescription upload, hyva file upload magento 2, luma file upload magento 2, magento 2 customer file upload extension
  Author: Kishan Savaliya (Panth Infotech)
  Canonical: https://kishansavaliya.com/magento-2-order-attachments.html
-->

# Magento 2 Order Attachments Extension: Upload Files to Order Items at Checkout (Hyva + Luma)

[![Magento 2.4.4 - 2.4.8](https://img.shields.io/badge/Magento-2.4.4%20--%202.4.8-orange?logo=magento&logoColor=white)](https://magento.com)
[![PHP 8.1 - 8.4](https://img.shields.io/badge/PHP-8.1%20--%208.4-blue?logo=php&logoColor=white)](https://php.net)
[![Hyva + Luma](https://img.shields.io/badge/Themes-Hyva%20%2B%20Luma-14b8a6)](https://www.hyva.io)
[![Live Demo & Details](https://img.shields.io/badge/Live%20Demo%20%26%20Details-magento--2--order--attachments-0D9488?style=flat)](https://kishansavaliya.com/magento-2-order-attachments.html)
[![Packagist](https://img.shields.io/badge/Packagist-mage2kishan%2Fmodule--order--attachments-orange?logo=packagist&logoColor=white)](https://packagist.org/packages/mage2kishan/module-order-attachments)
[![Upwork Top Rated Plus](https://img.shields.io/badge/Upwork-Top%20Rated%20Plus-14a800?logo=upwork&logoColor=white)](https://www.upwork.com/freelancers/~016dd1767321100e21)
[![Website](https://img.shields.io/badge/Website-kishansavaliya.com-0D9488)](https://kishansavaliya.com)

> **Let customers attach files to specific order items during checkout.** Panth Order Attachments adds a drag-and-drop upload widget to the product page, carries the files through the cart and checkout, and gives admins a searchable grid to download every uploaded file linked to its order item.

**Product page:** [kishansavaliya.com/magento-2-order-attachments.html](https://kishansavaliya.com/magento-2-order-attachments.html)

---

## Quick Answer

**What is Panth Order Attachments?** It is a Magento 2 extension that lets customers upload files to specific order items on the product page. The files travel through the cart and checkout and are stored in the `panth_order_attachment` table, linked to the sales order item.

**What does it add to my store?**

- A **drag-and-drop upload widget** on the product page, with thumbnail previews and progress bars.
- **Files carried through cart and checkout** and saved to the order item on placement.
- An **admin grid** under Panth Extensions > Order Attachments > Manage Attachments, with filters, thumbnail previews, and one-click downloads.
- A **per-product attribute** (`panth_allow_order_attachment`) to turn uploads on or off per product.
- **File validation** on both client and server: allowed extensions, max file size, and max files per item, all configurable.

**Which themes are supported?** Both **Hyva** (Alpine.js) and **Luma** (vanilla JS). The right template is loaded automatically based on the active theme.

**What does it need?** Magento 2.4.4 to 2.4.8, PHP 8.1 to 8.4, and the free `mage2kishan/module-core` package (version 1.0.17 or later).

---

## Need Custom Magento 2 Development?

> **Get a free quote for your project in 24 hours** for custom modules, Hyva themes, performance work, M1 to M2 migrations, and Adobe Commerce Cloud.

<p align="center">
  <a href="https://kishansavaliya.com/get-quote">
    <img src="https://img.shields.io/badge/Get%20a%20Free%20Quote%20%E2%86%92-Reply%20within%2024%20hours-DC2626?style=for-the-badge" alt="Get a Free Quote" />
  </a>
</p>

<table>
<tr>
<td width="50%" align="center">

### Kishan Savaliya
**Top Rated Plus on Upwork**

[![Hire on Upwork](https://img.shields.io/badge/Hire%20on%20Upwork-Top%20Rated%20Plus-14a800?style=for-the-badge&logo=upwork&logoColor=white)](https://www.upwork.com/freelancers/~016dd1767321100e21)

100% Job Success • 10+ Years Magento Experience
Adobe Certified • Hyva Specialist

</td>
<td width="50%" align="center">

### Panth Infotech Agency
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

- [Who Is It For](#who-is-it-for)
- [Key Features](#key-features)
- [Compatibility](#compatibility)
- [Installation](#installation)
- [Configuration](#configuration)
- [How It Works](#how-it-works)
- [Admin Management](#admin-management)
- [FAQ](#faq)
- [Support](#support)
- [About Panth Infotech](#about-panth-infotech)
- [Quick Links](#quick-links)

---

## Who Is It For

- **Print-on-demand stores** selling custom t-shirts, mugs, canvas prints, or business cards where customers must supply artwork at order time.
- **Personalised gift stores** where customers upload a photo or design to attach to a specific item.
- **Opticians and pharmacies** that need customers to upload a prescription PDF before the order is fulfilled.
- **B2B merchants** who need customers to attach purchase orders, technical specs, or drawings to specific line items.
- **Engraving and embroidery stores** where each item needs a reference image or text file from the customer.

---

## Key Features

### Product Page Upload Widget
- **Drag-and-drop file upload** with real-time progress bars on the product page.
- **Thumbnail previews** for images, file-type badges for documents.
- **Multi-file support** so customers can attach more than one file per item (max count is configurable).
- **Optional customer note** field travels with each attachment.
- **Per-product control** through the `panth_allow_order_attachment` attribute, so only products that need uploads show the widget.

### Cart, Minicart, and Checkout
- **Attachment cards visible in cart, minicart, and checkout order summary** so customers can confirm what they uploaded.
- **Cart edit support** so customers can add, replace, or remove attachments when they update a cart item.
- Files are carried through to order placement via a `sales_order_place_after` observer.

### My Account: Order View
- **Attachment cards with download links** appear on the frontend order view page under My Account.
- **Image lightbox** lets customers click to enlarge image attachments from the cart, checkout, and order view on both Hyva and Luma.

### Admin Grid and Order Tab
- **Dedicated admin grid** under Panth Extensions > Order Attachments > Manage Attachments, showing thumbnail, filename, product link, order ID, customer, file size, extension, and status.
- **Filters and search** by order ID, customer email, SKU, date range, file type.
- **One-click download** from the grid.
- **Order Attachments section on the admin order view** page, listing files linked to that order.
- **ACL resources** for view and download permissions.

### Security
- **SHA-256 hashed filenames on disk** so original user-supplied names never touch the file path.
- **Extension allowlist** enforced server-side, with a hard deny-list for executable types (php, phtml, sh, jsp, and others) enforced via `Panth\Core\Security\UploadExtensionPolicy`.
- **MIME type validation** so the file contents are checked, not just the extension.
- **File size enforcement** on both client (JS) and server (PHP).
- **Honeypot field and rate limiting** (20 uploads per 10-minute window) to block bot submissions.
- **Ownership validation** on download and thumbnail endpoints so customers can only access their own files.
- **Soft-delete only** so customers cannot hard-delete files; admins manage deletions through the grid.
- Files are stored in `var/order_attachments/`, which is not publicly browsable.

### Hyva + Luma Ready
- **Native Hyva templates** built on Alpine.js with no jQuery or RequireJS.
- **Native Luma templates** using standard PHTML and vanilla JS.
- **Theme is detected automatically** through `Panth\Core\Helper\Theme`.

---

## Compatibility

| Requirement | Versions Supported |
|---|---|
| Magento Open Source | 2.4.4, 2.4.5, 2.4.6, 2.4.7, 2.4.8 |
| Adobe Commerce | 2.4.4, 2.4.5, 2.4.6, 2.4.7, 2.4.8 |
| Adobe Commerce Cloud | 2.4.4 to 2.4.8 |
| PHP | 8.1.x, 8.2.x, 8.3.x, 8.4.x |
| Hyva Theme | 1.0+ (native Alpine.js support) |
| Luma Theme | Native support (vanilla JS) |
| Required Dependency | `mage2kishan/module-core` ^1.0.17 (free) |

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

1. Download the latest release from [Packagist](https://packagist.org/packages/mage2kishan/module-order-attachments) or from the [product page](https://kishansavaliya.com/magento-2-order-attachments.html).
2. Extract it to `app/code/Panth/OrderAttachments/` in your Magento install.
3. Make sure `Panth_Core` (1.0.17 or later) is installed too, as it is a required dependency.
4. Run the commands above starting from `bin/magento module:enable`.

### Verify Installation

```bash
bin/magento module:status Panth_OrderAttachments
# Expected: Module is enabled
```

After install, open:
```
Admin -> Stores -> Configuration -> Panth -> Order Attachments
```

---

## Configuration

Go to **Stores -> Configuration -> Panth -> Order Attachments**.

| Setting | Group | Default | Description |
|---|---|---|---|
| Enable Order Attachments | General Settings | Yes | Master toggle. Disabling hides the upload widget on all product pages. |
| Allowed File Extensions | Upload Settings | jpg,jpeg,png,gif,pdf,doc,docx,zip | Comma-separated list of accepted extensions. Executable types (php, sh, phtml, etc.) are always blocked, regardless of this setting. |
| Maximum File Size (MB) | Upload Settings | (required) | Maximum file size in megabytes per upload, enforced on client and server. |
| Maximum Files Per Item | Upload Settings | (required) | How many files a customer can attach to a single cart line item. |
| Upload Button Label | Display Settings | (store default) | The label shown on the upload button on the frontend product page. |
| Show in Cart | Display Settings | Yes | Show the attachment cards on the cart page and minicart. |
| Show in Checkout | Display Settings | Yes | Show the attachment cards in the checkout order summary. |

### Per-Product Control

Edit any product in the admin, find the **Order Attachments** attribute group, and set **Allow Order Attachments** (the `panth_allow_order_attachment` attribute) to Yes or No.

| Value | Behavior |
|---|---|
| No (default) | Upload widget is hidden on this product page. |
| Yes | Upload widget appears; the customer can attach files before adding to cart. |

---

## How It Works

1. Admin sets **Allow Order Attachments** to Yes on a product.
2. The customer visits the product page and sees the drag-and-drop upload widget.
3. The customer selects one or more files. Client-side and server-side validation check the extension, MIME type, and file size.
4. Files are stored in `var/order_attachments/` with SHA-256 hashed filenames. The attachment is linked to the quote item.
5. Attachment cards appear in the cart, minicart, and checkout summary.
6. When the customer edits the cart item, they can add, replace, or remove attachments.
7. On order placement, an observer copies the attachments from the quote item to the order item and sets the `order_id` and `order_item_id` in the `panth_order_attachment` table.
8. The customer can see and download their uploaded files from My Account -> Orders -> View Order.
9. The admin manages all attachments from the dedicated grid and from the Order Attachments section on the admin order view page.

---

## Admin Management

### Dedicated Grid

Navigate to **Panth Extensions -> Order Attachments -> Manage Attachments**.

The grid shows:
- Thumbnail preview column for images, file-type badge for documents.
- Filename, product (linked), order ID (linked), customer email, file size, extension, status.
- Created and updated dates.
- Download action per row.
- Filters: order ID, customer email, SKU, date range, file type.

### Order View Tab

Open any order in the admin. The **Order Attachments** section lists:
- Filename with a download link.
- Linked product name.
- File size and extension.
- Customer name and email.
- Customer note (if provided).
- Upload date.

---

## FAQ

### Does it work on Hyva themes?
Yes. Panth Order Attachments ships native Alpine.js templates for Hyva. The module reads the active theme through `Panth_Core` and loads the Hyva template automatically. The Luma vanilla-JS template is also included.

### Can customers upload multiple files per product?
Yes. Set **Maximum Files Per Item** in the Upload Settings group. Each enabled product in the cart accepts up to that many files per line item.

### What file types are allowed?
You configure a comma-separated allowlist in the Upload Settings. Common defaults: jpg, jpeg, png, gif, pdf, doc, docx, zip. You can add ai, psd, eps, svg, tif, xlsx, and others. Executable types like php, phtml, sh, and jsp are always blocked, even if you type them into the allowlist.

### Where are the uploaded files stored?
In `var/order_attachments/` with SHA-256 hashed filenames. The directory is not publicly browsable. Files are served only through the ownership-gated download controller, so customers can only download files tied to their own orders.

### Can guests use Order Attachments?
Yes. Both guest and registered customer checkouts are supported. Guest sessions are tracked by session ID.

### Will it break after a Magento upgrade?
The module uses standard Magento extension patterns, constructor dependency injection only, and no direct ObjectManager usage. It has been tested on Magento 2.4.4 to 2.4.8 with PHP 8.1 to 8.4.

### Can the admin delete or download attachments after the order is placed?
Yes. Admins can download any attachment from the grid or the order view tab. Soft-delete is available from the admin grid. Customers cannot hard-delete files.

### Does it work with Adobe Commerce Cloud?
Yes. Files are stored in the writable `var/` directory, which persists across deploys on Adobe Commerce Cloud.

### Does it support multi-store setups?
Yes. Configuration respects Magento's default, website, and store view scope. Attachments are stored per order item regardless of store view.

---

## Support

| Channel | Contact |
|---|---|
| Product Page | [kishansavaliya.com/magento-2-order-attachments.html](https://kishansavaliya.com/magento-2-order-attachments.html) |
| Email | kishansavaliyakb@gmail.com |
| Website | [kishansavaliya.com](https://kishansavaliya.com) |
| WhatsApp | +91 84012 70422 |
| GitHub Issues | [github.com/mage2sk/module-order-attachments/issues](https://github.com/mage2sk/module-order-attachments/issues) |
| Upwork (Top Rated Plus) | [Hire Kishan Savaliya](https://www.upwork.com/freelancers/~016dd1767321100e21) |
| Upwork Agency | [Panth Infotech](https://www.upwork.com/agencies/1881421506131960778/) |

Response time: 1-2 business days.

### Need Custom Magento Development?

Looking for **custom Magento module development**, **Hyva theme work**, **store migrations**, or **performance tuning**? Get a free quote in 24 hours:

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
  <a href="https://kishansavaliya.com/magento-2-order-attachments.html">
    <img src="https://img.shields.io/badge/View%20Product%20Page-magento--2--order--attachments-0D9488?style=for-the-badge" alt="View Product Page" />
  </a>
</p>

---

## About Panth Infotech

Built and maintained by **Kishan Savaliya** ([kishansavaliya.com](https://kishansavaliya.com)), a **Top Rated Plus** Magento developer on Upwork with 10+ years of eCommerce experience.

**Panth Infotech** is a Magento 2 development agency that builds high quality, security focused extensions and themes for both Hyva and Luma storefronts. The extension suite covers SEO, performance, checkout, product presentation, customer engagement, and store management, with each module built to MEQP standards and tested across Magento 2.4.4 to 2.4.8.

Browse the full extension catalog on our [Magento extensions page](https://kishansavaliya.com/magento-extensions.html) or on [Packagist](https://packagist.org/packages/mage2kishan/).

---

## Quick Links

| Resource | Link |
|---|---|
| **Product Page** | [magento-2-order-attachments.html](https://kishansavaliya.com/magento-2-order-attachments.html) |
| **Packagist** | [mage2kishan/module-order-attachments](https://packagist.org/packages/mage2kishan/module-order-attachments) |
| **GitHub** | [mage2sk/module-order-attachments](https://github.com/mage2sk/module-order-attachments) |
| **Website** | [kishansavaliya.com](https://kishansavaliya.com) |
| **Free Quote** | [kishansavaliya.com/get-quote](https://kishansavaliya.com/get-quote) |
| **Upwork (Top Rated Plus)** | [Hire Kishan Savaliya](https://www.upwork.com/freelancers/~016dd1767321100e21) |
| **Upwork Agency** | [Panth Infotech](https://www.upwork.com/agencies/1881421506131960778/) |
| **Email** | kishansavaliyakb@gmail.com |
| **WhatsApp** | +91 84012 70422 |

---

<p align="center">
  <strong>Ready to accept file uploads with your Magento 2 orders?</strong><br/>
  <a href="https://kishansavaliya.com/magento-2-order-attachments.html">
    <img src="https://img.shields.io/badge/%F0%9F%9A%80%20See%20Order%20Attachments%20%E2%86%92-Product%20Page%20%26%20Details-DC2626?style=for-the-badge" alt="See Order Attachments" />
  </a>
</p>

---

**SEO Keywords:** magento 2 order attachments, magento 2 file upload checkout, attach files to orders magento 2, magento 2 order item file upload, magento 2 checkout file upload extension, magento 2 order attachments extension, magento 2 print on demand file upload, magento 2 prescription upload, magento 2 personalised products upload, magento 2 artwork upload, magento 2 per product file upload, magento 2 multi file upload, magento 2 admin order attachment grid, magento 2 thumbnail preview upload, magento 2 file validation extension, magento 2 customer file upload, magento 2 b2b file upload, magento 2 hyva file upload, magento 2 luma file upload, alpine js order upload, magento 2 drag drop upload checkout, magento 2 attachment order item, magento 2.4.8 extension, php 8.4 magento module, mage2kishan order attachments, panth order attachments, panth infotech, hire magento developer, top rated plus upwork, kishan savaliya magento, custom magento development
