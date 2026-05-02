<?php if (!defined('BASE_DIR')) exit('No direct script access allowed');

// требуется тестирование

// use.jsonld: +
// use.jsonld[type]: NewsArticle

/*
https://schema.org/
https://schema.org/Blog

https://developers.google.com/search/docs/appearance/structured-data/search-gallery?hl=ru

https://developers.google.com/search/docs/appearance/structured-data/article?hl=ru
https://developers.google.com/search/blog/2019/09/making-review-rich-results-more-helpful?hl=ru
https://search.google.com/structured-data/testing-tool/u/0/
*/

if (checkStr(getPageData('use.jsonld', false)) === true) {

    $type = getPageData('use.jsonld[type]', 'NewsArticle'); // Article, NewsArticle, BlogPosting
    $headline = getPageData('title');
    
    $datePublished = date("Y-m-d\TH:i:s", strtotime(getPageData('date'))) . getConfig('timezone', '+02:00');
    
    // $dateModified = getPageData('date-edit', null) ?? $datePublished;

    if ($author = getPageData('author', getConfig('author', ''))) {
        $authorArr = [
            '@type' => 'Person',
            'name'  => $author,
            'url' => SITE_URL,
        ];
    } else {
        $authorArr = [];
    }
    
    $arr = [
		'@context' => 'https://schema.org',
		'@type' => $type,
		'headline' => $headline,
		'image' => [getPageData('image-large', UPLOADS_URL . 'default.webp')],
		'datePublished' => $datePublished,
		'author' => $authorArr,
        
		// 'dateModified' => $dateModified,
		// 'url' => getPageData('page-url-full'),
		// 'mainEntityOfPage' => getPageData('page-url-full'),
		// 'publisher' => $pub,
		// 'articleSection'  => $articlesection,
	];

    echo '<script type="application/ld+json">' . json_encode($arr, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES) . '</script>';
    // JSON_UNESCAPED_UNICODE|JSON_UNESCAPED_SLASHES|JSON_PRETTY_PRINT
}

/*
<script type="application/ld+json">
{
  "@context": "https://schema.org",
  "@type": "NewsArticle",
  "headline": "Title of a News Article",
  "image": [
    "https://example.com/photos/1x1/photo.jpg",
    "https://example.com/photos/4x3/photo.jpg",
    "https://example.com/photos/16x9/photo.jpg"
   ],
  "datePublished": "2024-01-05T08:00:00+08:00",
  "dateModified": "2024-02-05T09:20:00+08:00",
  "author": [{
      "@type": "Person",
      "name": "Jane Doe",
      "url": "https://example.com/profile/janedoe123"
    },{
      "@type": "Person",
      "name": "John Doe",
      "url": "https://example.com/profile/johndoe123"
  }]
}
</script>

*/

# end of file
