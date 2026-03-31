---
title: "ID Data Extraction (OCR)"
source_slides: [12]
pdf_pages: [11]
website_mapping:
  - page: "features/identity-verification/id-data-extraction"
    relevance: "primary"
  - page: "features/identity-verification/id-verification"
    relevance: "supporting"
cida_pillar: "Identity Proofing"
internal_product: "OkayID"
last_extracted: "2026-03-31"
notion_url: "https://innov8tif.notion.site/73f2ae78756f485d9bfaab6d079c3994"
notion_page_id: "73f2ae78-756f-485d-9bfa-ab6d079c3994"
content_type: "product"
primary_source: "merged"
last_notion_sync: "2026-03-31"
related_docs:
  - "concepts/id-capture-best-practices.md"
  - "concepts/document-authentication/how-does-it-work.md"
---

# ID Data Extraction (OkayID OCR)

## Key Facts
- Supports more than **12,000 identity documents** (including worldwide passports)
- Covers **248 countries and territories**
- Uses **Optical Character Recognition (OCR)** technology
- **High accuracy of >95%** for Roman alphabets in good lighting conditions
- **Automatically crops out face and ID card** from image

## Extracted Data Fields
- ID number
- Name
- Gender
- Date of Birth
- Nationality
- Address
- Others (document-specific fields)

## How It Works
1. User aligns ID card within the camera frame on their mobile device
2. OkayID captures the document image
3. OCR engine extracts text fields automatically
4. Results displayed in structured format (field labels + values)
5. Face photo is cropped from the ID for use in facial matching stage

## Notes for Website Content
- **NEW vs website**: Website already has strong stats (95% faster, 40-60% abandonment reduction) that the deck does NOT include. Deck adds:
  - **12,000+ identity documents** — website doesn't specify the exact number
  - **248 countries and territories** — website doesn't specify coverage breadth
  - **>95% accuracy for Roman alphabets** — website says "exceeds human accuracy" but not the specific percentage
  - **Automatically crops out face and ID card** — not mentioned on website
- Website already has: OCR/NFC/chip reader, auto document detection, multi-language, speed/error reduction stats

## Additional Context (Notion)

> *Source: Notion wiki — [OkayID]*

#### What is OkayID? 

OkayID is the Data Capture module of EMAS eKYC, automating your data-entry process.

![Image 1](media/identity-proofing/okayid-img-1.png)

#### How it Works

The OkayID module first identifies the document type of the captured ID Document, such as a driving license or passport. It then extracts user information from the ID document using Optical Character Recognition (OCR) technology, Near Field Communication (NFC) scans, and/or Chip Readers. The collected data is automatically populated into the respective fields.

![Image 2](media/identity-proofing/okayid-img-2.webp)

#### Why it Matters

Traditionally, companies employ on-site employees and data-entry specialists to input customer information manually. However, this strategy is expensive, restricted to office hours, and subject to human error.

![Image 3](media/identity-proofing/okayid-img-3.png)

OkayID removes the need for manual data entry work. It helps businesses save time, costs, and resources while improving accuracy and compliance standards.

#### Features & Benefits

- Automatically detects document type
- Supports multiple languages: Thai, Khmer, Roman characters, and numbers
- OCR (Optical Character Recognition) Scan
- Passport NFC Scan

---

*Read more:*

- [List of supported fields](https://api2-ekycapis.innov8tif.com/okayid/okayid-all/field-type-reference/field-type-lists)
- [List of supported documents](https://api2-ekycportal.innov8tif.com/emas-ekyc-portal/supported-document-lists-for-okayid-and-okaydoc)
*Next Page:*

-

## Visual Context
<!-- PDF 11: Left side shows two mobile phone screens — first showing camera viewfinder with "Align your card within the frame" prompt and a Malaysian MyKad being captured; second showing "OCR Result" screen with extracted fields (Document Number: 000110105111, Name: MOHD SPECIMEN BIN ABDULLAH, Gender: Male, DOB: 1/10/2000, Nationality: WARGANEGARA, Issuing State: Malaysia, Address: full address). Right side has bullet points and a world map indicating global coverage -->