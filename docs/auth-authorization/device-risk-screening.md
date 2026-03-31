---
title: "Device Risk Screening"
source_slides: [53, 54]
pdf_pages: []
notion_url: "https://innov8tif.notion.site/4d6458b51f034599bc95f9af9063a722"
notion_page_id: "4d6458b5-1f03-4599-bc95-f9af9063a722"
website_mapping: []
cida_pillar: "Auth & Authorization"
internal_product: "TrustDevice"
content_type: "product"
primary_source: "merged"
last_extracted: "2026-03-31"
last_notion_sync: "2026-03-31"
related_docs:
  - "concepts/device-fingerprinting/what-is-device-fingerprinting.md"
  - "concepts/device-fingerprinting/how-does-it-work.md"
  - "auth-authorization/device-binding.md"
---

# Device Risk Screening (TrustDevice)

## Key Facts (from PPTX hidden slides 53-54)

### Device ID (Slide 53)
- Robust, unique, persistent **device identifier**
- Collects: device brand, type, IP address, OS, installed apps, sensor data, scroll behavior

### TrustDevice (Slide 54)
- **Client environment analysis** — detects tampering with the verification environment
- **Anomaly detection** — flags new devices, emulators, replay attacks, group control, bot attacks
- Combines device fingerprinting with behavioral analysis for risk scoring


## Additional Context (Notion)

> *Source: Notion wiki — [Device Risk Screening, Biometric Authentication]*

### Device Risk Screening

#### Introduction

![Image 1](media/auth-authorization/device-risk-screening-img-1.png)

Device Risk Assessment (aka Device Blacklisting) flags devices that are known to be involved in criminal activities. This prevents fraudulent signup attempts and helps identify criminal activities.

#### How It Works

![Image 2](media/auth-authorization/device-risk-screening-img-2.png)

- During the eKYC process, the module references the devices's unique ID and cross-checks in with a database of known Device IDs involved in criminal activity.
- Device blacklisting can also be run when a user logs attempts to log in using a new device.
- If there is a match, the module will prevent the user from accessing the platform and notifies the company of a potential fraud threat.
- Blacklisted users can appeal the decision by conducting video verification or visiting a physical branch.
- During the appeal process, the user provides additional information to verify their identity and prove that they are not involved in criminal activities.

#### Benefits

![Image 3](media/auth-authorization/device-risk-screening-img-3.png)

- Device blacklisting does not affect the user experience of genuine customers.
- Device blacklisting is an easy way to dissuade fraud attempts — requiring fraudsters to spend resources to obtain "clean" devices for each sign-up attempt.
- The process is entirely automated, with manual intervention reserved for the review and appeal process

---


### Biometric Authentication

#### How It Works 

![Image 1](media/auth-authorization/biometric-authentication-img-6.png)

Biometric authentication uses unique physical characteristics, such as fingerprints, facial recognition, voice recognition, or iris scans, to verify a person's identity. 

It is now widely adopted due to the widespread use of smartphone devices which is now equipped with biometric sensors, such as fingerprint scanners and front-facing cameras.  

#### Benefits

🔒 **INCREASED SECURITY: **Physical traits are harder to replicate or steal as compared to PIN codes and passwords. 

👍 **CONVENIENCE:** Biometric authentication enables password-less authentication — which does not require users to remember complex passwords or carry around physcial tokens.

 

👟 **SPEED:** Biometric authentication is **faster** than traditional authentication methods, as it typically only takes a few seconds to scan and verify a user's biometric data.

🦼 **ACCESSIBILITY:** Biometric authentication can be more accessible for users with disabilities, as it does not require manual dexterity or the ability to remember and type in passwords.

#### Limitations

![Image 2](media/auth-authorization/biometric-authentication-img-7.png)

Standalone biometric authentication should only be used for low-risk actions, such as account logins or balance checks. To perform high-value tasks, such as password changes or account trasnfers, It needs to be combined with other authenticaiton systems, such as OTP and eKYC to enable multi-factor authentication. 

---

