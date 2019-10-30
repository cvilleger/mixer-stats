<?php

namespace App\Document;

use Doctrine\ODM\MongoDB\Mapping\Annotations as MongoDB;

/** @MongoDB\Document */
class Channel
{
    /** @MongoDB\Id */
    private $id;

    /** @MongoDB\Field(type="hash") */
    private $content;

    public function getId()
    {
        return $this->id;
    }

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content): void
    {
        $this->content = $content;
    }
}
