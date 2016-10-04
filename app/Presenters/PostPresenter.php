<?php

namespace App\Presenters;

use Lewis\Presenter\AbstractPresenter;

use League\CommonMark\CommonMarkConverter;

class PostPresenter extends AbstractPresenter
{

    protected $markdown;

    public function __construct($object, CommonMarkConverter $markdown)
    {
        $this->markdown = $markdown;

        parent::__construct($object);
    }

    public function excerptHtml()
    {
        return $this->excerpt ? $this->markdown->convertToHtml($this->excerpt) : null;
    }

    public function bodyHtml()
    {
        return $this->body ? $this->markdown->convertToHtml($this->body) : null;
    }
    
    public function publishedDate()
    {
        if ($this->published_at) {
            return $this->published_at->toFormattedDateString();
        }

        return 'Not Published';
    }

    public function publishedHighlight()
    {
        if ($this->published_at && $this->published_at->isFuture()) {
            return 'info';
        } elseif (! $this->published_at) {
            return 'warning';
        }
    }

    public function excerptImageUrl() 
    {
        $dom = new \DOMDocument();
        if ($this->excerpt) 
        {
            $dom->loadHTML($this->excerpt);
        }
        else
        {
            $dom->loadHTML($this->body);
        }
        $dom->preserveWhiteSpace = false;
        $imgs  = $dom->getElementsByTagName("img");
        $firstImg = "";
        for($i = 0; $i < $imgs->length; $i++) {
            $firstImg = $imgs->item($i)->getAttribute("src");
            break;
        }
        return $firstImg;
    }

    public function shortContent() 
    {
        $content = $this->excerpt ? $this->excerpt : $this->body;
        $stripVal = strip_tags($this->body);
        $splitArr = explode(" ", $stripVal);
        $short = "";
        $count = count($splitArr) > 25 ? 25 : count($splitArr);
        for($i = 0; $i < $count; $i ++) {
            $short = $short." ".$splitArr[$i];
        }
        return $short."...";
    }

}
