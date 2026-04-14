# Changelog

All notable changes to this extension are documented here. The format
is based on [Keep a Changelog](https://keepachangelog.com/en/1.1.0/),
and this project adheres to [Semantic Versioning](https://semver.org/).

## [1.0.0] — Initial release

### Added — product page upload widget
- Drag-and-drop file upload zone with real-time progress bars and
  thumbnail previews (images) or file-type badges (documents).
- Per-product enable/disable via the `panth_allow_order_attachment`
  EAV attribute (Boolean, installed by data patch).
- Configurable: allowed extensions, max file size, max files per item,
  custom upload label.
- Honeypot field + rate limiting (20 uploads per 10 minutes per
  customer/session) for bot protection.
- Full Alpine.js implementation for Hyva themes, vanilla JS for Luma.

### Added — cart and checkout integration
- After-plugin on `Magento\Checkout\Controller\Cart\Add` links
  uploaded attachments to the quote item.
- After-plugin on `Magento\Checkout\Controller\Cart\UpdateItemOptions`
  preserves, adds, or removes attachments on cart edit.
- Rich attachment cards (thumbnails, filenames, notes) stored as
  `additional_options` on the quote item — visible in cart, minicart,
  and checkout order summary.
- Hyva: styled HTML cards with image thumbnails and lightbox links.
- Luma: plain-text summary (Luma strips HTML attributes).

### Added — order placement
- Observer on `sales_order_place_after` copies quote-item attachments
  to order-item attachments (sets `order_id` and `order_item_id`).
- Frontend "My Orders > View Order" page shows grouped attachment
  cards with download links and lightbox for images.

### Added — admin
- Order view: "Order Attachments" section with file details table
  and download actions.
- Dedicated admin grid (Sales > Panth Infotech > Order Attachments)
  with thumbnail, filename, product link, order ID, customer, file
  size, extension, status, dates, and download action.
- ACL resources: `Panth_OrderAttachments::attachment_view` and
  `Panth_OrderAttachments::attachment_download`.

### Added — security
- Stored filenames use SHA-256 hash (never user-supplied names on
  disk).
- Server-side file extension whitelist and max file size enforcement.
- Ownership validation on download and thumbnail endpoints.
- Soft-delete (status flag) — files are never hard-deleted by
  customers.

### Added — lightbox
- Global lightbox script for image attachment popups — works in cart,
  minicart, checkout, and order view on both Hyva and Luma.

### Quality
- Constructor injection only — zero `ObjectManager::getInstance()`
  usage anywhere in the module.
- All PHP files pass MEQP (Magento2 coding standard) with zero errors.
- Composer validate passes.

### Compatibility
- Magento Open Source / Commerce / Cloud 2.4.4 — 2.4.8
- PHP 8.1, 8.2, 8.3, 8.4
- Hyva themes and Luma themes

---

## Support

For all questions, bug reports, or feature requests:

- **Email:** kishansavaliyakb@gmail.com
- **Website:** https://kishansavaliya.com
- **WhatsApp:** +91 84012 70422
