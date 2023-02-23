<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class SitemapController extends Controller
{
    public function allSiteMap() {
        $products = Product::where('quantity','>',0)->get();
        // $response =  response()->view('sitemap.all', [
        //     'products' => $products,
        // ]);

        $response='<?xml version="1.0" encoding="utf-8"?>
        <urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
        <url>
            <loc>'.route('index').'/</loc>
            <lastmod>2021-10-26T07:32:30+00:00</lastmod>
            <priority>1.00</priority>
        </url>
        <url>
            <loc>'.route('shop').'</loc>
            <lastmod>2021-10-26T07:32:30+00:00</lastmod>
            <priority>0.80</priority>
        </url>
        <url>
            <loc>'.route('design_your_own').'</loc>
            <lastmod>2021-10-26T07:32:30+00:00</lastmod>
            <priority>0.80</priority>
        </url>
        <url>
            <loc>'.route('terms-condition').'</loc>
            <lastmod>2021-10-26T07:32:30+00:00</lastmod>
            <priority>0.80</priority>
            </url>
        <url>
        <loc>'.route('return-policy').'</loc>
            <lastmod>2021-10-26T07:32:30+00:00</lastmod>
            <priority>0.80</priority>
        </url>
        <url>
            <loc>'.route('faq').'</loc>
            <lastmod>2021-10-26T07:32:30+00:00</lastmod>
            <priority>0.80</priority>
        </url>
        <url>
            <loc>'.route('about').'</loc>
            <lastmod>2021-10-26T07:32:30+00:00</lastmod>
            <priority>0.80</priority>
        </url>
        <url>
            <loc>'.route('contact-us').'</loc>
            <lastmod>2021-10-26T07:32:30+00:00</lastmod>
            <priority>0.80</priority>
        </url>';

        foreach ($products as $product){
            $response.='<url>
                <loc>'.route('product-detail',$product->slug).'</loc>
                <lastmod>2021-10-26T07:32:30+00:00</lastmod>
                <priority>1.00</priority>
            </url>';
        }

        $response.='</urlset>';
        file_put_contents(public_path('sitemap.xml'),$response);
    }
}
