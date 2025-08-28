{{-- resources/views/components/breadcrumb.blade.php --}}
<div class="breadcrumb-wrapper section-padding bg-cover" style="background-image: url('{{ asset('assets/img/breadcrumb.jpg') }}');">
    <div class="container">
        <div class="page-heading">
            <h1 class="wow fadeInUp" data-wow-delay=".3s">{{ $title ?? '' }}</h1>
            <ul class="breadcrumb-items wow fadeInUp" data-wow-delay=".5s">
                @if(isset($layers) && is_array($layers))
                    @foreach($layers as $index => $layer)
                        <li>
                            @if(isset($layer['url']))
                                <a href="{{ $layer['url'] }}">{{ $layer['label'] }}</a>
                            @else
                                {{ $layer['label'] }}
                            @endif
                        </li>
                        @if($index < count($layers) - 1)
                            <li><i class="fal fa-minus"></i></li>
                        @endif
                    @endforeach
                @endif
            </ul>
        </div>
    </div>
</div>
