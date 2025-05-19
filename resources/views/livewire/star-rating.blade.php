<ul class="rating d-flex gap-1 list-unstyled">
    @for ($i = 1; $i <= 5; $i++)
        <li class="star" title="{{ $stars[$i] ?? '' }}">
            <i class="fa fa-star fa-fw"
               style="font-size: {{$font_size}}px; color: {{ $i <= $rate ? 'gold' : '#ccc' }}"></i>
        </li>
    @endfor
</ul>