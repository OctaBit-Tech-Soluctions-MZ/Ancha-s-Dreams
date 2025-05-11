<div class="row">
    <div class="col-12">
        <div class="page-title-box">
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    @foreach ($pages as $page)
                        @if ($loop->last)
                            <li class="breadcrumb-item active">{{ $page['label'] }}</li>
                        @else
                            <li class="breadcrumb-item">
                                <a href="{{ $page['url'] }}" wire:navigate>{{ $page['label'] }}</a>
                            </li>
                        @endif
                    @endforeach
                </ol>
            </div>
            <h4 class="page-title">{{ $pageTitle }}</h4>
        </div>
    </div>
</div>
