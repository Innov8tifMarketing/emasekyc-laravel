---
title: "NFC Chip Reading"
source_slides: [15]
pdf_pages: [14]
website_mapping:
  - page: "features/identity-verification/id-data-extraction"
    relevance: "supporting"
  - page: "features/identity-verification/id-verification"
    relevance: "supporting"
cida_pillar: "Identity Proofing"
internal_product: "OkayID NFC"
last_extracted: "2026-03-31"
---

# NFC Chip Reading (OkayID NFC)

## Key Facts
- Supports **Android** (with compatible Near Field Communication) and **NFC-supported iPhone** (>= iOS 13)
- Automatically **decrypts ICAO-compliant ePassport or ID chip** from OCR input
- Enhanced **fraud / passport document tampering prevention**
- **Compares live face with passport photo from ePassport chip**

## How It Works
1. OCR first reads the Machine Readable Zone (MRZ) from the document
2. MRZ data is used as the key to decrypt the NFC chip
3. Phone is placed near the document to read the embedded chip
4. Chip data is extracted (photo, personal info, digital signature)
5. Live face is compared against the chip-stored photo for enhanced verification

## Supported Documents
- ICAO-compliant ePassports (international standard)
- Chip-enabled national ID cards (e.g., Malaysian MyKad)

## Visual Context
<!-- PDF 14: Two mobile phones shown. Left phone displays NFC reading animation (radio waves icon) with "Reading Your Passport A11223456" on screen. Right phone shows a passport with NFC globe symbol. Bullet points on right describe capabilities -->
