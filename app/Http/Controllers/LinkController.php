<?php

namespace App\Http\Controllers;

use App\Http\Requests\LinksRequest;
use App\Models\Link;
use App\Services\LinkService;

class LinkController extends Controller
{
    public function show()
    {
        return view('home');
    }

    public function send(LinksRequest $request, LinkService $service)
    {
        $data = $request->validated();

        $urlToken = $service->getLinkToken();


        $link = Link::create([
            'source_link' => $data['url'],
            'link_token' => $urlToken,
            'transfer_limit' => 5,
        ]);

        if ($link) {
            return back()->with('success', route("links.away", ['prefix' => $urlToken]));
        }

        return back()->with('errors', 'не вдалося');


    }

    public function away(string $linkToken)
    {
        $link = Link::where(['link_token' => $linkToken])->firstOrFail();

        if ($link) {
            return redirect()->away($link->source_link);
        }
        abort(404);
    }
}
