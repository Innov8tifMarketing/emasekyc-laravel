---
title: "eKYC Gateway"
source_slides: [30, 31, 32]
pdf_pages: [29, 30, 31]
website_mapping:
  - page: "solutions/emas-cida"
    relevance: "supporting"
  - page: "solutions/sme-corporations"
    relevance: "supporting"
cida_pillar: "Identity Proofing"
internal_product: "eKYC Gateway"
last_extracted: "2026-03-31"
---

# eKYC Gateway

## Overview
eKYC Gateway is a **ready-to-use off-the-shelf** eKYC onboarding platform that can be implemented swiftly. Unlike the API-based EMAS eKYC (which requires custom integration), the Gateway provides a complete user interface out of the box.

## Key Features
- **User Interface** is an intuitive and user-friendly touch point for onboarding users
- Completed with **ID OCR, ID authentication, facial liveness and facial verification** features
- **Backend portal** access for organization's administration operations

## User Interface Flow (7 steps)

```
START → [1] Welcome screen (name, ID number pre-filled)
      → [2] Instructions (hold phone straight, good lighting)
      → [3] ID Capture (front & back of NRC/MyKad)
      → [4] OCR Result Preview (document number, full name)
      → [5] Selfie Video Instructions (2-4 seconds, no movement)
      → [6] Selfie Capture (facial liveness & verification)
      → COMPLETE (identity verified)
```

### Step Details
1. **Welcome**: Displays user name and ID number, consent to terms
2. **Instructions**: Camera guidance — hold phone straight, ensure all 4 corners visible, good lighting
3. **ID Capture**: Front & back of identity document (NRC/MyKad). Shows camera viewfinder with alignment guide
4. **OCR Preview**: Extracted data displayed (Document Number, Full Name) with "Best Output" label
5. **Video Instructions**: Record 2-4 second selfie video — enable device sound, slowly nod to clearly show front face, no face mask, no headwear, good lighting
6. **Selfie Capture**: Live face capture for liveness and verification
7. **Complete**: "Your identity has been verified" confirmation with journey ID

## Backend Portal

A reporting platform with:
- **Permission controls**, user management, and auditing processes
- **QR code generation** for facilitating eKYC onboarding journey
- **Comprehensive eKYC journey reporting** with export functionality
- **Audit report** functionality with FAR and FRR calculation
- Auxiliary features such as **Manual Verification**

### Portal Functions (4 areas)
1. **Admin Interface** — permission controls, user management
2. **Reporting** — journey reports, export
3. **Manual Verification** — review flagged cases
4. **QR Generation** — generate QR codes to initiate onboarding

## Visual Context
<!-- PDF 29: Left shows desktop + mobile mockup of eKYC Gateway portal and mobile UI (shows "MOHD SPECIMEN BIN ABDULLAH" welcome screen). Right side has description text. Bottom right shows woman using phone -->
<!-- PDF 30: Timeline-style flow showing 7 mobile phone screens from START to COMPLETE. Top row: Welcome → Instructions → ID Capture (front/back) → OCR Result Preview. Bottom row: Video recording instructions → Selfie capture → COMPLETE. Yellow arrow connects the flow. Labels indicate "ID OCR & Authentication" for top row and "Facial Liveness & Verification" for bottom row -->
<!-- PDF 31: Backend portal diagram. Left shows circular wheel with 4 functions (Admin Interface, Reporting, Manual Verification, QR Generation) around "eKYC Gateway Portal" center. Behind it, a blurred screenshot of the admin dashboard. Right side has bullet points -->
