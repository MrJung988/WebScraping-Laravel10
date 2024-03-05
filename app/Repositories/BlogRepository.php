<?php

namespace App\Repositories;

use App\Repositories\BlogRepositoryInterface;
use Embed\Embed;

class BlogRepository implements BlogRepositoryInterface
{
    public function fetchWebsite($url)
    {
        $embed = new Embed();

        $info = $embed->get($url);

        $data = [
            'title' => $info->title,
            'url' => $info->url,
            'description' => $info->description,
            'thumbnail_image' => $info->image,
            'providerName' => $info->providerName,
        ];

        return $data;
    }
}
