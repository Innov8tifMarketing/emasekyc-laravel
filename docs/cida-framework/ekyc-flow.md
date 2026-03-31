---
title: "EMAS eKYC End-to-End Flow"
source_slides: [10, 11]
pdf_pages: [9, 10]
website_mapping:
  - page: "solutions/emas-cida"
    relevance: "primary"
  - page: "solutions/developers"
    relevance: "supporting"
  - page: "features/identity-verification/index"
    relevance: "supporting"
cida_pillar: "Identity Proofing"
internal_product: "EMAS eKYC"
last_extracted: "2026-03-31"
---

# EMAS eKYC End-to-End Flow

## Verification Pipeline

The EMAS eKYC flow processes identity verification through 5 sequential stages:

```
Customer On-boarding Channels → OkayID → OkayLive → OkayFace → OkayDoc → Scorecard
         ↑                                                                    |
         |                          EMAS HIP Portal                           |
         ←————————————————— Return IDV Results ———————————————————————————————←
```

### Stage 1: OkayID — ID Capture
- OCR (optical character recognition)
- NFC (chip reader)
- Captures identity document data

### Stage 2: OkayLive — Live Face Detection
- Ensures the person in front of camera is live
- Anti-spoofing check

### Stage 3: OkayFace — Facial Verification
- 1:1 comparison between live face photo and ID photo
- Confirms the person matches the document

### Stage 4: OkayDoc — Document Verification
- Authenticates the ID document itself
- Layout, quality, tampering, screen, and security feature checks

### Stage 5: Scorecard — Overall IDV Result
- Aggregates all check results
- Returns Clear / Cautious / Suspicious outcome

### Backend: EMAS HIP Portal
- Returns IDV (ID verification) results to the customer's on-boarding channel
- Enterprise admin interface for monitoring and management

## Customer On-boarding Channels
- Mobile apps (iOS, Android)
- Web applications
- Desktop applications
- Multiple device types supported

## Visual Context
<!-- PDF 9: Left side shows devices (phone, tablet, laptop) as "Customer On-boarding Channels". Arrow labeled "Initiate IDV" points right to 5 sequential processing stages shown as icons: OkayID (document scan), OkayLive (face outline), OkayFace (face mesh), OkayDoc (document check), Scorecard (checklist). Bottom shows EMAS HIP Portal server returning results back to channels -->
<!-- PDF 10: Similar flow but with more detail on the channel types and OkayID specifics -->
