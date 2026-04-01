<?php

namespace App\Console\Commands;

use App\Models\LandingPage;
use Illuminate\Console\Attributes\Description;
use Illuminate\Console\Attributes\Signature;
use Illuminate\Console\Command;

#[Signature('landing-pages:attach-pdfs')]
#[Description('Attach PDF files from docs/downloads/ to landing pages via Spatie Media Library')]
class AttachLandingPagePdfs extends Command
{
    public function handle(): int
    {
        $mapping = $this->pdfMapping();
        $docsPath = base_path('docs');
        $attached = 0;
        $skipped = 0;

        foreach ($mapping as $slug => $pdfPath) {
            $page = LandingPage::where('slug', $slug)->first();

            if (! $page) {
                $this->warn("Page not found: {$slug}");

                continue;
            }

            if ($page->hasMedia('pdfs')) {
                $this->line("  Skipping {$slug} — PDF already attached");
                $skipped++;

                continue;
            }

            $fullPath = $docsPath.'/'.$pdfPath;

            if (! file_exists($fullPath)) {
                $this->warn("  PDF not found: {$fullPath}");

                continue;
            }

            $page->addMedia($fullPath)
                ->preservingOriginal()
                ->toMediaCollection('pdfs');

            $this->info("  Attached PDF to {$slug}");
            $attached++;
        }

        $this->newLine();
        $this->info("Done. Attached: {$attached}, Skipped: {$skipped}");

        return self::SUCCESS;
    }

    /**
     * @return array<string, string>
     */
    private function pdfMapping(): array
    {
        return [
            // Country pages — brochure
            'ekyc-malaysia' => 'downloads/brochures/Innov8tif_EMAS eKYC Brochure V1.9.pdf',
            'ekyc-singapore' => 'downloads/brochures/Innov8tif_EMAS eKYC Brochure V1.9.pdf',
            'ekyc-philippines' => 'downloads/brochures/Innov8tif_EMAS eKYC Brochure V1.9.pdf',
            'ekyc-vietnam' => 'downloads/brochures/Innov8tif_EMAS eKYC Brochure V1.9.pdf',
            'ekyc-myanmar' => 'downloads/brochures/Innov8tif_EMAS eKYC Brochure V1.9.pdf',
            'ekyc-indonesia' => 'downloads/brochures/Innov8tif_EMAS eKYC Brochure V1.9.pdf',
            'ekyc-cambodia' => 'downloads/brochures/Innov8tif_EMAS eKYC Brochure V1.9.pdf',
            'ekyc-brunei' => 'downloads/brochures/Innov8tif_EMAS eKYC Brochure V1.9.pdf',
            'ekyc-hong-kong' => 'downloads/brochures/Innov8tif_EMAS eKYC Brochure V1.9.pdf',
            'ekyc-kenya' => 'downloads/brochures/Innov8tif_EMAS eKYC Brochure V1.9.pdf',
            'ekyc-components-for-indonesia' => 'downloads/brochures/Innov8tif_EMAS eKYC Brochure V1.9.pdf',

            // Insurance pages — use case
            'ekyc-for-insurance-industry' => 'downloads/use-cases/Innov8tif_Insurance Use Case_v1.0.pdf',
            'ekyc-for-insurance-industry-in-malaysia' => 'downloads/use-cases/Innov8tif_Insurance Use Case_v1.0.pdf',
            'ekyc-for-insurance-industry-in-indonesia' => 'downloads/use-cases/Innov8tif_Insurance Use Case_v1.0.pdf',
            'ekyc-for-insurance-industry-in-thailand' => 'downloads/use-cases/Innov8tif_Insurance Use Case_v1.0.pdf',
            'ekyc-for-insurance-industry-in-cambodia' => 'downloads/use-cases/Innov8tif_Insurance Use Case_v1.0.pdf',
            'ekyc-for-insurance-industry-in-the-phillipines' => 'downloads/use-cases/Innov8tif_Insurance Use Case_v1.0.pdf',

            // Other industry pages
            'ekyc-for-credit-financing-industry' => 'downloads/brochures/Innov8tif_EMAS eKYC Brochure V1.9.pdf',
            'ekyc-for-ehealthcare-industry' => 'downloads/whitepapers/e-Healthcare Whitepaper_Innov8tif_v1.0.pdf',
            'id-assurance-for-hospitality-industry' => 'downloads/use-cases/Innov8tif_Hospitality Industry Improving Guest Experience With eKYC Use Case_v1.0.pdf',

            // Whitepaper/report pages
            'secure-digital-identity-for-government-services-in-malaysia' => 'downloads/brochures/Innov8tif_EMAS eKYC Brochure V1.9.pdf',
            'innov8tif-fraud-report' => 'downloads/brochures/Innov8tif_EMAS eKYC Brochure V1.9.pdf',
            'philippines-telco-whitepaper' => 'downloads/whitepapers/20220928_Whitepaper_Phiippines_Telco_v1.2a.pdf',
            'bnpl-use-case-document' => 'downloads/use-cases/Innov8tif_BNPL Use Case_v3.1.pdf',
            'cambodia-banking-whitepaper' => 'downloads/whitepapers/(Innov8tif) Whitepaper_ The Case for ID Assurance in Cambodia.pdf',
            'emas-ekyc-api-ondemand' => 'downloads/brochures/Innov8tif_EMAS eKYC Brochure V1.9.pdf',

            // Pending pages (drafts with PDFs)
            'gaming-gambling-use-case' => 'downloads/use-cases/Innov8tif_Gaming & Gambling_v1.0.pdf',
            'esg-insurers-asean' => 'downloads/whitepapers/Innov8tif_ESG Insurers in ASEAN The Role of Digital ID Verification_v1.0.pdf',
            'general-telco-ekyc' => 'downloads/whitepapers/Innov8tif_WHITEPAPER- A Telco_s Guide to Leveraging e-KYC v1.0c.pdf',
        ];
    }
}
