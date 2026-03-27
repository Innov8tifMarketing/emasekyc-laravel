<?php

namespace App\Http\Controllers;

use App\Models\WikiFeedback;
use App\Models\WikiPage;
use App\Models\WikiRedirect;
use Illuminate\Http\Request;

class WikiPageController extends Controller
{
    public function index()
    {
        $categories = WikiPage::published()->root()
            ->with(['children' => fn ($q) => $q->published()->ordered()])
            ->ordered()
            ->get();

        return view('pages.wiki.index', compact('categories'));
    }

    public function show(string $path)
    {
        $page = WikiPage::where('full_slug', $path)->published()->first();

        if (! $page) {
            $redirect = WikiRedirect::where('old_slug', $path)->first();
            if ($redirect) {
                return redirect()->route('wiki.show', $redirect->wikiPage->full_slug, 301);
            }
            abort(404);
        }

        if ($page->isCategory()) {
            $children = $page->children()->published()->ordered()->get();

            return view('pages.wiki.category', compact('page', 'children'));
        }

        $page->load('faqs', 'relatedPages');
        $toc = $page->extractToc();
        $prevPage = $page->previousPage();
        $nextPage = $page->nextPage();

        return view('pages.wiki.show', compact('page', 'toc', 'prevPage', 'nextPage'));
    }

    public function search(Request $request)
    {
        $query = $request->input('q', '');
        $results = collect();

        if (strlen($query) >= 2) {
            $results = WikiPage::search($query)->get()->filter(fn ($p) => $p->status === 'published');
        }

        return view('pages.wiki.search', compact('query', 'results'));
    }

    public function feedback(Request $request, WikiPage $wikiPage)
    {
        $request->validate([
            'helpful' => 'required|boolean',
            'comment' => 'nullable|string|max:1000',
        ]);

        $ipHash = hash('sha256', $request->ip());

        $existing = WikiFeedback::where('wiki_page_id', $wikiPage->id)
            ->where('ip_hash', $ipHash)
            ->first();

        if ($existing) {
            $existing->update([
                'helpful' => $request->boolean('helpful'),
                'comment' => $request->input('comment'),
            ]);
        } else {
            WikiFeedback::create([
                'wiki_page_id' => $wikiPage->id,
                'helpful' => $request->boolean('helpful'),
                'comment' => $request->input('comment'),
                'ip_hash' => $ipHash,
                'created_at' => now(),
            ]);
        }

        return response()->json(['status' => 'ok']);
    }
}
