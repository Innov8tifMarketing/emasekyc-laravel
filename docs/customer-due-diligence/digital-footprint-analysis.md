---
title: "Digital Footprint Analysis"
source_slides: [42]
pdf_pages: [41]
website_mapping:
  - page: "features/user-screening/digital-footprint-analysis"
    relevance: "primary"
cida_pillar: "Customer Due Diligence"
internal_product: "OkayDB DFA"
last_extracted: "2026-03-31"
notion_url: "https://innov8tif.notion.site/c63c08e93361470a898978bbfe552d08"
notion_page_id: "c63c08e9-3361-470a-8989-78bbfe552d08"
content_type: "product"
primary_source: "merged"
last_notion_sync: "2026-03-31"
related_docs:
  - "concepts/device-fingerprinting/what-is-device-fingerprinting.md"
---

# Digital Footprint Analysis (OkayDB DFA)

## Purpose
OkayDB Digital Footprint Analysis checks for a user's **online platform and social media activity** to assess identity legitimacy.

## Risk Checks
- Uses user's **email and mobile number** to analyze if it is connected to any online platform
- Provides an indication if user might be a **fraudulent identity** or performing fraudulent activity
- A legitimate person typically has presence across multiple online platforms; absence may indicate a fabricated identity

## Platforms Checked
Facebook, Google, Twitter, Microsoft, Apple, Spotify, Instagram, Tumblr, GitHub, etc.

## Notes for Website Content
- **NEW vs website**: Website has strong stats (85% synthetic fraud reduction, 60% lower acquisition costs). Deck adds:
  - **Specific platform list**: Facebook, Google, Twitter, Microsoft, Apple, Spotify, Instagram, Tumblr, GitHub — website doesn't list specific platforms checked
  - **Email AND mobile number** as the two input signals — website is less specific about inputs
- Website already has: synthetic identity detection, legitimacy scoring, continuous monitoring, multi-dimensional assessment

## Additional Context (Notion)

> *Source: Notion wiki — [Digital Footprint Analysis]*

![Image 1](media/customer-due-diligence/digital-footprint-analysis-img-6.png)

#### How it Works

![Image 2](media/customer-due-diligence/digital-footprint-analysis-img-7.png)

Digital Footprint Analysis (DFA) is a feature that cross-checks a user's online presence and activity to help businesses address synthetic identity fraud. DFA uses web APIs and scorecards to verify the presence of online accounts associated with the email and phone number.

DFA can vet social media sites and e-commerce platforms, including:

- Facebook
- Google
- LinkedIn
- Spotify
- Apple
- and more
For a full list of platforms, please contact us at [sales@innov8tif.com](mailto:sales@innov8tif.com).

#### Challenges with OTPs and Confirmation Emails

![Image 3](media/customer-due-diligence/digital-footprint-analysis-img-8.png)

Confirmation emails and one-time passwords (OTPs) only verify the **validity** of email addresses and phone numbers (i.e., whether they exist), but they do not verify their **legitimacy** (i.e., whether they are actively being used by genuine users).

This leaves companies vulnerable to synthetic identity theft, where fraudsters create false identities using a combination of real (stolen) and randomly generated data.

#### Use-case

DFA is an ideal solution for companies that:

- Have strict user onboarding requirements. The user's legitimacy score can contribute to the success of an account sign-up attempt.
- Run marketing campaigns that reward successful sign-up attempts with free trials or promotional gifts. DFA helps prevent reward abuse.
- Need to remind users to update their email addresses and phone numbers at regular intervals, such as insurance firms. Auto-reminders can be sent when there is a decline in the account's digital footprint, rather than being sent to the entire user base.

#### Limitations 

![Image 4](media/customer-due-diligence/digital-footprint-analysis-img-9.png)

Digital footprints are one of many data points used to determine user legitimacy, but they should not be the sole deciding factor.

- DFA may not apply to users with multiple personal email accounts and SIM cards. Such users have fragmented digital footprints that negatively affect their legitimacy score.
- Not all consumers are digitally savvy, nor do they have numerous online accounts. This is especially true for underserved communities in rural areas or older generations.
- Companies should not penalize genuine users for not having enough online presence. However, the lack of digital footprint can serve as supporting evidence when suspicious activities are detected throughout the customer's life cycle.

---

*Return:*

## Visual Context
<!-- PDF 41: Left side has description box with footprint icon. Right side shows a large footprint shape filled with social media logos (Facebook, Twitter, Instagram, WhatsApp, YouTube, Netflix, Spotify, Google, GitHub, etc.) representing the concept of a "digital footprint" -->