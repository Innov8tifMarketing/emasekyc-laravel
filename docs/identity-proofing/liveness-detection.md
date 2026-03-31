---
title: "Liveness Detection"
source_slides: [16]
pdf_pages: [15]
website_mapping:
  - page: "features/identity-verification/liveness-detection"
    relevance: "primary"
cida_pillar: "Identity Proofing"
internal_product: "OkayLive"
last_extracted: "2026-03-31"
notion_url: "https://innov8tif.notion.site/4f384f2496144844be1ba8970d992c60"
notion_page_id: "4f384f24-9614-4844-be1b-a8970d992c60"
content_type: "product"
primary_source: "merged"
last_notion_sync: "2026-03-31"
related_docs:
  - "concepts/liveness-detection/what-is-liveness-detection.md"
  - "concepts/liveness-detection/how-does-it-work.md"
  - "concepts/liveness-detection/types-of-liveness-detection.md"
  - "concepts/anti-spoofing-measures.md"
---

# Liveness Detection (OkayLive)

## Key Facts
- **Face liveness detection** to ensure the subject in front of camera is a live person
- **Silent / Passive** based — liveness is detected from a **single still shot photo capture** (no head-turning or blinking required)
- Built on **CNN (convolutional neural network)**
- **iBeta Tested** — Liveness Detection **Level 1 and 2 ISO 30107-3 Compliance**

## Spoofing Attacks Prevented
- Face displayed from a **screen**
- Face presented as **printed photo**
- **Animated face/talking head (deepfake)** created from software
- **Full/half printed mask**

## How It Works
1. User takes a single selfie photo via front-facing camera
2. OkayLive analyzes the photo using CNN
3. System determines if the face is from a live person or a spoofing attempt
4. Returns pass/fail result

## Key Differentiator
The passive/silent approach requires **no user interaction** beyond taking a photo — no head turning, blinking, or smiling. This improves user experience and completion rates compared to active liveness solutions.

## Notes for Website Content
- **NEW vs website**: Website mentions passive detection and spoofing types but does NOT mention:
  - **iBeta Tested Level 1 and 2 ISO 30107-3 Compliance** — major certification, should be highlighted
  - **CNN (convolutional neural network)** — technical detail for developer-facing content
  - **Single still shot** method — website says "zero user actions" but doesn't specify the single-photo approach
- Website already has: passive/silent detection, spoofing types (screens, photos, masks), accessibility benefits

## Additional Context (Notion)

> *Source: Notion wiki — [OkayLive]*

#### What is OkayLive? 

OkayLive is EMAS eKYC's **Liveness Detection** module. It verifies if the user performing the selfie is a genuine human being.

#### How it Works

To use OkayLive, the user first captures a selfie using their mobile phone. OkayLive then uses A.I. algorithms to scan the image and authenticate the user's validity. If the user fails the authentication, OkayLive returns an error message detailing the cause of the failure.

OkayLive uses passive liveness detection, which means that users do not need to tilt or shake their heads to validate their identities. This increases the rate of user journey completion.

#### Successful Analysis ✅                               Unsuccesful Analysis ❌ 

![Image 1](media/identity-proofing/okaylive-img-7.webp)

![Image 1](media/identity-proofing/okaylive-img-8.webp)

#### Why it Matters

Fraudsters commonly use spoofing techniques to bypass many anti-fraud systems. A common example is using color-printed photos, tablets, or phone screens to impersonate another user. OkayLive prevents such spoofing attempts from occurring.

#### Features & Benefits 

- Passive liveness detection
- Improved user experience
- Feedback capabilities

---

*Read more:*

- [List of common liveness detection errors](https://api2-ekycapis.innov8tif.com/okaylive/okaylive-all/error-lists)
- [Common Spoofing Techniques](https://innov8tif.com/warning-dangers-of-spoofing-to-businesses-and-consumers/)
*Next page:*

-

## Visual Context
<!-- PDF 15: Four mobile phones in a 2x2 grid. Top-left shows a live person with green checkmark (pass). Top-right shows a photo held in front of camera with red X (fail). Bottom-left shows a screen replay with red X (fail). Bottom-right shows a printed photo with red X (fail). Right side has bullet points about capabilities and ISO compliance -->