# Media Index

All graphics and images used in the SSOT documentation. Each image file has a corresponding `.txt` descriptor explaining what it is, its source, and which docs reference it.

## Directory Structure

```
media/
├── cida-framework/          # CIDA architecture diagrams, eKYC flow
├── identity-proofing/       # ID capture, document auth, liveness
├── concepts/                # Educational content images
│   ├── facial-recognition/  # FR accuracy charts, demos
│   ├── liveness-detection/  # Spoofing examples, attack types
│   └── device-fingerprinting/ # How fingerprinting works
├── company/                 # Corporate assets (empty — see public/images/)
└── use-cases/               # Industry use case diagrams (empty)
```

## Image Inventory

### cida-framework/
| File | Description |
|------|-------------|
| customer-id-assurance-ecosystem-updated-11-july-2023.png | Diamond-shaped CIDA ecosystem diagram showing 3 pillars |
| what-is-emas-ekyc-img-1.png | eKYC flow/process diagram |

### identity-proofing/
| File | Description |
|------|-------------|
| id-capture-best-practices-img-1.png | ID capture quality examples |

### concepts/facial-recognition/
| File | Description |
|------|-------------|
| facial-recognition-img-1.png | Facial recognition overview illustration |
| accuracy-of-facial-recognition-technologies-from-different-c.png | Accuracy comparison chart across vendors |

### concepts/liveness-detection/
| File | Description |
|------|-------------|
| common-forms-of-presentation-attacks.png | Types of spoofing/presentation attacks |
| what-is-liveness-detection-for-facial-recognition-img-1.png | Liveness detection in FR context |

### concepts/device-fingerprinting/
| File | Description |
|------|-------------|
| how-does-device-fingerprinting-work-img-1.png | Device fingerprinting process diagram |

### concepts/ (root)
| File | Description |
|------|-------------|
| content-downloads-img-1.png through img-7.png | Content download thumbnails/previews |

## PPTX-Extracted Diagrams (from sales deck v4.0)

Extracted from `Innov8tif_EMAS CIDA Tech Intro_20260326_v4.0.pptx` via LibreOffice PDF conversion + pdftoppm at 200 DPI.

### cida-framework/
| File | PDF Page | Description |
|------|----------|-------------|
| cida-architecture-diamond.png | 3 | Diamond-shaped CIDA architecture with 3 pillars |
| cida-4-layer-architecture.png | 7 | Portal → Channel → Features → Data stack |
| scorecard-decision-flow.png | ~50 | Decision engine: Clear/Cautious/Suspicious |

### identity-proofing/
| File | PDF Page | Description |
|------|----------|-------------|
| mykad-document-authentication-front.png | 12 | MyKad front face with security annotations |
| mykad-document-authentication-back.png | 13 | MyKad back face with MRZ checks |
| mykad-security-features.png | 14 | 5 authentication technique summary |
| liveness-detection-4phone-grid.png | 15 | Pass/fail scenarios (live, photo, screen, print) |
| hip-portal-architecture.png | 23 | HIP integration architecture |
| ekyc-gateway-portal.png | 29 | Gateway portal with 7-step flow |
| deepfake-attack-flow.png | 33 | Normal eKYC vs injection attack |
| deepfake-attack-taxonomy.png | 34 | Full attack taxonomy (3 categories) |

### use-cases/
| File | PDF Page | Description |
|------|----------|-------------|
| alliance-bank-workflow.png | ~56 | Branch banking mobile POS workflow |
| great-eastern-insurance-workflow.png | ~60 | Insurance cross-country eKYC workflow |
