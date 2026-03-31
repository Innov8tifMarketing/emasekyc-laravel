# EMAS CIDA Product Documentation — Single Source of Truth

Consolidated from two sources:
1. **PPTX Sales Deck** — `Innov8tif_EMAS CIDA Tech Intro_20260326_v4.0.pptx` (primary, more up-to-date)
2. **Notion Wiki** — [innov8tif.notion.site](https://innov8tif.notion.site/Innov8tif-Wikipage-2b5873a631304c90900c43eccabb96e1) (supplementary context)

> **CONFIDENTIAL**: This content is derived from restricted sources. Do not publish verbatim.

## How to Use These Docs

**Progressive disclosure for token efficiency:**

1. Read this README for orientation
2. Check `website-mapping.md` to find which doc(s) are relevant to a specific website page
3. Read only the specific doc file(s) you need
4. Check `related_docs` in frontmatter for cross-references to educational context

Each doc file is self-contained with YAML frontmatter. Files with `primary_source: merged` contain both deck and Notion content.

## Product Name Mapping

Internal "Okay" branded names → SEO-friendly website page names:

| Internal Brand | Website Name | CIDA Pillar | Doc File |
|---|---|---|---|
| OkayID (OCR) | ID Data Extraction | Identity Proofing | `identity-proofing/id-data-extraction.md` |
| OkayID (NFC) | NFC Chip Reading | Identity Proofing | `identity-proofing/nfc-chip-reading.md` |
| OkayLive | Liveness Detection | Identity Proofing | `identity-proofing/liveness-detection.md` |
| OkayLive Plus | Deepfake Detection | Identity Proofing | `identity-proofing/deepfake-detection.md` |
| OkayFace | Facial Matching | Identity Proofing | `identity-proofing/facial-matching.md` |
| OkayFace Search | Face Recognition Search | Identity Proofing | `identity-proofing/face-recognition-search.md` |
| OkayDoc | Document Authentication / ID Verification | Identity Proofing | `identity-proofing/document-authentication.md` |
| OkayDB AML | AML/CFT Screening | Customer Due Diligence | `customer-due-diligence/aml-check.md` |
| OkayDB DFA | Digital Footprint Analysis | Customer Due Diligence | `customer-due-diligence/digital-footprint-analysis.md` |
| Intellidoc | Income & Address Proofing | Customer Due Diligence | `customer-due-diligence/income-address-proofing.md` |
| SigningCloud | Digital Signatures | Auth & Authorization | `auth-authorization/digital-signing.md` |
| Device Binding | Device Binding Intelligence | Auth & Authorization | `auth-authorization/device-binding.md` |
| TrustDevice | Device Risk Screening | Auth & Authorization | `auth-authorization/device-risk-screening.md` |
| HIP Portal | Admin Portal (no dedicated page) | Identity Proofing | `identity-proofing/hip-portal.md` |
| eKYC Gateway | eKYC Gateway (no dedicated page) | Identity Proofing | `identity-proofing/ekyc-gateway.md` |
| Scorecard | Decision Engine (part of CIDA flow) | Identity Proofing | `cida-framework/scorecard.md` |

## Directory Layout

```
docs/
├── README.md                          ← You are here
├── source-info.md                     # Source file metadata, extraction notes
├── website-mapping.md                 # Website page → doc file cross-reference
├── PROVENANCE.md                      # File-by-file source tracking matrix
├── zoho_landing_page_links.csv        # Landing page → PDF mapping (CSV)
│
├── company/                           # Company info, clients, contact details
│   ├── overview.md                    #   Innov8tif corporate overview
│   ├── clients.md                     #   Client portfolio by industry
│   └── contact.md                     #   Office locations & contacts
│
├── cida-framework/                    # CIDA architecture & orchestration
│   ├── overview.md                    #   3-pillar framework, 4-layer architecture
│   ├── ekyc-flow.md                   #   End-to-end eKYC pipeline
│   └── scorecard.md                   #   Decision engine (Clear/Cautious/Suspicious)
│
├── identity-proofing/                 # Identity Proofing pillar (11 files)
│   ├── id-data-extraction.md          #   OkayID — OCR, 12,000+ docs, 248 countries
│   ├── document-authentication.md     #   OkayDoc — 5 auth techniques, MyKad patents
│   ├── liveness-detection.md          #   OkayLive — passive CNN, iBeta ISO 30107-3
│   ├── deepfake-detection.md          #   OkayLive Plus — injection + presentation attacks
│   ├── facial-matching.md             #   OkayFace — NIST FRVT benchmarked
│   ├── face-recognition-search.md     #   OkayFace Search — private/shared DB
│   ├── nfc-chip-reading.md            #   NFC chip reading (Android/iOS)
│   ├── supported-ids.md               #   8 Malaysian + 8 ASEAN country ID types
│   ├── ekyc-gateway.md                #   7-step user flow + backend portal
│   ├── hip-portal.md                  #   Host Integration Platform
│   └── manual-verification.md         #   4-hour SLA manual review service
│
├── customer-due-diligence/            # Customer Due Diligence pillar (7 files)
│   ├── aml-check.md                   #   AML/CFT — 7 dataset types
│   ├── credit-scoring.md              #   BNM, Angkasa, MDI providers
│   ├── company-profile-search.md      #   SSM registry, UBO tracing
│   ├── income-address-proofing.md     #   Intellidoc — LHDN, KWSP sources
│   ├── digital-footprint-analysis.md  #   Social media presence analysis
│   ├── biometric-alert-list.md        #   Blacklist & duplication prevention
│   └── video-call-verification.md     #   WebRTC, on-behalf remote control
│
├── auth-authorization/                # Authentication & Authorization pillar (3 files)
│   ├── device-binding.md              #   SE/TEE key protection, 4-layer security
│   ├── digital-signing.md             #   SigningCloud — DSA 1997, MCMC-certified
│   └── device-risk-screening.md       #   TrustDevice — device fingerprint + anomaly
│
├── use-cases/                         # Industry use cases (7 files)
│   ├── banking-digital.md             #   UOB TMRW digital banking
│   ├── banking-branch.md              #   Alliance Bank mobile POS
│   ├── telco-self-service.md          #   CelcomDigi/Tune Talk 24/7
│   ├── telco-dealer.md                #   YTL Communications dealer SIM reg
│   ├── gaming.md                      #   Da Ma Cai/Magnum age/religion filter
│   ├── insurance.md                   #   Great Eastern cross-country
│   └── digital-transaction.md         #   SigningCloud + eKYC integration
│
├── concepts/                          # Educational/explainer content (from Notion)
│   ├── what-is-ekyc.md                #   eKYC definition, process, industries
│   ├── what-is-emas-cida.md           #   CIDA framework explained
│   ├── shortcomings-of-traditional-kyc.md
│   ├── how-innov8tif-authenticates-users.md
│   ├── id-capture-best-practices.md
│   ├── glossary.md                    #   Industry terminology
│   ├── liveness-detection-for-facial-recognition.md
│   ├── anti-spoofing-measures.md
│   ├── facial-recognition/            #   4 files: overview, pros/cons, how, accuracy
│   ├── liveness-detection/            #   3 files: what, how, types
│   ├── device-fingerprinting/         #   4 files: what, how, pros/cons, anti-fraud
│   └── document-authentication/       #   2 files: how, AI in
│
├── integrations/                      # Third-party integrations
│   └── joget.md                       #   Joget low-code platform integration
│
├── downloads/                         # Content downloads (PDFs via Git LFS)
│   ├── index.md                       #   Downloads catalog & landing page mapping
│   ├── brochures/                     #   Product brochures (EMAS eKYC, 1-sheet)
│   ├── use-cases/                     #   Industry use case PDFs (BNPL, insurance, hospitality, gaming)
│   ├── whitepapers/                   #   Whitepapers (telco, Cambodia banking, healthcare, ESG)
│   ├── reports/                       #   Corporate reports (ESG Disclosure 2024)
│   └── khmer/                         #   Khmer translations of key documents
│
└── media/                             # All graphics with .txt descriptors
    ├── README.md                      #   Media index + needs-extraction list
    ├── cida-framework/                #   CIDA + eKYC flow diagrams
    ├── identity-proofing/             #   ID capture best practices
    ├── concepts/                      #   Educational content images
    │   ├── facial-recognition/
    │   ├── liveness-detection/
    │   └── device-fingerprinting/
    ├── company/                       #   (corporate assets)
    └── use-cases/                     #   (industry diagrams)
```

## Frontmatter Schema

Every content file uses YAML frontmatter. Deck-only files have the base schema; merged/Notion files have extended fields:

```yaml
# Base fields (all files)
title: "Human-readable title"
source_slides: [16]              # PPTX slide numbers (deck-sourced files)
pdf_pages: [15]                  # PDF page numbers (deck-sourced files)
website_mapping:
  - page: "features/identity-verification/liveness-detection"
    relevance: "primary"         # or "supporting"
cida_pillar: "Identity Proofing" # or "Customer Due Diligence" or "Auth & Authorization"
internal_product: "OkayLive"     # Internal brand name
last_extracted: "2026-03-31"

# Extended fields (merged/Notion files)
notion_url: "https://innov8tif.notion.site/..."
notion_page_id: "abc123-..."
content_type: "product"          # product | concept | use-case | integration | reference
primary_source: "merged"         # deck | notion | merged
last_notion_sync: "2026-03-31"
related_docs:                    # Cross-references to concept/product counterparts
  - "concepts/liveness-detection/what-is-liveness-detection.md"
media:                           # Images used in this doc
  - "media/identity-proofing/liveness-demo.png"
```

## Source Priority

When deck and Notion content overlap:
- **Deck content is canonical** — never overwritten
- **Notion content** appears in `## Additional Context (Notion)` sections
- See `source-info.md` for full extraction methodology
- See `PROVENANCE.md` for per-file source tracking

## Quick Start by Role

**Updating a website page?**
→ `website-mapping.md` → find the target doc → read it

**Understanding a product module?**
→ Product name mapping table above → read the doc + its `related_docs`

**Looking for a diagram?**
→ `media/README.md` → find the image + read its `.txt` descriptor

**Checking what's from where?**
→ `PROVENANCE.md` → per-file source matrix
