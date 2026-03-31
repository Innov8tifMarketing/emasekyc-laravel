---
title: "How Does Device Fingerprinting Work?"
notion_url: "https://innov8tif.notion.site/ae215465d51e40038c2f3433d692ae0a"
notion_page_id: "ae215465-d51e-4003-8c2f-3433d692ae0a"
content_type: "concept"
primary_source: "notion"
last_notion_sync: "2026-03-31"
related_docs:
  - "auth-authorization/device-binding.md"
media:
  - "media/concepts/device-fingerprinting/how-does-device-fingerprinting-work-img-1.png"
---

# How Does Device Fingerprinting Work?

![Image 1](media/concepts/device-fingerprinting/how-does-device-fingerprinting-work-img-1.png)


---


Device fingerprinting involves a series of 3 steps that gather information on a user’s device to compile a unique profile out of it towards the end.


### **Collection of Information**

 Information is collected on a device when it connects to a network or visits a website. This can include:

- **User-Agent String**: This is a string of text that includes details about the device’s operating system, browser, and version.
- **IP Address**: The unique numerical address assigned to a device on the internet.
- **Screen Resolution and Colour Depth**: Display capabilities of the device.
- **Time Zone**: Time zone setting of the device.
- **Installed Fonts**: The list of fonts installed on the device.
- **Browser Plugins**: Information about browser plugins and extensions installed on the device.
- **Language Preferences**: The preferred language of the device.
- **Hardware and Software Characteristics**: Details about the device’s hardware, such as CPU type and number of cores, as well as software settings.
- **Cookies and Local Storage**: Information stored by websites on the device’s browser.

### Fingerprint Generation

The collected information is then processed and combined to create a unique profile or “fingerprint” for the device. This fingerprint is a representation of the device’s unique characteristics.


### **Comparison and Tracking**

 The generated fingerprint is then compared to a database of known fingerprints. The device is recognised when a match is found and its behaviour can be tracked over time. If the fingerprint is not found, a new entry can be created in the database.


---

Check out our [article](https://innov8tif.com/what-is-device-fingerprinting-and-how-does-it-work/) to get a further in-depth look into what device fingerprinting is and how it works. 


