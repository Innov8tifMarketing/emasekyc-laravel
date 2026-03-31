---
title: "Source Information"
last_extracted: "2026-03-31"
---

# Source Information

This SSOT is compiled from two primary sources. In case of conflict, the PPTX deck (Source 1) takes priority as the more up-to-date reference.

---

## Source 1: PPTX Sales Deck (Primary)
- **File**: `Innov8tif_EMAS CIDA Tech Intro_20260326_v4.0.pptx`
- **Version**: 4.0
- **Date**: 2026-03-26
- **Author**: Law Tien Soon
- **Confidentiality**: Restricted — contains information not published to public domain

## Extraction Details
- **Extraction date**: 2026-03-31
- **Method**: LibreOffice PDF conversion + Claude visual PDF reading
- **PDF pages**: 63 (from 66 PPTX slides minus 3 hidden)
- **Content pages extracted**: 55 (8 section divider pages skipped)
- **Total doc files**: 35 content files + 3 index/meta files

## Hidden Slides (Excluded)
These slides have `show='0'` in the PPTX XML and are excluded from the PDF and all doc files:

| PPTX Slide | Content | Reason |
|---|---|---|
| 7 | "Processed more than 10M ID Verifications" | Hidden in presentation |
| 53 | Device ID — robust, unique, persistent device identifier | Hidden in presentation |
| 54 | TrustDevice — client environment, device anomalies, bot detection | Hidden in presentation |

## Useful Content from Hidden Slides
While excluded from docs, these hidden slides contain potentially useful information:
- **Slide 7**: "Processed more than **10M ID Verifications**" — key volume stat for marketing
- **Slides 53-54**: Device Risk Screening detail — Device ID fingerprinting (brand, type, IP, OS, installed apps, sensor/scroll data), client environment analysis, anomaly detection (new devices, emulators, replay attacks, group control, bot attacks)

## Slide-to-PDF Page Mapping
- Slides 1–6 → PDF pages 1–6
- Slide 7 → HIDDEN
- Slides 8–52 → PDF pages 7–49
- Slides 53–54 → HIDDEN
- Slides 55–66 → PDF pages 50–63

## Section Divider Pages (Skipped)
These PDF pages are title-only section dividers with no extractable content:
- PDF 6 (slide 6): "Identity Proofing in CIDA — EMAS eKYC"
- PDF 8 (slide 9): "Identity Proofing in CIDA — EMAS eKYC"
- PDF 28 (slide 29): "Identity Proofing in CIDA — eKYC Gateway"
- PDF 32 (slide 33): "OkayLive Plus & OkayFace Search"
- PDF 39 (slide 40): "Optional Enhancements"
- PDF 43 (slide 44): "Customer Due Diligence in CIDA"
- PDF 49 (slide 50): "Authentication & Authorization in CIDA"
- PDF 55 (slide 58): "Use Cases"

---

## Source 2: Notion Wiki (Supplementary)

- **URL**: https://innov8tif.notion.site/Innov8tif-Wikipage-2b5873a631304c90900c43eccabb96e1
- **Root page ID**: `2b5873a6-3130-4c90-900c-43eccabb96e1`
- **Access**: Public (read-only)
- **API method**: `loadPageChunk` endpoint at `innov8tif.notion.site/api/v3/loadPageChunk`
- **Last synced**: 2026-03-31

### Notion Content Overview
The wiki contains ~39 pages organized as:
- **Product module pages**: OkayID, OkayDoc, OkayLive, OkayFace, OkayDB, Portal Access Layer, Video Call Verification, Digital Footprint Analysis, Financial Risk Checks, Income/Address Proofing, Biometric Alert List, Device Risk Screening, Device Binding, Biometric Authentication
- **Educational/conceptual pages**: "What is eKYC?", "What is EMAS CIDA?", "Shortcomings of Traditional KYC", "How Innov8tif Authenticates Users?"
- **Technology deep-dives**: Facial recognition (4 pages), liveness detection (3 pages), device fingerprinting (4 pages), document authentication (2 pages), anti-spoofing measures
- **Other**: Joget integration, ID capture best practices, glossary, content downloads

### Notion Extraction Details
- **Extraction date**: 2026-03-31
- **Method**: Notion `loadPageChunk` API → Python block parser → Markdown conversion
- **Total pages extracted**: 39
- **Images downloaded**: See `media/README.md` for full inventory
- **Content files created**: ~25 new files in `concepts/`, `integrations/`, `downloads/`
- **Existing files enriched**: 12 product docs received `## Additional Context (Notion)` sections

### Merge Rules Applied
1. Deck content is canonical — never overwritten by Notion content
2. Notion-unique information appended as `## Additional Context (Notion)` section
3. Direct conflicts resolved in favor of deck
4. All Notion-sourced content tagged with `primary_source: notion` or `primary_source: merged` in frontmatter
