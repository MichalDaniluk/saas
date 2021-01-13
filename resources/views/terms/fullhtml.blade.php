<ul class="term_items">
    @foreach($terms as $term)
    <li class="term_item">
        <span class="term_date">{{ $term->from }} - {{ $term->to }}</span>&nbsp;<span class="term_city">{{ $term->city }}</span>
        <a class="term_button" href="/orders/form/{{  $term->id }}/{{ $partner_code }}/{{ $site }}">zapisz się</a>
    </li>
    @endforeach
</ul>
