---
title: "Document Authentication"
source_slides: [19, 20, 21, 22]
pdf_pages: [18, 19, 20, 21]
website_mapping:
  - page: "features/identity-verification/id-verification"
    relevance: "primary"
cida_pillar: "Identity Proofing"
internal_product: "OkayDoc"
last_extracted: "2026-03-31"
notion_url: "https://innov8tif.notion.site/573aaca368374ea7924eaa870842c12e"
notion_page_id: "573aaca3-6837-4ea7-924e-aa870842c12e"
content_type: "product"
primary_source: "merged"
last_notion_sync: "2026-03-31"
related_docs:
  - "concepts/document-authentication/how-does-it-work.md"
  - "concepts/document-authentication/ai-in-document-authentication.md"
---

# Document Authentication (OkayDoc)

## 5 Authentication Techniques

1. **Layout Check** — Verifies the document layout matches expected template (position of elements, spacing)
2. **Quality Check** — Assesses image quality (blur, brightness, resolution)
3. **Content Tampering Check** — Detects if content has been digitally altered (e.g., year of expiry tampered in MRZ)
4. **Screen Presentation Check** — Detects if the document is being shown on a screen rather than physical card
5. **Security Feature Authentication** — Verifies physical security features (holograms, microprint). **Patented innovations.**

## MyKad Front Checks (20+ items)

### Position & Presence Checks
- Kad Pengenalan Header Presence & Position Check
- MSC Logo Presence & Position Check
- MyKad Logo Presence & Position Check
- Malaysia Flag Presence & Position Check
- Chip Presence & Position Check
- Name Presence & Position Check
- Address Presence & Position Check
- Citizenship Label Presence & Position Check
- Gender Label Presence & Position Check
- Hibiscus Logo Presence & Position Check

### Data Integrity Checks
- ID Number Presence, Font Size & Consistency Check (with Back of MyKad)

### Advanced Detection
- Holographic Photo Comparison & Position Check
- Holographic Photo Colour Mode Detection
- **Hologram Detection** — Patent pending: UI2020006327 & PI2021004026
- **Microprint Detection** — Patented: MY-184165-A. Extremely effective in detecting full colour replica
- Religion Tampering Check (Beta)

### Other Checks
- Content Substitution (i.e., Tampering) Detection
- Colour Mode Detection
- Screen Detection
- ID Brightness & Blurriness Detection
- ID Type & Version Detection

## MyKad Back Checks

### Landmark Checks
- Coat of Arms Landmark Presence & Position Check
- Crown Landmark Presence & Position Check
- Towers Landmark Presence & Position Check
- KPPN Landmark Presence & Position Check
- 80K Chip Landmark Presence & Position Check
- TnG (Touch 'n Go) Landmark Presence & Position Check
- Malaysia Text Landmark Presence & Position Check

### Data Consistency
- ID Number Presence & Consistency Check (with Front of MyKad)

### Older-Version MyKad Checks
- ATM Landmark Presence & Position Check
- MEPS Presence & Position Check

## Innovation Patents

| Patent No. | Title | Granted On |
|---|---|---|
| MY-184165-A | A method to verify authenticity of a Malaysian identity document | 24-Mar-2021 |
| MY-192715-A | Method for authenticating identification documents | 05-Sep-2022 |
| US 12026932.B2 | A Method to Determine Authenticity of Security Hologram | 02-Jul-2024 |
| PI2021004026 (Malaysia) | A Method to Determine Authenticity of Security Hologram | Application Submitted / Patent Pending |
| 1-2021-05840 (Vietnam) | A Method to Determine Authenticity of Security Hologram | Application Submitted / Patent Pending |

## Notes for Website Content
- **NEW vs website**: Website says "~20 security features checked" — deck provides the EXACT 20+ checks:
  - Full MyKad front check list (MSC logo, MyKad logo, Malaysia flag, chip, hologram, microprint, etc.)
  - Full MyKad back check list (Coat of Arms, Crown, Towers, KPPN, TnG, etc.)
  - **Patent numbers** (MY-184165-A, MY-192715-A, US 12026932.B2) — not on website, strong credibility signal
  - **Hologram detection** with patent pending (PI2021004026) — not on website
  - **Microprint detection** patented, described as "extremely effective in detecting full colour replica" — not on website
  - **Religion tampering check (Beta)** — not on website
- Website already has: general security feature descriptions, 2-5 second verification time, anti-spoofing claims

## Additional Context (Notion)

> *Source: Notion wiki — [OkayDoc]*

#### What is OkayDoc? 

OkayDoc is the **Document Authentication** module of EMAS eKYC. It verifies whether a user-submitted ID document is genuine, legitimate, and authentic.

![Image 1](media/identity-proofing/okaydoc-img-4.png)

#### How it Works 

Most government-issued ID documents contain security features that verify their authenticity. Examples include holograms, ghost images, microprints, and more. OkayDoc uses advanced AI algorithms to check ID documents for these security features. Additionally, OkayDoc has anti-spoofing and anti-tampering features.

![Image 2](media/identity-proofing/okaydoc-img-5.webp)

#### Why it Matters 

Fraudsters will always find ways to create false documents to conduct criminal activities. Traditionally, companies resolve this by having employees manually verify ID documents by hand following a guidebook. However, this is impossible today, where accounts can be registered online without human touch-points.

![Image 3](media/identity-proofing/okaydoc-img-6.png)

OkayDoc allows companies to onboard customers 100% digitally while complying with regulations. It prevents most fraudulent sign-up attempts and serves as a deterrent for many cybercriminals.

#### Features & Benefits

- Patented technology
- The most comprehensive anti-fraud ID solution in ASEAN, with approximately 20 security checks.

---

*Read more:*

- [Common Spoofing Techniques](https://innov8tif.com/warning-dangers-of-spoofing-to-businesses-and-consumers/)
- [List of available checks](https://api2-ekycapis.innov8tif.com/okaydoc/okaydoc-all/supported-documents-and-check-type)
- [List of supported documents](https://docs.google.com/spreadsheets/d/1R6ZjtXfo5xUY3ZuhhQAviFIgLsKcKw1cJaViMdjngzA/edit?ts=5e421bdc#gid=0)
*Next Page*:

-

## Visual Context
<!-- PDF 18: OkayDoc overview slide. Title "Document authentication techniques comprises combination of:" followed by 5 check types with icons. Layout check shows ID card template, Quality check shows ID comparison, Content Tampering shows passport MRZ with highlighted tampered field, Screen Presentation shows monitor, Security Feature shows hologram close-ups -->
<!-- PDF 19: Detailed MyKad front diagram. Actual MyKad specimen in center with ~15 red arrows pointing to specific areas, each labeled with the check name. Shows MSC logo, MyKad logo, Malaysia flag, chip, hologram, microprint areas -->
<!-- PDF 20: MyKad back specimen with ~8 red arrows pointing to landmarks: Coat of Arms, Crown, Towers, KPPN, 80K Chip, TnG, Malaysia Text. Also shows older-version checks -->
<!-- PDF 21: Patents table with 5 rows showing patent numbers, titles, and grant dates -->