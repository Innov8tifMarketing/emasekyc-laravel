---
title: "HIP Portal (Host Integration Platform)"
source_slides: [24, 25, 26, 27, 28]
pdf_pages: [23, 24, 25, 26, 27]
website_mapping:
  - page: "solutions/emas-cida"
    relevance: "supporting"
  - page: "solutions/sme-corporations"
    relevance: "supporting"
cida_pillar: "Identity Proofing"
internal_product: "EMAS HIP Portal"
last_extracted: "2026-03-31"
notion_url: "https://innov8tif.notion.site/368c188aeff3497e8fa0633c42c082b3"
notion_page_id: "368c188a-eff3-497e-8fa0-633c42c082b3"
content_type: "product"
primary_source: "merged"
last_notion_sync: "2026-03-31"
---

# HIP Portal (Host Integration Platform)

## Overview
EMAS HIP (Host Integration Platform) Portal is the **middle layer** between the customer's application server and Innov8tif's EMAS eKYC Cloud API. It serves as the **interface for company admins** to view the results of API processes for each individual.

## 5 Core Functions

### 1. Admin Interface
- **Comprehensive monitoring** system that records and displays Customer Journeys with detailed breakdown of EMAS eKYC scores
- **Audit functionality**
- **Customizable scorecard** to better adapt to various market use cases
- **User management system** with permission functionality

### 2. Reporting
Three types of comprehensive reporting:
1. **Overall submissions** with search filters (journey status, name on ID card, status, image quality, date range, scorecard)
2. **Individual Customer Journey report** — detailed view per submission showing journey ID, status, scorecard, name, ID process, status process, audit, manual, company name, dates
3. **Audit Reports (FAR/FRR)** — False Acceptance Rate / False Rejection Rate calculations. Generates PDF/KPI reports with submission of eKYC data/photo and OkayDoc result, score results for each check point

### 3. Manual Verification
- HIP facilitates **manual verification of customer journeys**
- **Verifier interface** for staff to conduct tasks: task inbox, case management, customizable questionnaire
- Reporting: My Reviewed Cases, Full Summary

**5-step manual verification flow:**
1. Setup in Portal (HIP)
2. eKYC Process
3. Staff is assigned task
4. Staff verifies
5. Reporting

### 4. ID Blacklisting
- Function for admins to **upload an encrypted list** of established fraudsters for blacklisting
- **Automatically rejects** incoming ID numbers that exist in the list
- Upload via CSV file with ID numbers

### 5. (Implied) API Integration
- Connects customer's on-boarding channels → Customer System Application Server → EMAS eKYC Backend Portal → Innov8tif EMAS eKYC Cloud (OkayID, OkayLive, OkayFace, OkayDoc)

## Architecture (Deployment Model)

```
                    Customer Data Centre                    │  Innov8tif Cloud
                                                            │
Internet ──→ Customer        Customer System    EMAS eKYC   │  Innov8tif EMAS
             On-boarding ──→ Application    ──→ Backend  ───┼──→ eKYC Cloud
             Channels        Server             Portal      │     ├── OkayID
                                                            │     ├── OkayLive
                                                            │     ├── OkayFace
                                                            │     └── OkayDoc
```

**Key architectural points:**
- The **EMAS eKYC Backend Portal** sits within the **customer's data centre** (not Innov8tif's cloud)
- AI processing (OkayID, OkayLive, OkayFace, OkayDoc) runs in **Innov8tif's EMAS eKYC Cloud**
- The portal acts as a **middleware/proxy layer** — customer systems never call Innov8tif's cloud directly
- Customer on-boarding channels (mobile apps, web, desktop) connect through the customer's own application server

## Additional Context (Notion)

> *Source: Notion wiki — [Portal Access Layer]*

The Portal Access Layer is a CIDA component that enables businesses to interact with the entire CIDA ecosystem, and it is essential to any project implementation.

### Functions

- **Manual Journey Approval and Rejection:** This function allows businesses to manually approve or reject submissions, giving them greater control over their onboarding processes. It is useful for processing cautionary cases or when businesses require additional checks or verifications before accepting new customers.
- **Audit Logs:** An audit log keeps track of each onboarding journey and the portal users who manually approve or reject them. This feature is essential for businesses that need to comply with regulatory requirements, such as KYC and AML regulations.
- **Analytics and Reports:** Businesses can access analytics and reports on the user onboarding journey, including journey completion insights, fraud trends, and more. It enables businesses to identify areas for improvement and optimize their digital onboarding processes.
- **API Usage, Control, and Settings:** The portal access layer provides businesses with an overview of their API credit usage, license configurations, account access settings, and more.
- **Support and Troubleshooting:** Businesses can access Innov8tif's support team via the portal to help with troubleshooting issues.
- **Integration with Other Systems:** The portal provides access to third-party API integration and other authentication systems, such as PKI and device binding.

---

*Return:*

## Visual Context
<!-- PDF 23: Left side shows circular "EMAS Host Integration Platform" wheel with 5 functions: Admin Interface, Reporting, Manual Verification, ID Blacklisting (outer ring). Right side has bullet points + architecture diagram showing data flow from internet through customer data centre to Innov8tif cloud -->
<!-- PDF 24: Admin Interface detail — same wheel with Admin Interface highlighted. Right side shows HIP Portal screenshot with journey list table (Journey ID, Journey Status, Company Name, Last Updated Date). All entries show "COMPLETE" status -->
<!-- PDF 25: Reporting detail — shows three layers of UI screenshots: top filter bar with search fields, middle journey list with columns (Journey ID, Status, Scorecard, Name, ID Process, etc.), bottom shows detailed individual report with face photo, ID card image, and PDF report generation -->
<!-- PDF 26: Manual Verification detail — bullet points on left, right side shows 5-step flow: HIP → eKYC Process → Staff assigned → Staff verifies → Reporting (connected by arrows with numbered circles) -->
<!-- PDF 27: ID Blacklisting — shows checkbox "Blacklist ID Check", file upload button, and Excel spreadsheet with sample ID numbers (901012101234, A12345678, H87654321, 901223125001) -->