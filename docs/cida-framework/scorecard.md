---
title: "Scorecard (Decision Engine)"
source_slides: [23]
pdf_pages: [22]
website_mapping:
  - page: "solutions/emas-cida"
    relevance: "primary"
  - page: "features/identity-verification/index"
    relevance: "supporting"
cida_pillar: "Identity Proofing"
internal_product: "Scorecard"
last_extracted: "2026-03-31"
---

# Scorecard (Decision Engine)

## Purpose
At the end of the ID verification process, a scorecard approach determines the overall IDV result. The scorecard aggregates results from OkayID, OkayDoc, OkayFace, and OkayLive.

## Three Possible Outcomes

### Clear (Green)
- User satisfies pre-defined rules
- User can be **automatically onboarded**
- No manual intervention needed

### Cautious (Yellow/Amber)
- User satisfies all critical checks but does **not fully satisfy all secondary checks**
- Typically caused by **poor image/document quality**
- Requires **further verification process** to determine eligibility of user to be onboarded
- Routes to manual verification queue

### Suspicious (Red)
- User **fails to satisfy pre-defined rules**
- User should be **declined onboarding**
- Potential fraud attempt

## How It Works
The scorecard evaluates all component results (OkayID → OkayDoc → OkayFace → OkayLive) and applies configurable business rules to produce one of three outcomes. The rules are customizable per client/market.

## Visual Context
<!-- PDF 22: Left side has three horizontal bands — green "Clear", yellow "Cautious", red "Suspicious" — each with bullet point descriptions. Right side shows a flow diagram with OkayID, OkayDoc, OkayFace, OkayLive icons connected by dashed lines flowing into a Scorecard icon at the bottom -->
