<?php

use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use Platform\Base\Enums\BaseStatusEnum;
use Platform\Base\Models\BaseModel;
use Platform\Base\Supports\SortItemsWithChildrenHelper;
use Platform\Blog\Repositories\Interfaces\CategoryInterface;
use Platform\Blog\Repositories\Interfaces\PostInterface;
use Platform\Blog\Repositories\Interfaces\TagInterface;
use Platform\Blog\Supports\PostFormat;
use Illuminate\Support\Arr;

if (!function_exists('get_featured_posts')) {
    /**
     * @param int $limit
     * @param array $with
     *
     * @return Collection
     */
    function get_featured_posts($limit, array $with = [])
    {
        return app(PostInterface::class)->getFeatured($limit, $with);
    }
}

if (!function_exists('get_latest_posts')) {
    /**
     * @param int $limit
     * @param array $excepts
     *
     * @return Collection
     */
    function get_latest_posts($limit, $excepts = [], array $with = [])
    {
        return app(PostInterface::class)->getListPostNonInList($excepts, $limit, $with);
    }
}

if (!function_exists('get_related_posts')) {
    /**
     * @param int $id
     * @param int $limit
     *
     * @return Collection
     */
    function get_related_posts($id, $limit)
    {
        return app(PostInterface::class)->getRelated($id, $limit);
    }
}

if (!function_exists('get_posts_by_category')) {
    /**
     * @param int $categoryId
     * @param int $paginate
     * @param int $limit
     *
     * @return Collection
     */
    function get_posts_by_category($categoryId, $paginate = 12, $limit = 0)
    {
        return app(PostInterface::class)->getByCategory($categoryId, $paginate, $limit);
    }
}

if (!function_exists('get_posts_by_tag')) {
    /**
     * @param string $slug
     * @param int $paginate
     *
     * @return Collection
     */
    function get_posts_by_tag($slug, $paginate = 12)
    {
        return app(PostInterface::class)->getByTag($slug, $paginate);
    }
}

if (!function_exists('get_posts_by_user')) {
    /**
     * @param int $authorId
     * @param int $paginate
     *
     * @return Collection
     */
    function get_posts_by_user($authorId, $paginate = 12)
    {
        return app(PostInterface::class)->getByUserId($authorId, $paginate);
    }
}

if (!function_exists('get_all_posts')) {
    /**
     * @param boolean $active
     * @param int $perPage
     *
     * @return Collection
     */
    function get_all_posts($active = true, $perPage = 12)
    {
        return app(PostInterface::class)->getAllPosts($perPage, $active);
    }
}

if (!function_exists('get_recent_posts')) {
    /**
     * @param int $limit
     *
     * @return Collection
     */
    function get_recent_posts($limit)
    {
        return app(PostInterface::class)->getRecentPosts($limit);
    }
}

if (!function_exists('get_featured_categories')) {
    /**
     * @param int $limit
     * @param array $with
     *
     * @return Collection
     */
    function get_featured_categories(int $limit, array $with = [])
    {
        return app(CategoryInterface::class)->getFeaturedCategories($limit, $with);
    }
}

if (!function_exists('get_all_categories')) {
    /**
     * @param array $condition
     * @param array $with
     *
     * @return Collection
     */
    function get_all_categories(array $condition = [], array $with = [])
    {
        return app(CategoryInterface::class)->getAllCategories($condition, $with);
    }
}

if (!function_exists('get_all_tags')) {
    /**
     * @param boolean $active
     *
     * @return Collection
     */
    function get_all_tags(bool $active = true)
    {
        return app(TagInterface::class)->getAllTags($active);
    }
}

if (!function_exists('get_popular_tags')) {
    /**
     * @param integer $limit
     *
     * @return Collection
     */
    function get_popular_tags(int $limit = 10)
    {
        return app(TagInterface::class)->getPopularTags($limit);
    }
}

if (!function_exists('get_popular_posts')) {
    /**
     * @param integer $limit
     * @param array $args
     *
     * @return Collection
     */
    function get_popular_posts(int $limit = 10, array $args = [])
    {
        return app(PostInterface::class)->getPopularPosts($limit, $args);
    }
}

if (!function_exists('get_popular_categories')) {
    /**
     * @param integer $limit
     *
     * @return Collection
     */
    function get_popular_categories($limit = 10)
    {
        return app(CategoryInterface::class)->getPopularCategories($limit);
    }
}

if (!function_exists('get_category_by_id')) {
    /**
     * @param integer $id
     *
     * @return BaseModel
     */
    function get_category_by_id($id)
    {
        return app(CategoryInterface::class)->getCategoryById($id);
    }
}

if (!function_exists('get_categories')) {
    /**
     * @param array $args
     *
     * @return Collection|mixed
     */
    function get_categories(array $args = [])
    {
        $indent = Arr::get($args, 'indent', '??????');

        $repo = app(CategoryInterface::class);

        $categories = $repo->getCategories(Arr::get($args, 'select', ['*']), [
            'categories.created_at' => 'DESC',
            'categories.is_default' => 'DESC',
            'categories.order' => 'ASC',
        ]);

        $categories = sort_item_with_children($categories);

        foreach ($categories as $category) {
            $indentText = '';
            $depth = (int)$category->depth;
            for ($index = 0; $index < $depth; $index++) {
                $indentText .= $indent;
            }
            $category->indent_text = $indentText;
        }

        return $categories;
    }
}

if (!function_exists('get_categories_with_children')) {
    /**
     * @return Collection
     * @throws Exception
     */
    function get_categories_with_children()
    {
        $categories = app(CategoryInterface::class)
            ->getAllCategoriesWithChildren(['status' => BaseStatusEnum::PUBLISHED], [], ['id', 'name', 'parent_id']);
        $sortHelper = app(SortItemsWithChildrenHelper::class);
        $sortHelper
            ->setChildrenProperty('child_cats')
            ->setItems($categories);

        return $sortHelper->sort();
    }
}

if (!function_exists('register_post_format')) {
    /**
     * @param array $formats
     *
     * @return void
     */
    function register_post_format(array $formats)
    {
        PostFormat::registerPostFormat($formats);
    }
}

if (!function_exists('get_post_image')) {
    function get_post_image($url, $size = null)
    {
        return \RvMedia::getImageUrl($url, $size, false, \RvMedia::getDefaultImage());
    }
}

if (!function_exists('limit_text')) {
    function limit_text($value, $size = 50)
    {
        return Str::limit($value, $size);
    }
}

if (!function_exists('get_time_ago')) {
    function get_time_ago($time)
    {
        return str_ireplace([' seconds', ' second', ' minutes', ' minute', ' hours', ' hour', ' days', ' day', ' weeks', ' week'], ['gi??y tr?????c', 'gi??y tr?????c', 'ph??t tr?????c', 'ph??t tr?????c', 'gi??? tr?????c', 'gi??? tr?????c', 'ng??y tr?????c', 'ng??y tr?????c', 'tu???n tr?????c', 'tu???n tr?????c'], $time->diffForHumans());
    }
}

if (!function_exists('get_post_formats')) {
    /**
     * @param bool $convertToList
     *
     * @return array
     */
    function get_post_formats($convertToList = false)
    {
        return PostFormat::getPostFormats($convertToList);
    }
}
