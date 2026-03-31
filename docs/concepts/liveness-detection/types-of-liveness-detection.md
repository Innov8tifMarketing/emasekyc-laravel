---
title: "Types of Liveness Detection"
notion_url: "https://innov8tif.notion.site/a3a2344b4fe44f909c00ec26290b5e7e"
notion_page_id: "a3a2344b-4fe4-4f90-9c00-ec26290b5e7e"
content_type: "concept"
primary_source: "notion"
last_notion_sync: "2026-03-31"
related_docs:
  - "identity-proofing/liveness-detection.md"
---

# Types of Liveness Detection
There are **two** types of liveness detection techniques: active and passive. Active liveness detection requires the user to perform an action. On the other hand, passive liveness detection runs in the background and does not require any input from the user. 


---


#### Passive Liveness Detection

- Does not require the user to perform any specific actions
- Artificial intelligence is used to analyse a single image of a user
- Runs in the background — sometimes without the user’s knowledge.
- Quicker and more convenient for users as no action is required from them. 
- Suitable for services with an emphasis on user experience and convenience. 


Various methods are used during passive liveness detection. This includes evaluating a selfie photograph, recording a video, or even using flashing lights on the person. It uses artificial intelligence models to assess if a biometric template belongs to a live person or not. 


#### Advantages: 

The scanning process doesn't impose any action requirements on the user. This allows for reduced friction and as a result; lower instances of user abandonment during remote customer onboarding processes.


---


#### Active Liveness Detection

In this liveness detection technique, users must respond to prompts that require motions such as smiling and blinking. This method offers increased reliability and accuracy compared to passive liveness detection. 

- Requires user action to prevent attackers from using photos, videos, masks, or avatars of the users to spoof the system
- Typically combines motion analysis and artificial intelligence with multiple sets of images
- Usually paired with a [challenge-response system](https://www.sciencedirect.com/science/article/pii/S1877050916000417) for additional security against spoofing attempts. Challenge-response systems refer to the prompts (challenge) that users are required to perform and their actions (response). 
- Suitable for services that place a high priority on data security and protection.

#### Disadvantages:

Active detection systems are vulnerable to cybercrime due to their unsophisticated machine-learning models. They are easily deceived by presentation attacks using masks, video manipulation, or synthetic voices. 

Bypassing active liveness detection can be done with simple methods, such as wearing a printed image of the target person's face to mimic blinking and trick the biometric system into verifying the wrong identity.
