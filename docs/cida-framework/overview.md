---
title: "CIDA Framework Overview"
source_slides: [3, 4, 8]
pdf_pages: [3, 4, 7]
website_mapping:
  - page: "solutions/emas-cida"
    relevance: "primary"
  - page: "features/index"
    relevance: "supporting"
cida_pillar: null
internal_product: "EMAS CIDA"
last_extracted: "2026-03-31"
---

# CIDA Framework Overview

## What is Customer Identity Assurance (CIDA)?

CIDA is Innov8tif's umbrella framework for end-to-end identity verification. It comprises three pillars:

### 1. Identity Proofing
- Verify who someone claims to be
- Components: ID capture (OCR/NFC), liveness detection, facial matching, document authentication
- Delivered via EMAS eKYC platform

### 2. Customer Due Diligence
- Screen and assess risk post-identity-proofing
- Components: AML/CFT checks, credit scoring, company profiles, income proofing, biometric alert lists

### 3. Authentication & Authorization
- Ongoing identity assurance after onboarding
- Components: Device binding (MFA), digital signatures (SigningCloud)

## EMAS eKYC

EMAS eKYC is the digital ID verification (IDV) technology that powers the Identity Proofing pillar. It supports the e-KYC process and identity fraud management.

## CIDA Reference Implementation Framework

The CIDA framework is a 4-layer reference architecture that enterprises can adopt and customize. It is not a single monolithic product but a composable ecosystem — enterprises select the components they need.

### Layer 1: Portal Access Layer (top)
- Web-based portal for enterprise admins and operators

### Layer 2: Channel Layer
- **Process Automation** — automated workflows
- **Robotic Process Automation (RPA)** — integration with RPA tools
- **API** — direct API integration for developers

### Layer 3: Features Layer (the 3 CIDA pillars)

| Identity Proofing | Customer Due Diligence | Auth & Authorisation |
|---|---|---|
| EMAS eKYC (ID Evidence Collection) | Financial Risk Checks (AML/CFT/Credit) | Device Binding |
| Digital Footprint Analysis | Income / Address Proofing | Biometric Authorisation |
| Video Call Verification | Biometric Alert List | Device Risk Screening |
| | | Digital Signing |

> **Note**: In the CIDA reference architecture, Digital Footprint Analysis and Video Call Verification are classified under Identity Proofing (not CDD). However, on the website they are grouped under User Screening / Additional Verification for SEO purposes.

> **Note**: Device Risk Screening is listed as a component but its detail slides (53-54) are hidden in the current deck version. It covers device ID fingerprinting, anomaly detection (emulators, replay attacks, bot attacks, group control), and client environment analysis.

### Layer 4: Data Layer (bottom)
- Underlying data storage and processing infrastructure

## Notes for Website Content
- **EMAS CIDA page is explicitly "under construction"** with minimal content — this doc should be the primary source for rebuilding that page
- **NEW vs website**: The 4-layer architecture (Portal → Channel → Features → Data) is NOT on the website at all
  - Channel Layer options (Process Automation, RPA, API) show deployment flexibility — not communicated on website
  - The component mapping table showing exactly what sits under each pillar — website only has brief descriptions
  - "Device Risk Screening" as a named Auth & Authorization component — not on website
- Website already has: basic CIDA concept, component list, "single API call" claim, "20+ security checks"

## Visual Context
<!-- PDF 3: Diamond-shaped diagram with "CUSTOMER IDENTITY ASSURANCE" at center. Three branches: "Identity Proofing" (top, with face scan and phone icons), "Customer Due Diligence" (left, with magnifying glass icon), "Authentication & Authorization" (right, with fingerprint and security icons). ASEAN map in background -->
<!-- PDF 4: Left side shows woman's face with biometric scanning overlay and technology icons (laptop, phone, fingerprint, face scan). Right side has EMAS eKYC logo with definition text -->
<!-- PDF 7: 4-layer stacked architecture diagram. Top: Portal Access Layer. Second: Channel Layer with 3 boxes (Process Automation, RPA, API). Third: Features Layer with 3 dashed-border columns for the 3 CIDA pillars, each containing component boxes. Bottom: Data Layer. All layers are nested within a golden border -->
