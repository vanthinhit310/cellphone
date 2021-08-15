<?php

namespace Platform\Gallery\Repositories\Interfaces;

use Platform\Support\Repositories\Interfaces\RepositoryInterface;

interface GalleryInterface extends RepositoryInterface
{

    /**
     * Get all galleries.
     *
     * @param array $with
     * @return mixed
     */
    public function getAll(array $with = ['slugable', 'user']);

    /**
     * @return mixed
     */
    public function getDataSiteMap();

    /**
     * @param int $limit
     * @param array $with
     */
    public function getFeaturedGalleries($limit, array $with = ['slugable', 'user']);
}
