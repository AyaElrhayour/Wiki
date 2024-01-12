<?php

class WikiTagDao extends crudDao
{
    private $wikiDao;
    private $WikiTagEntity;
    private $wikiEntity;

    public function __construct()
    {
        parent::__construct();
        $this->tablename = 'tags_wikis';
        $this->wikiDao = new WikiDao();
        $this->wikiEntity = new Wiki();
        $this->WikiTagEntity = new WikiTag();
    }

    public function insertWikiWithTags($wikiData, $tagIds)
    {
        $this->wikiEntity->__set("title", $wikiData['title']);
        $this->wikiEntity->__set("content", $wikiData['content']);
        $this->wikiEntity->__set("date", $wikiData['date']);
        $this->wikiEntity->__set("image", $wikiData['image']);
        $this->wikiEntity->__set("category_id", $wikiData['category_id']);
        $this->wikiEntity->__set("user_id", $wikiData['user_id']);
        $this->wikiEntity->__set("archived", $wikiData['archived']);

        $this->wikiDao->insertWikis($this->wikiEntity);
        $lastWiki = $this->wikiDao->getLastWiki();
        $wikiId = $lastWiki->id;
        foreach ($tagIds as $tagId) {
            $this->WikiTagEntity->__set("wiki_id", $wikiId);
            $this->WikiTagEntity->__set("tag_id", $tagId);

            $this->insert(['wiki_id' => $this->WikiTagEntity->__get("wiki_id"), 'tag_id' => $this->WikiTagEntity->__get("tag_id")]);
        }
    }
}
