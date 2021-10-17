<div class="gallery-images-wrapper list-images">
    @php
        $values = $values == '[null]' ? '[]' : $values;
        $attributes = isset($attributes) ? $attributes : [];
    @endphp
    @php $images = old($name, !is_array($values) ? json_decode($values) : $values); @endphp
    <div class="images-wrapper">
        <div data-name="{{ $name }}"
             class="text-center cursor-pointer js-btn-trigger-add-image default-placeholder-gallery-image @if (is_array($images) && !empty($images)) hidden @endif">
            <img src="{{ RvMedia::getDefaultImage(false) }}" alt="{{ trans('core/base::base.image') }}" width="120">
            <br>
            <p style="color:#c3cfd8">{{ trans('core/base::base.using_button') }}
                <strong>{{ trans('core/base::base.select_image') }}</strong> {{ trans('core/base::base.to_add_more_image') }}.</p>
        </div>
        <input type="hidden" name="{{ $name }}">
        <ul class="list-unstyled list-gallery-media-images @if (!is_array($images) || empty($images)) hidden @endif">
            @if (is_array($images) && !empty($images))
                @foreach($images as $image)
                    @if (!empty($image))
                        <li class="gallery-image-item-handler" data-test="10">
                            <div class="list-photo-hover-overlay">
                                <ul class="photo-overlay-actions">
                                    <li>
                                        <a class="mr10 btn-trigger-edit-gallery-image" data-toggle="tooltip"
                                           data-placement="bottom" data-original-title="{{ trans('core/base::base.change_image') }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a class="mr10 btn-trigger-remove-gallery-image" data-toggle="tooltip"
                                           data-placement="bottom" data-original-title="{{ trans('core/base::base.delete_image') }}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="custom-image-box image-box">
                                <input type="hidden" name="{{ $name }}" value="{{ $image }}" class="image-data">
                                    <div class="preview-image-wrapper @if (!Arr::get($attributes, 'allow_thumb', true)) preview-image-wrapper-not-allow-thumb @endif">
                                        @if ((strpos($image, '.mp4') !== false) || (strpos($image, '.mov') !== false) || (strpos($image, '.avi') !== false))
                                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAJYAAACWCAYAAAA8AXHiAAAAGXRFWHRTb2Z0d2FyZQBBZG9iZSBJbWFnZVJlYWR5ccllPAAAAyRpVFh0WE1MOmNvbS5hZG9iZS54bXAAAAAAADw/eHBhY2tldCBiZWdpbj0i77u/IiBpZD0iVzVNME1wQ2VoaUh6cmVTek5UY3prYzlkIj8+IDx4OnhtcG1ldGEgeG1sbnM6eD0iYWRvYmU6bnM6bWV0YS8iIHg6eG1wdGs9IkFkb2JlIFhNUCBDb3JlIDYuMC1jMDAyIDExNi4xNjQ3NjYsIDIwMjEvMDIvMTktMjM6MTA6MDcgICAgICAgICI+IDxyZGY6UkRGIHhtbG5zOnJkZj0iaHR0cDovL3d3dy53My5vcmcvMTk5OS8wMi8yMi1yZGYtc3ludGF4LW5zIyI+IDxyZGY6RGVzY3JpcHRpb24gcmRmOmFib3V0PSIiIHhtbG5zOnhtcD0iaHR0cDovL25zLmFkb2JlLmNvbS94YXAvMS4wLyIgeG1sbnM6eG1wTU09Imh0dHA6Ly9ucy5hZG9iZS5jb20veGFwLzEuMC9tbS8iIHhtbG5zOnN0UmVmPSJodHRwOi8vbnMuYWRvYmUuY29tL3hhcC8xLjAvc1R5cGUvUmVzb3VyY2VSZWYjIiB4bXA6Q3JlYXRvclRvb2w9IkFkb2JlIFBob3Rvc2hvcCAyMS4yIChXaW5kb3dzKSIgeG1wTU06SW5zdGFuY2VJRD0ieG1wLmlpZDozMUIxOTQyOTI4NEQxMUVDOThGNzlFMjFGNUJGOTJCRiIgeG1wTU06RG9jdW1lbnRJRD0ieG1wLmRpZDozMUIxOTQyQTI4NEQxMUVDOThGNzlFMjFGNUJGOTJCRiI+IDx4bXBNTTpEZXJpdmVkRnJvbSBzdFJlZjppbnN0YW5jZUlEPSJ4bXAuaWlkOjMxQjE5NDI3Mjg0RDExRUM5OEY3OUUyMUY1QkY5MkJGIiBzdFJlZjpkb2N1bWVudElEPSJ4bXAuZGlkOjMxQjE5NDI4Mjg0RDExRUM5OEY3OUUyMUY1QkY5MkJGIi8+IDwvcmRmOkRlc2NyaXB0aW9uPiA8L3JkZjpSREY+IDwveDp4bXBtZXRhPiA8P3hwYWNrZXQgZW5kPSJyIj8+fNqLHwAABytJREFUeNrsnVmM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" alt="{{ trans('core/base::base.preview_image') }}"
                                                class="preview_image img-fluid w-100">
                                        @else
                                            <img src="{{ RvMedia::getImageUrl($image, Arr::get($attributes, 'allow_thumb', true) == true ? 'thumb' : null) }}" alt="{{ trans('core/base::base.preview_image') }}"
                                                class="preview_image">
                                        @endif
                                </div>
                            </div>
                        </li>
                    @endif
                @endforeach
            @endif
        </ul>
    </div>
    <a href="#" class="add-new-gallery-image js-btn-trigger-add-image"
       data-name="{{ $name }}">{{ trans('core/base::base.add_image') }}
    </a>
</div>

@once
    @push('footer')
        <script id="gallery_select_image_template" type="text/x-custom-template">
            <div class="list-photo-hover-overlay">
                <ul class="photo-overlay-actions">
                    <li>
                        <a class="mr10 btn-trigger-edit-gallery-image" data-toggle="tooltip" data-placement="bottom"
                           data-original-title="{{ trans('core/base::base.change_image') }}">
                            <i class="fa fa-edit"></i>
                        </a>
                    </li>
                    <li>
                        <a class="mr10 btn-trigger-remove-gallery-image" data-toggle="tooltip" data-placement="bottom"
                           data-original-title="{{ trans('core/base::base.delete_image') }}">
                            <i class="fa fa-trash"></i>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="custom-image-box image-box">
                <input type="hidden" name="__name__" class="image-data">
                <img src="{{ RvMedia::getDefaultImage(false) }}" alt="{{ trans('core/base::base.preview_image') }}" class="preview_image">
                <div class="image-box-actions">
                    <a class="btn-images" data-result="{{ $name }}" data-action="select-image">
                        {{ trans('core/base::forms.choose_image') }}
                    </a> |
                    <a class="btn_remove_image">
                        <span></span>
                    </a>
                </div>
            </div>
        </script>
    @endpush
@endonce
