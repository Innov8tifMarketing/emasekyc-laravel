---
title: "What is EMAS eKYC?"
notion_url: "https://innov8tif.notion.site/d6968c8b888e410088a02eea913d474a"
notion_page_id: "d6968c8b-888e-4100-88a0-2eea913d474a"
content_type: "concept"
primary_source: "notion"
last_notion_sync: "2026-03-31"
related_docs:
  - "cida-framework/overview.md"
  - "cida-framework/ekyc-flow.md"
media:
  - "media/cida-framework/what-is-emas-ekyc-img-1.png"
---

# What is EMAS eKYC?

> 💡 **What is eKYC?**

> Electronic Know Your Customer (eKYC) is a digital process that helps your business verify a customer's identity remotely without human intervention.
> 
> Customers can complete the verification process online using their computer or mobile device. eKYC is a secure and convenient way for businesses to comply with regulatory requirements while providing a seamless customer experience.
> 
> **EMAS eKYC** is Innov8tif’s unique brand of eKYC systems that uses proprietary technology.  

#### eKYC Applications / Use Cases 

- Digital customer onboarding or account opening.
- Authenticating high value online transactions, such as fund transfer, password changes, etc. 
- Complying with Know Your Customer (KYC) and Anti-Money Laundering (AML) regulations
- Authenticate online account access for secure online portals, government services, and other sensitive information.

#### Industries that benefit from eKYC 

- Banking and finance
- Telecommunications
- Healthcare
- Insurance
- E-commerce
- Online gaming
- Any industry that needs to verify the identity of its customers


#### Steps invovled in eKYC processes 


> 💡 Each eKYC is customisable to your business’ unique needs. This diagram reflects a basic user onboarding process.


![Image 1](media/cida-framework/what-is-emas-ekyc-img-1.png)


1. **Create Journey ID:** A unique identifier is created for each eKYC journey, which will be used to track the progress of the account application and its associated data. The same user can have multiple Journey IDs if they failed previous onboarding attempts.
2. **Document Capture:** The customer is first prompted to capture images of their ID documents (e.g. passport, driving license, etc.) using their smartphone camera. Details such as full name, ID number, and birthday are automatically captured using Optical Character Recognition (OCR) technology.
3. **Liveness Detection:** To ensure that the customer is physically present and not using a static image or a video recording, some providers prompt users to perform a series of actions (e.g. blinking, nodding, etc.). At Innov8tif, we utilize passive liveness detection, where a captured selfie would suffice. This prevents common screen and print spoofing tactics used by fraudsters.
4. **Facial Verification:** The eKYC system uses facial matching algorithms to compare the customer's facial features with profile photos on the ID document to ensure that they match. This ensures that the person performing the selfie is the owner of the ID Document.
5. **Document Verification:** The authenticity of the ID document is verified, ensuring that it is not tampered with, faked, printed, or spoofed. This includes checking for watermarks, holograms, fonts, and other security features to ensure that the ID document is genuine.
6. **Database Checks:** The eKYC system checks the customer's details against various databases (e.g. sanctions lists, PEP lists, etc.) to ensure that they are not a high-risk individual or entity. For financial institutions, this includes credit score checks as well.
7. **Generating Scorecard:** Finally, a scorecard is generated based on the results of the various authenticity checks and assessments. This scorecard is used to determine whether the customer has passed or failed the eKYC process or is deemed cautious. Each company has its own scorecard requirements based on risk tolerance, regulatory requirements, and more.

#### Corresponding Innov8tif’s Module

*(Click each module for more details)*


| INNOV8TIF’S MODULE | SOLUTION |
| --- | --- |
| OkayID (OCR) | Document Capture |
| OkayLive | Liveness Detection |
| OkayDoc | Document Verification |
| OkayFace | Facial Verification |
| eKYC Gateway | Create Journey ID |
| OkayDB | Database Checks |
| Scorecard Engine | Generating Scorecard |


---

