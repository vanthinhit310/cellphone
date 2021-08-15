<?php

namespace Theme\Main\Http\Controllers;

use Illuminate\Routing\Controller;
use Platform\Base\Supports\Helper;
use Platform\Blog\Models\Post;
use Platform\Blog\Repositories\Interfaces\CategoryInterface;
use Platform\Blog\Repositories\Interfaces\PostInterface;
use Platform\Blog\Repositories\Interfaces\TagInterface;
use Platform\SeoHelper\SeoOpenGraph;
use Platform\Slug\Repositories\Interfaces\SlugInterface;
use Theme;
use SeoHelper;
use RvMedia;

class NewsController extends Controller
{
    protected $postRepository;
    protected $categoryRepository;
    protected $tagRepository;
    protected $slugRepository;

    /**
     * @param PostInterface $postRepository
     * @param CategoryInterface $categoryRepository
     * @param TagInterface $tagRepository
     * @param SlugInterface $slugRepository
     */
    public function __construct(PostInterface $postRepository, CategoryInterface $categoryRepository, TagInterface $tagRepository, SlugInterface $slugRepository)
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
        $this->tagRepository = $tagRepository;
        $this->slugRepository = $slugRepository;
    }


    public function index()
    {
        SeoHelper::setTitle('Bài viết')->setDescription('Tổng hợp bài viết');
        $data = [];

        $data['features'] = $this->postRepository->getFeatured(7, ['categories']);
        $data['populations'] = $this->postRepository->getPopularPosts(6);
        $data['posts'] = $this->postRepository->getAllPosts(9);

        return Theme::scope("news", $data)->render();
    }

    public function getDetail($slug)
    {
        $data = [];

        $slug = $this->slugRepository->getFirstBy(['key' => $slug, 'reference_type' => Post::class]);

        if (!$slug) {
            abort(404);
        }

        $post = $this->postRepository->getFirstBy(['id' => $slug->reference_id], ['*'], ['slugable', 'tags', 'categories']);

        if (!$post) {
            abort(404);
        }

        Theme::breadcrumb()->add('Trang chủ', route('public.index'))->add('Tin tức', route('news.index'))->add($post->name, $post->url);

        SeoHelper::setTitle($post->name)->setDescription($post->description);

        $meta = new SeoOpenGraph;
        if ($post->image) {
            $meta->setImage(RvMedia::getImageUrl($post->image));
        }
        $meta->setDescription($post->description);
        $meta->setUrl($post->url);
        $meta->setTitle($post->name);
        $meta->setType('article');

        SeoHelper::setSeoOpenGraph($meta);

        Helper::handleViewCount($post, 'viewed_post');

        $data['post'] = $post;
        $data['relateds'] = $this->postRepository->getRelated($post->id, 6);
        $data['recents'] = $this->postRepository->getRecentPosts(6);

        return Theme::scope("news-detail", $data)->render();
    }
}
