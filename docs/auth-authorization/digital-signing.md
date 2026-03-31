---
title: "Digital Signatures"
source_slides: [55, 56, 57]
pdf_pages: [52, 53, 54]
website_mapping:
  - page: "features/additional-verification/digital-signatures"
    relevance: "primary"
cida_pillar: "Auth & Authorization"
internal_product: "SigningCloud"
last_extracted: "2026-03-31"
---

# Digital Signatures (SigningCloud)

## Overview
Digital signature platform assuring **seamless, nonrepudiation signing** conforming to globally recognized standards and backed by **Public Key Infrastructure (PKI)**.

## Legal Recognition
- **Malaysia Digital Signature Act (DSA) 1997**
- **Brunei Electronic Transactions Act (Cap. 196) (ETA)**

## 3 Key Qualities

### 1. Universal Signing Platform
- **CA-agnostic** with built-in options for MCMC-certified CA providers
- Works with multiple Certificate Authority providers

### 2. Tamper-Proof
- Locks completed documents to prevent any unauthorized alterations
- Ensures the document's **data integrity** is always upheld

### 3. Transparent & Traceable
- Sign anytime, anywhere with every signature, amendment, edit and comment recorded in a **secure audit trail**

## Internal vs External Document Comparison

| Feature | Internally Consumed Documents | Legal Binding (DSA 1997 compliant) |
|---|---|---|
| Tamper Proof Non-Repudiation | Yes | Yes |
| Signee identity verification | One-time authorised signatory's identity verification | One-time authorised signatory's identity verification + **eKYC of external customer/signee** |
| Digital certificate by MCMC-approved CA | Not Required | **Required** |
| Digital timestamping by SIRIM | Not Required | **Required** |
| Document Types Supported | Word (.doc/.docx), Excel (.xls/.xlsx), PowerPoint (.ppt/.pptx), PDF, plain text (.txt), and other major formats |

## Target Use Cases

### Internal Documents (no DSA CA required)
- Internal purchase requisition approval
- Project budget approval
- NPD (new product development) approval

### External / Legal Documents (may require DSA-certified CA)
- Agreements between corporate entities including NDA
- Financing Facility Offer Letter to customer
- Consumer agreements

## 5-Step Process Flow
1. **Select Signature Type** — Choose the type of digital signature
2. **Upload Your Document** — Upload the document to be signed
3. **Decide Your Recipients** — Select who needs to sign
4. **Prepare Signatures** — Configure signature positions and fields
5. **Review and Send** — Final review and distribute for signing

## Notes for Website Content
- **NEW vs website**: Website has general digital signing benefits. Deck adds:
  - **SigningCloud** as the named platform — website doesn't name it
  - **Malaysia DSA 1997 and Brunei ETA (Cap. 196)** specific legal recognition — website says "meets ESIGN Act, eIDAS, regional standards" but not these specific acts
  - **MCMC-certified CA providers** — specific Malaysian regulatory body not on website
  - **SIRIM digital timestamping** — required for legal binding docs, not on website
  - **Internal vs external document comparison table** — clear differentiation not on website
  - **7 target use cases** (internal purchase, budget, NPD, corporate NDA, financing, consumer agreements) — not on website
  - **CA-agnostic** positioning — not on website
- Website already has: tamper-proof, audit trail, mobile-first, same-day closing, multi-party signing

## Visual Context
<!-- PDF 52: SigningCloud logo (blue cloud with S) center-left. Three mobile phone mockups on right showing: Universal Signing Platform (CA provider selection screen), Tamper-Proof (locked document), Transparent & Traceable (document history audit trail). Legal recognition text at bottom -->
<!-- PDF 53: Comparison table with blue/orange headers. 5 rows comparing internal vs external/legal document signing requirements -->
<!-- PDF 54: Top section shows 7 use case cards in two rows — 3 blue (internal) and 4 orange (external/legal). Arrow indicates increasing legal requirements. Bottom shows 5-step process flow with icons -->
