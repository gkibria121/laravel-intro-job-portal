<nav>
    <ul class="flex  space-x-3">
        <li>
            <a href="/">Home</a>
        </li>

        @foreach ($links as $lable => $link)
            <li>
                &rarr;
            </li>
            <li>
                <a href="{{ $link}}">{{ $lable}}</a>
            </li>
        @endforeach
       
    </ul>
</nav>