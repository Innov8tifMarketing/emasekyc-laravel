---
title: "Facial Matching"
source_slides: [17, 18]
pdf_pages: [16, 17]
website_mapping:
  - page: "features/identity-verification/facial-matching"
    relevance: "primary"
cida_pillar: "Identity Proofing"
internal_product: "OkayFace"
last_extracted: "2026-03-31"
notion_url: "https://innov8tif.notion.site/f59de19a34f641e0bcdf18c214d38d2e"
notion_page_id: "f59de19a-34f6-41e0-bcdf-18c214d38d2e"
content_type: "product"
primary_source: "merged"
last_notion_sync: "2026-03-31"
related_docs:
  - "concepts/facial-recognition/overview.md"
  - "concepts/facial-recognition/how-does-it-work.md"
  - "concepts/facial-recognition/how-accurate.md"
---

# Facial Matching (OkayFace)

## Key Facts
- **1:1 face verification** technology — compares ID photo to live face photo
- **False match rate below 1-in-a-million** (0.000001)
- False non-match rate: **0.0026**
- Testing sample size: **>100,000**
- **High practical accuracy** when comparing faces with large age gap
  - False non-match rate: **0.0028** (age difference of >12 years)
- Proven to work in **multi-ethnic population** with variations in skin complexion and religious faith (e.g., wearing of headscarf)
- **NIST FRVT 1:1 Verification** tested

## Showcase Scenarios (Passing Score: >75)

| Scenario | Age Difference | Type | Result | Score |
|---|---|---|---|---|
| Male, significant aging | 20-30 years | Genuine | Match | 85.9 |
| Female with glasses | <10 years | Genuine | Match | 87.8 |
| Male look-alike (different person) | <10 years | Fraud | Not Match | 37.0 |
| Female, headscarf on-off & damaged ID photo | <10 years | Genuine | Match | 79.1 |

## How It Works
1. OkayID extracts the face photo from the ID document
2. User takes a live selfie photo
3. OkayFace compares the two face images using AI
4. Returns a similarity score (0-100)
5. Score above threshold (>75) = Match; below = Not Match

## Key Differentiators
- Works across ethnicities and with religious head coverings
- Handles significant age gaps (>12 years) between ID photo and live photo
- Correctly rejects look-alikes (fraud prevention)
- NIST FRVT benchmarked

## Notes for Website Content
- **NEW vs website**: Website says "99.50% accuracy" and "0.000001 false match rate" — deck confirms FMR 0.000001 but adds:
  - **FNMR 0.0026** — false non-match rate not on website
  - **Testing sample size >100,000** — not on website
  - **Age gap performance**: FNMR 0.0028 for >12 year age difference — not on website
  - **NIST FRVT 1:1 Verification tested** — major benchmark, NOT on website currently
  - **Showcase scenarios table** with real score examples (85.9, 87.8, 37.0, 79.1) — not on website
  - **Multi-ethnic + headscarf** explicit mention — website mentions "prevents false rejections" but not the specific ethnic/religious diversity claim
- Website already has: FMR stat, real-time processing, fraud detection claims

## Additional Context (Notion)

> *Source: Notion wiki — [OkayFace]*

#### What is OkayFace?

OkayFace is EMAS eKYC's **Face Matching** module. It ensures that the user who performs the selfie is the correct owner of the ID Document.

#### How it Works

Most government ID documents contain the profile photo of the designated user. After the user performs a facial and ID capture, OkayFace compares the facial data from these two sources using A.I. algorithms. It then returns a confidence score of the matching likelihood.

![Image 1](media/identity-proofing/okayface-img-9.png)

#### Why Does it Matter

Other EMAS eKYC modules aim to verify the user's **validity** (that they are not A.I. generated, tampered, or faked). However, OkayFace is important in determining the **legitimacy** of the user (that they are who they say they are).

For example, a fraudster could steal another user's ID document and perform an onboarding journey. Because the stolen ID document is genuine, and the fraudster can perform a normal selfie, they would pass all other module checks. However, the fraudster would fail the OkayFace check because the facial data from both sources are not the same.

#### Features & Benefits

- Recorded accuracy of 99.50% or higher
- Powered by algorithms that satisfy 0.000001 false match rate
- Real-time Facial Sighting
- Substitute for Password
- Multi-factor Authentication

---

*Read more:*

- [Common Spoofing Techniques](https://innov8tif.com/warning-dangers-of-spoofing-to-businesses-and-consumers/)

## Visual Context
<!-- PDF 16: Left side shows mobile phone with face mesh overlay and "Face Match" green label. Right side has bullet points with accuracy stats -->
<!-- PDF 17: Table with 4 rows showing real face comparison scenarios. Each row has ID photo vs selfie pair, age difference, scenario type (genuine/fraud), and matching result with score. Shows multi-ethnic examples including headscarf scenario -->