# Content Accuracy Report: Zoho Landing Pages vs. Seeded Block Content

**Date:** 2026-04-01
**Scope:** 30 landing pages in `LandingPageSeeder.php` compared against original Zoho landing pages and blade templates
**Methodology:** Zoho pages fetched via HTTP where accessible; blade templates used as secondary reference; seeder block content analysed in full

---

## Executive Summary

The seeder contains **30 landing pages** (27 published, 3 draft placeholders). After comparing against the original Zoho pages and existing blade files, the following systemic issues were identified:

1. **Major content omissions across all country pages**: The Zoho originals contain rich customer case studies (UOB, Tune Talk, Astro, Maxis, Celcom, Fundaztic, 4Gives, etc.), a detailed product description paragraph, a 6-step "How It Works" visual process, resources/wiki links, a "Tested And Compliant To Your Country Standard" cross-linking section, and a PDF download banner. None of these are present in the seeder or blade files.

2. **Statistics replaced with vague placeholders**: The Government Malaysia page's Zoho original has exact figures (319 identity theft cases, MYR 54.02 billion in losses, 55,000 online fraud reports). The seeder/blade uses vague words ("Increasing", "Billions", "Thousands").

3. **Insurance Industry page is structurally different**: The Zoho original is ESG-focused with downloadable whitepapers, a key statistic ("Over 47% Companies Struggle With Identity Theft", "$2.09 billion by 2030"), blog article links, and detailed EMAS CIDA solution descriptions. The seeder version is a generic challenges/solutions page.

4. **BNPL page missing fraud types and client logos**: The Zoho original details 4 specific fraud types (Account Takeover, Buy Now-Pay Never, Synthetic Identity, New Account Abuse) and lists client logos (Versa, Compasia, PAYLATER, Affin Hwang Capital). The seeder has none of this.

5. **Blade files and seeder are consistent with each other** -- both contain the same simplified content. The gap is between the Zoho originals and both the blade + seeder versions.

6. **"Why Innov8tif" sections are simplified**: Zoho originals mention specific details like "microprint, hologram, tampering detection", "ekycondemand.com" API platform, and "serving most major Telco operators". The seeder versions use generic rewrites.

---

## Per-Page Comparison Table

| # | Page | Slug | Zoho Status | Status | Severity |
|---|------|------|-------------|--------|----------|
| 1 | eKYC Malaysia | `ekyc-malaysia` | Live | Issues | **Critical** |
| 2 | eKYC Singapore | `ekyc-singapore` | Live | Issues | **Critical** |
| 3 | eKYC Philippines | `ekyc-philippines` | Live | Issues | **Critical** |
| 4 | eKYC Vietnam | `ekyc-vietnam` | Live | Issues | High |
| 5 | eKYC Myanmar | `ekyc-myanmar` | Live | Issues | High |
| 6 | eKYC Indonesia | `ekyc-indonesia` | Live | Issues | High |
| 7 | eKYC Cambodia | `ekyc-cambodia` | Live | Issues | High |
| 8 | eKYC Brunei | `ekyc-brunei` | Live | Issues | High |
| 9 | eKYC Hong Kong | `ekyc-hong-kong` | Live | Issues | High |
| 10 | eKYC Kenya | `ekyc-kenya` | Live | Issues | High |
| 11 | eKYC Components Indonesia | `ekyc-components-for-indonesia` | Live | Issues | Medium |
| 12 | Insurance Industry (General) | `ekyc-for-insurance-industry` | Live | Issues | **Critical** |
| 13 | Insurance Malaysia | `ekyc-for-insurance-industry-in-malaysia` | Live | Issues | **Critical** |
| 14 | Insurance Indonesia | `ekyc-for-insurance-industry-in-indonesia` | Live | Issues | High |
| 15 | Insurance Thailand | `ekyc-for-insurance-industry-in-thailand` | Live | Issues | High |
| 16 | Insurance Cambodia | `ekyc-for-insurance-industry-in-cambodia` | Live | Issues | High |
| 17 | Insurance Philippines | `ekyc-for-insurance-industry-in-the-phillipines` | Live | Issues | High |
| 18 | Credit Financing | `ekyc-for-credit-financing-industry` | Live | Issues | High |
| 19 | eHealthcare | `ekyc-for-ehealthcare-industry` | Live | Issues | **Critical** |
| 20 | Hospitality | `id-assurance-for-hospitality-industry` | Live | Issues | Medium |
| 21 | Government Malaysia | `secure-digital-identity-for-government-services-in-malaysia` | Live | Issues | **Critical** |
| 22 | Fraud Report | `innov8tif-fraud-report` | Live | OK | Low |
| 23 | Joget Low Code | `joget-low-code-development` | Live | OK | Low |
| 24 | Philippines Telco Whitepaper | `philippines-telco-whitepaper` | Live | OK | Low |
| 25 | BNPL Use Case | `bnpl-use-case-document` | Live | Issues | **Critical** |
| 26 | Cambodia Banking Whitepaper | `cambodia-banking-whitepaper` | Live | OK | Low |
| 27 | API OnDemand | `emas-ekyc-api-ondemand` | N/A | OK | Low |
| 28 | Gaming & Gambling (draft) | `gaming-gambling-use-case` | Pending | OK | N/A |
| 29 | ESG Insurers (draft) | `esg-insurers-asean` | Pending | OK | N/A |
| 30 | General Telco (draft) | `general-telco-ekyc` | Pending | OK | N/A |

---

## Detailed Findings

### CRITICAL: Country Landing Pages (Malaysia, Singapore, Philippines, + all others)

**Applies to pages 1-10.** All country pages share the same structural gaps.

#### Missing Content (vs. Zoho originals)

1. **Product description paragraph** -- Zoho has: "EMAS eKYC is an integrated digital ID verification technology that streamlines e-KYC customer onboarding journey for your digital customer touch points. We are here to help you mitigate identity forgery risks by securely validating customer's identity documents and facial biometrics securely." This introductory copy is absent from all seeded pages.

2. **PDF download banner** -- Zoho pages have a prominent "Download Our Free PDF Brochure Today!" / "Get Our FREE Whitepaper Now!" banner at the top. Not present in seeder.

3. **6-step "How It Works" visual process** -- Zoho originals show a detailed 6-step visual process with images (capture, verification, matching, etc.). The seeder reduces this to 3 text-only cards.

4. **Customer case studies** -- This is the largest content gap:
   - **Malaysia**: UOB Mighty (banking, 2-minute onboarding), Tune Talk (telco, MVNO), Astro (broadcasting, billing), Maxis (telco), myIOU/IOUpay (BNPL/digital banking), Celcom (telco) -- each with detailed descriptions
   - **Singapore**: Fundaztic SG (financing, CMS license from MAS) -- with description
   - **Philippines**: 4Gives (BNPL provider) -- with description
   - All other country pages likely have similar case studies

5. **Resources section** -- Zoho pages have "Wikipage" and "PDF Downloads" resource cards with links to Notion wiki and content downloads. Not present in seeder.

6. **"Tested And Compliant To Your Country Standard" cross-linking section** -- Zoho pages link to all other country pages with flag icons (Indonesia, Cambodia, Singapore, Brunei, Philippines, Thailand, Vietnam, Myanmar). Not present in seeder.

7. **Feature cards content differs** -- Zoho Malaysia has "NRIC Checks" (with "Millions of ID Verification Checks Completed"), "Regulations" (with "Implemented for Businesses Regulated by Bank Negara Malaysia, Securities Commission and MCMC"), and "Fast Verification" (with "Can Be Completed LESS THAN 1 Minute!"). The seeder rewrites these as generic "Capture ID Document", "Facial Biometric Verification", "Instant Verification" -- different focus entirely.

8. **"Why Innov8tif" details simplified** -- Zoho mentions specific capabilities: "microprint, hologram, tampering detection", "API purchase platform at ekycondemand.com", "serving most major Telco operators in the ASEAN region". Seeder uses generic rewrites that lose these selling points.

#### Section Ordering Differences (Malaysia specifically)

| Order | Zoho Original | Seeder/Blade |
|-------|--------------|--------------|
| 1 | Hero + PDF download banner | Hero (no banner) |
| 2 | Product description paragraph | How It Works (3 cards) |
| 3 | 3 feature cards (NRIC/Regulations/Fast) | Industries We Serve |
| 4 | Product tagline | Why Innov8tif |
| 5 | Documents That We Verify | Documents That We Verify |
| 6 | How It Works (6-step visual) | CTA |
| 7 | Industries + Customer Case Studies | -- |
| 8 | Resources (Wiki + PDF) | -- |
| 9 | Why Innov8tif (detailed) | -- |
| 10 | Contact Form | -- |
| 11 | Country Cross-links | -- |

### CRITICAL: Insurance Industry (General) -- Page 12

**Zoho original is ESG-focused and significantly different from seeder.**

#### Missing Content

1. **ESG framing** -- Zoho heading is "INSURERS IN ASEAN: The Role of Digital ID Verification" with ESG context: "Climate change efforts have traditionally taken centre stage amidst ESG conversations..." The seeder uses generic "eKYC for the Insurance Industry".

2. **Three core features** -- Zoho lists "Digital Signatures", "e-KYC", "Process Automation" with descriptions. Seeder has "Identity Fraud", "Slow Onboarding", "Regulatory Compliance" challenges instead.

3. **EMAS CIDA solution section** -- Zoho describes the full CIDA solution with 10+ capabilities (DFA, video verification, financial risk checks, income address proofing, biometric blacklisting, device blacklisting, device binding, biometric authentication). Absent from seeder.

4. **Downloadable resources** -- Zoho offers two specific downloads: ESG whitepaper and Insurance Industry use case document. Seeder has none.

5. **Key statistic** -- "Over 47% Companies Struggle With Identity Theft" and "global identity theft insurance market is expected to garner US$2.09 billion by 2030" (Allied Market Research). Absent from seeder.

6. **Blog article links** -- Three featured articles about Indonesian insurance fraud, Philippines insurance access, and ESG for ASEAN insurers. Absent from seeder.

### CRITICAL: Insurance Malaysia -- Page 13

**Zoho original is substantially richer than seeder.**

#### Missing Content

1. **CCO quote** -- Joe Seah quote about insurance scams and lack of robust identity verification. Absent from seeder.

2. **"Rise of Insurance Fraud" section** -- Three detailed subsections:
   - Public Attitude: "62% of Malaysians surveyed expressed a willingness to commit some form of fraud"
   - Organized Crime: 2024 Johor police case about staged murder for insurance payout
   - Effects of Digitalisation: Remote onboarding exploitation risks

3. **Benefits section** -- Four benefit cards: "Paperless and Cost-Effective", "Faster and More Convenient", "Biometric-Powered Verification", "Scalable and Much More Versatile". Seeder has a different set of checklist items.

4. **Detailed "Benefits of eKYC During Onboarding" section** -- Three detailed items: Remote Onboarding, Anywhere and Anytime, Fraud-Free and Secure -- each with full descriptions. Not in seeder.

5. **About EMAS eKYC section** -- Company description paragraph mentioning "public and private sectors across ASEAN" and listing industry verticals. Not in seeder.

6. **Cross-links to other country insurance pages** -- Cambodia, Indonesia, Thailand, Philippines download links. Seeder has no equivalent.

### CRITICAL: eHealthcare -- Page 19

**Zoho original has different structure and content.**

#### Missing Content

1. **Zoho heading is different** -- "Leveraging eKYC For e-Healthcare" vs seeder's "eKYC for the eHealthcare Industry"

2. **Zoho subheading** -- "Streamlining the e-healthcare services through identity verification solutions swiftly." vs seeder's "Secure patient identity verification for telemedicine, digital health platforms, and healthcare providers across ASEAN."

3. **eKYC Benefits section** -- Zoho has three specific benefit cards: "Electronic Patient Data Management", "Remote/Online Consultation", "Secure Medication Deliveries". Seeder replaces these with different "Challenges" cards.

4. **Zoho page is much simpler** -- Ironically, the seeder version has MORE content than the Zoho original (which is quite sparse). The seeder added "Use Cases" and detailed "How EMAS eKYC Helps Healthcare" sections not present on Zoho. This is an improvement but a content accuracy deviation.

### CRITICAL: Government Malaysia -- Page 21

#### Missing/Inaccurate Content

1. **Statistics are vague** -- Zoho has exact numbers:
   - **319** identity theft cases (early 2021)
   - **MYR 54.02 billion** in losses
   - **55,000** online fraud reports (over 6-month period)

   Seeder/blade uses: "Increasing", "Billions", "Thousands". This significantly weakens the impact and loses the data credibility.

2. **Opening quote missing** -- Zoho has: "As Malaysia prepares to launch digital initiatives such as the MyDigital ID SuperApp and MyGov mobile application in 2025, government agencies face increasing pressure to implement secure, efficient digital onboarding processes". Not in seeder.

3. **Tier 3 description differs** -- Zoho says "Behavioral Analytics" with "Detection of abnormal application patterns, such as 50+ submissions". Seeder says "Liveness & Deepfake Detection" with "Advanced AI to detect presentation attacks, deepfakes, and injection attacks in real-time." Different capability described.

### CRITICAL: BNPL Use Case -- Page 25

#### Missing Content

1. **4 fraud types** -- Zoho details: Account Takeover Fraud, Buy Now-Pay Never Fraud, Synthetic Identity Fraud, The New Account Abuse -- each with specific descriptions. Seeder has a generic "Overview" paragraph instead.

2. **Client logos/case study** -- Zoho lists "BNPL's Player We Helped Transform" with logos: Versa, Compasia, PAYLATER, Affin Hwang Capital, and a description of the partnership. Seeder has nothing.

3. **Heading differs** -- Zoho: "Free Use Case Document Download -- Buy Now Pay Later". Seeder: "BNPL Use Case Document".

### HIGH: Credit Financing -- Page 18

**Zoho original has different structure from seeder.**

1. **Zoho heading differs** -- "Streamline Your User Onboarding: Fast, Easy and Secure Verification for 24/7" vs seeder's "eKYC for the Credit Financing Industry"

2. **Blog articles and infographics** -- Zoho has blog article links and infographic galleries. Seeder has none.

3. **Product/service links** -- Zoho links to EMAS eKYC, EMAS CIDA, and Joget. Not in seeder.

4. **Benefits section differs** -- Zoho: "Faster Loan Processing", "Reduced Risk", "Improved Compliance". Seeder: different checklist items.

### LOW/OK: Fraud Report -- Page 22

The seeder content closely matches the Zoho original. Key headings, fraud methods list, and report download cards (2023 + 2024) are all present. Minor difference: Zoho includes a "Select the Fraud Report that interests you..." instruction text that is present in the blade but not as a block in the seeder (it would need to be part of the prose block or handled by the renderer). The seeder also captures the "sensitive data storage" vs "business operations" phrasing difference in the opening paragraph.

### LOW/OK: Philippines Telco Whitepaper -- Page 24

Seeder captures the key elements: heading, 3 challenges, whitepaper summary paragraph, and Why Innov8tif section. The descriptions for the 3 challenges are expanded in the seeder (Zoho just lists titles). This is acceptable editorial expansion.

### LOW/OK: Hospitality -- Page 20

Seeder matches Zoho fairly well. Sectors, solutions checklist, and Why Innov8tif all present. Minor: Zoho has additional body text about hotels/homestays facilitating remote check-ins and identity proofing being "a crucial element" -- this context paragraph is missing from seeder. Classified as medium rather than critical.

---

## Systemic Issues Summary

### 1. Customer Case Studies (ALL country pages)

Every Zoho country page includes 1-6 named customer case studies with company names, descriptions, and industry labels. These are completely absent from both the seeder blocks and blade files. This is the single largest content gap.

**Affected pages:** 1-10 (all country pages)

### 2. Product Description Paragraph (ALL country pages)

The standard "EMAS eKYC is an integrated digital ID verification technology..." paragraph appears on every Zoho country page but is absent from all seeder versions.

**Affected pages:** 1-10

### 3. Cross-Country Navigation (ALL country pages)

The "Tested And Compliant To Your Country Standard" section with flag links appears on every Zoho country page. Not present in any seeder version.

**Affected pages:** 1-10

### 4. Resources Section (ALL country pages)

Wiki and PDF download resource cards are on every Zoho country page but absent from seeder.

**Affected pages:** 1-10

### 5. PDF Download Banner (most pages)

Prominent download CTA banner at top of Zoho pages not replicated.

**Affected pages:** 1-10, 12-17

### 6. Specific Statistics Replaced with Vague Words

Exact numbers from Zoho originals replaced with vague terms.

**Affected pages:** 21 (Government Malaysia -- most critical)

### 7. "Why Innov8tif" Detail Loss

Specific selling points (microprint detection, ekycondemand.com, telco operator references) are genericised.

**Affected pages:** 1-10 (partially), 18-20

---

## Recommendations

### Priority 1 -- Fix Immediately

1. **Government Malaysia statistics**: Replace "Increasing", "Billions", "Thousands" with exact figures from Zoho: 319, MYR 54.02 billion, 55,000. Also fix Tier 3 description mismatch.

2. **Insurance Industry (General)**: Restructure to match the ESG framing and include the key statistic (47% / $2.09 billion). Consider adding the EMAS CIDA solution description.

3. **Insurance Malaysia**: Add the CCO quote, "Rise of Insurance Fraud" statistics (62% willingness, Johor case), and detailed benefits section.

4. **BNPL**: Add the 4 fraud types with descriptions and client logos section.

### Priority 2 -- Add Missing Sections

5. **Customer case studies**: Create a new block type (e.g., `customer_stories`) and populate for all country pages. This is the most impactful missing content for conversion.

6. **Product description**: Add the standard introductory paragraph as a `prose` block after the hero on all country pages.

7. **Cross-country navigation**: Consider adding a `related_pages` block type to link country pages to each other (similar to what exists on the Insurance Industry general page).

### Priority 3 -- Content Polish

8. **"Why Innov8tif" enrichment**: Add back specific details about microprint/hologram detection, ekycondemand.com API platform, and telco operator references.

9. **Resources section**: Add wiki and PDF download links as a `resources` block type.

10. **"How It Works" expansion**: Consider expanding from 3-step to 6-step process to match Zoho originals, or create an image-supported version.

### Priority 4 -- Structural Improvements

11. **PDF download banner block type**: Create a `download_banner` block type for pages that offer PDF downloads.

12. **eHealthcare content alignment**: Decide whether to keep the expanded seeder version or align with the simpler Zoho original. The seeder version is arguably better.

13. **Credit Financing alignment**: Add blog/infographic references and match the Zoho heading style.

---

## Methodology Notes

- Zoho pages were fetched live on 2026-04-01. All country pages and most campaign pages returned 200 OK.
- Blade files in `resources/views/pages/solutions/landing/` were used as the authoritative "current site" reference. In all cases, blade content matched seeder content exactly.
- The 3 draft pages (Gaming & Gambling, ESG Insurers, General Telco) have no Zoho originals to compare against (marked "Pending landing page design" in CSV). These are correctly minimal placeholders.
- The eKYB Campaign page from Zoho (`e-Know-Your-Business-Provider-in-Malaysia`) does not have a corresponding seeder entry. This appears intentional as eKYB is a separate product line.
