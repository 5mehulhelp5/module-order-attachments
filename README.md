# Panth Order Attachments for Magento 2

[![Magento 2.4.4 - 2.4.8](https://img.shields.io/badge/Magento-2.4.4%20--%202.4.8-orange)]()
[![PHP 8.1 - 8.4](https://img.shields.io/badge/PHP-8.1%20--%208.4-blue)]()
[![Hyva Compatible](https://img.shields.io/badge/Hyva-Compatible-green)]()
[![Luma Compatible](https://img.shields.io/badge/Luma-Compatible-green)]()

**Let customers attach files to order items** — drag-and-drop upload
widget on the product page, thumbnails in the cart and checkout,
file management in the admin order view, and a dedicated admin grid
for all attachments.

Perfect for custom printing, personalization, engraving, embroidery,
and any product that requires customer-supplied artwork or documents.

---

## Features

### Product page upload widget
- Beautiful drag-and-drop upload zone with progress bars and
  thumbnail previews (images) or file-type badges (documents)
- Per-product enable/disable via the `panth_allow_order_attachment`
  product attribute (Boolean, set in the "Order Attachments" attribute
  group)
- Configurable: allowed extensions, max file size, max files per item,
  custom upload label
- Honeypot + rate limiting for bot protection
- Full Alpine.js implementation for Hyva, vanilla JS for Luma

### Cart and checkout integration
- Uploaded files are linked to the quote item via an after-plugin on
  the add-to-cart controller
- Rich attachment cards (thumbnails + filenames + notes) shown as
  `additional_options` on the quote item — visible in cart, minicart,
  and checkout order summary
- Cart edit (UpdateItemOptions) preserves, adds, or removes
  attachments as the customer updates
- Customer notes travel with the attachments

### Order placement
- Observer on `sales_order_place_after` copies quote-item attachments
  to order-item attachments (sets `order_id` and `order_item_id`)
- Frontend "My Orders > View Order" page shows grouped attachment
  cards with download links and lightbox for images

### Admin
- **Order view tab** — "Order Attachments" section on the admin order
  detail page with file name, product link, size, type, uploader,
  note, date, and download action
- **Dedicated grid** — Sales > Panth Infotech > Order Attachments with
  columns: thumbnail, filename, product (linked), order ID, customer,
  file size, extension, status, dates, and download action
- ACL resources for view and download

### Security
- Stored filenames are SHA-256 hashed (never user-supplied names on
  disk)
- File extension whitelist enforced server-side
- Max file size enforced server-side
- Honeypot field to catch bots
- Rate limiting (max 20 uploads per 10-minute window per
  customer/session)
- Ownership validation on download and thumbnail endpoints
- Soft-delete (status flag) — files are never hard-deleted by
  customers

### Lightbox
- Global lightbox script for image attachment popups — works in cart,
  minicart, checkout, and order view on both Hyva and Luma

---

## Installation

### Via Composer (recommended)

```bash
composer require mage2kishan/module-order-attachments
bin/magento module:enable Panth_Core Panth_OrderAttachments
bin/magento setup:upgrade
bin/magento setup:di:compile
bin/magento setup:static-content:deploy -f
bin/magento cache:flush
```

### Via uploaded zip

1. Download the extension zip from the Marketplace
2. Extract to `app/code/Panth/OrderAttachments`
3. Make sure `app/code/Panth/Core` is also installed
4. Run the same commands above starting from `module:enable`

---

## Requirements

| | Required |
|---|---|
| Magento | 2.4.4 — 2.4.8 (Open Source / Commerce / Cloud) |
| PHP | 8.1 / 8.2 / 8.3 / 8.4 |
| `mage2kishan/module-core` | ^1.0 (installed automatically as a composer dependency) |

---

## Configuration

Open **Stores > Configuration > Panth Extensions > Order Attachments**.

### General
- **Enable Module** — master on/off switch

### Upload Settings
- **Allowed Extensions** — comma-separated list (e.g. `jpg,jpeg,png,gif,pdf,doc,docx,zip`)
- **Max File Size (MB)** — maximum size per file
- **Max Files Per Item** — maximum attachments per cart item

### Display Settings
- **Upload Label** — custom heading for the upload widget (e.g. "Upload Your Design")
- **Show in Cart** — display attachment info in the shopping cart
- **Show in Checkout** — display attachment info in checkout order summary

### Product-level control
Edit any product > "Order Attachments" attribute group > set
**Allow Order Attachments** to Yes/No.

---

## Support

| Channel | Contact |
|---|---|
| Email | kishansavaliyakb@gmail.com |
| Website | https://kishansavaliya.com |
| WhatsApp | +91 84012 70422 |

Response time: 1-2 business days for paid licenses.

---

## License

Commercial — see `LICENSE.txt`. One license per Magento production
installation. Includes 12 months of free updates and email support.

---

## About the developer

Built and maintained by **Kishan Savaliya** — https://kishansavaliya.com.
Builds high-quality Magento 2 extensions and themes for both Hyva and
Luma storefronts.
