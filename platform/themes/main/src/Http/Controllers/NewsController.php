<?php

namespace Theme\Main\Http\Controllers;

use Illuminate\Routing\Controller;
use Platform\Blog\Repositories\Interfaces\CategoryInterface;
use Platform\Blog\Repositories\Interfaces\PostInterface;
use Platform\Blog\Repositories\Interfaces\TagInterface;
use Theme;
use SeoHelper;

class NewsController extends Controller
{
    protected $postRepository;
    protected $categoryRepository;
    protected $tagRepository;

    /**
     * @param PostInterface $postRepository
     * @param CategoryInterface $categoryRepository
     * @param TagInterface $tagRepository
     */
    public function __construct(PostInterface $postRepository, CategoryInterface $categoryRepository, TagInterface $tagRepository)
    {
        $this->postRepository = $postRepository;
        $this->categoryRepository = $categoryRepository;
        $this->tagRepository = $tagRepository;
    }


    public function index()
    {
        SeoHelper::setTitle('Bài viết')->setDescription('Tổng hợp bài viết');
        $data = [];

        $data['features'] = $this->postRepository->getFeatured(7);
        $data['populations'] = $this->postRepository->getPopularPosts(6);
        $data['posts'] = $this->postRepository->getAllPosts(9);

        return Theme::scope("news", $data)->render();
    }

    public function getDetail()
    {
        $data = [];
        Theme::breadcrumb()->add('Tin tức', 'https://google.com.vn')->add('Thị trường', 'https://:facebook.com');
        return Theme::scope("news-detail", $data)->render();
    }
}
