---
title: "Income & Address Proofing"
source_slides: [48]
pdf_pages: [47]
website_mapping:
  - page: "features/additional-verification/income-address-proofing"
    relevance: "primary"
cida_pillar: "Customer Due Diligence"
internal_product: "Intellidoc"
last_extracted: "2026-03-31"
notion_url: "https://innov8tif.notion.site/28ee678e86f54b208d6e125be71a76ff"
notion_page_id: "28ee678e-86f5-4b20-8d6e-125be71a76ff"
content_type: "product"
primary_source: "merged"
last_notion_sync: "2026-03-31"
---

# Income & Address Proofing (Intellidoc)

## Purpose
Innov8tif's **Intellidoc** is designed to automate document processing using AI to extract information from documents. Used for verifying income and address claims during onboarding.

## 6 Document Types Handled
1. **Salary slips**
2. **Employment letters**
3. **Utility bills**
4. **Tax statements (LHDN)** — Malaysia's Inland Revenue Board
5. **Bank statements**
6. **KWSP statements** — Employees Provident Fund (EPF)

## 4 Main Validation Capabilities
1. **Employment verification** through salary slips and employment letters
2. **Income consistency checking** via multiple documents (LHDN, bank statements, KWSP)
3. **Address validation** using utility bills
4. **Account ownership verification** for refunds

## Notes for Website Content
- **NEW vs website**: Website has good stats (95% faster, 87% error reduction). Deck adds:
  - **Intellidoc** as the named product — website doesn't use this name
  - **6 specific document types**: Salary slips, employment letters, utility bills, tax statements (LHDN), bank statements, KWSP statements — website says "utility bills, pay stubs, tax forms, bank statements" but misses LHDN and KWSP specifically
  - **4 specific validation capabilities**: Employment verification, income consistency (cross-document), address validation, account ownership — more structured than website
  - **LHDN** (Malaysian tax authority) and **KWSP** (EPF) as named data sources — adds Malaysian market specificity
- Website already has: OCR, anti-spoofing, error reduction stats, mobile-first, multiple use cases

## Additional Context (Notion)

> *Source: Notion wiki — [Income / Address Proofing]*

Proof of Income (POI) and Proof of Address (POA) allow businesses to verify the user's income status and residential address by scanning relevant documents using their mobile phones.

### Use Cases

![Image 1](media/customer-due-diligence/income-address-proofing-img-12.png)

**Financial Sector: **Loan applicants can submit their income details to prove their creditworthiness.

![Image 1](media/customer-due-diligence/income-address-proofing-img-13.png)

**Real Estate Industry: **Landlords can evaluate potential tenants' attractiveness as renters by verifying their monthly income statements (pay stubs), as an alternative to credit scores.

![Image 1](media/customer-due-diligence/income-address-proofing-img-14.png)

**Internet Service Providers: **POA minimizes errors in user-submitted addresses, reducing the number of missed appointments or reschedulings.

![Image 1](media/customer-due-diligence/income-address-proofing-img-15.png)

**Digital Enterprise Services: **POA serves as a layer of protection, dissuading enterprise customers from breaching the company's terms of service.

### Steps Involved

![Image 1](media/customer-due-diligence/income-address-proofing-img-16.png)

**📝 COLLECTION: **The user takes a photo of the supporting document (utility bills, tax forms) using their mobile phones. There are checks in place to ensure that the document is captured properly, such as image size, lighting detection, and font legibility.

![Image 1](media/customer-due-diligence/income-address-proofing-img-17.png)

👍 **VERIFICATION:** The captured media is then run through a series of automated processes to determine its authenticity. Advanced algorithms are then used to ensure that the document has not been spoofed or tampered with, such as users submitting a photoshopped or photocopied document.

![Image 1](media/customer-due-diligence/income-address-proofing-img-18.png)

**🔍 EXTRACTION: **Using optical character recognition (OCR) technology, It then extracts the relevant information, such as address and income details. The data is then channeled to the component, which may be used to store the data in a predetermined database or compare it against other databases, such as comparing home addresses with government sources.

Currently, Innov8tif supports the following Malaysian documents, but can be expanded upon depending on the unique business needs and requirements:

- KWSP Statements
- LHDN Receipts
- TNB Bill

---

*Return:*

## Visual Context
<!-- PDF 47: Left side shows CDD cascade with Income/Address Proofing highlighted. Right side has description of Intellidoc, followed by 6 document types in a 2-column table, then 4 numbered validation capabilities -->