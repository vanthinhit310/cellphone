<?php

namespace Platform\Gallery\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Platform\Gallery\Models\Gallery as GalleryModel;
use Platform\Gallery\Repositories\Interfaces\GalleryInterface;
use Platform\Gallery\Services\GalleryService;
use Gallery;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Response;
use SeoHelper;
use SlugHelper;
use Theme;

class PublicController extends Controller
{

    /**
     * @var GalleryInterface
     */
    protected $galleryRepository;

    /**
     * PublicController constructor.
     * @param GalleryInterface $galleryRepository
     */
    public function __construct(GalleryInterface $galleryRepository)
    {
        $this->galleryRepository = $galleryRepository;
    }

    /**
     * @return Response
     */
    public function getGalleries()
    {
        Gallery::registerAssets();
        $galleries = $this->galleryRepository->getAll();

        SeoHelper::setTitle(__('Galleries'));

        Theme::breadcrumb()
            ->add(__('Home'), url('/'))
            ->add(__('Galleries'), route('public.galleries'));

        return Theme::scope('galleries', compact('galleries'), 'plugins/gallery::themes.galleries')
            ->render();
    }

    /**
     * @param string $slug
     * @param Request $request
     *
     * @return RedirectResponse|Response
     */
    public function getGallery($slug, GalleryService $galleryService)
    {
        $slug = SlugHelper::getSlug($slug, SlugHelper::getPrefix(GalleryModel::class));

        if (!$slug) {
            abort(404);
        }

        $data = $galleryService->handleFrontRoutes($slug);

        if (isset($data['slug']) && $data['slug'] !== $slug->key) {
            return redirect()->to(route('public.single', SlugHelper::getPrefix(GalleryModel::class) . '/' . $data['slug']));
        }

        return Theme::scope($data['view'], $data['data'], $data['default_view'])
            ->render();
    }
}
