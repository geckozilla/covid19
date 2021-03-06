<?php

namespace App\Http\Controllers;

use App\Modules\DataViewer;
use App\Modules\NewsRepository;

class PageController extends Controller
{
    public function home()
    {
        return view('home', [
            'patient' => (new DataViewer())->getPatients(),
            'news' => (new NewsRepository())->get(),
            'kemkes' => (new NewsRepository())->getKemkesNews()
        ]);
    }

    public function feed()
    {
        return response(
            view("feed", [
                "news" => (new NewsRepository())->getFeeds()
            ])
        )->header("Content-Type", "text/xml");
    }
}
