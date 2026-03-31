---
title: "Face Recognition Search"
source_slides: [39]
pdf_pages: [38]
website_mapping:
  - page: "features/user-screening/face-recognition-search"
    relevance: "primary"
cida_pillar: "Identity Proofing"
internal_product: "OkayFace Search"
last_extracted: "2026-03-31"
---

# Face Recognition Search (OkayFace Search)

## Purpose
OkayFace Search **identifies if a user's face is present in a database of registered blacklisted faces**. This is a 1:N face search (one face compared against many), unlike OkayFace which is 1:1 verification.

## Two Database Options

### 1. Private Database
- A **private database of blacklisted faces** that is collected, maintained, and used **entirely by your organisation only**
- Organisation has full control over who is in the blacklist

### 2. Shared Database
- A **shared database of blacklisted faces** that is collectively obtained from **all OkayFace Search subscribers** of this option
- This database is **maintained by Innov8tif**
- Broader coverage of known fraudsters across multiple organisations

## How It Works
1. User's face is captured during the eKYC process
2. Face is searched against the selected database(s)
3. If a match is found, the system flags the user
4. Prevents known fraudsters from re-registering under different identities

## Notes for Website Content
- **NEW vs website**: Website has strong stats (99.5% accuracy, millions of records, 90% duplicate fraud reduction). Deck adds:
  - **Two database options** (private vs shared) — not explained on website
  - **Shared database maintained by Innov8tif** across all subscribers — a differentiator not on website
- Website already has: face search concept, accuracy stats, fraud detection, ban evasion prevention

## Visual Context
<!-- PDF 38: Left side has description text. Right side shows a visual: "User's Face" on left (single face photo) being compared against "Database of Registered Blacklisted Faces" on right (grid of 6 face photos in circular frames). A red "Match" line connects the user's face to one matching face in the database -->
