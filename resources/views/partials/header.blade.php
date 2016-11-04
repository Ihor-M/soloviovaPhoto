<div class="navigation">
    <div class="logo-icon">
        <div class="logo-border-top logo-top-bottom-border sqv">
            <div class="sqv1" id="sqv1"></div>
        </div>
        <div class="logo-border-right logo-left-right-border sqv">
            <div class="sqv2" id="sqv2"></div>
        </div>
        <div class="logo-border-bottom logo-top-bottom-border sqv">
            <div class="sqv3" id="sqv3"></div>
        </div>
        <div class="logo-border-left logo-left-right-border sqv">
            <div class="sqv4" id="sqv4"></div>
        </div>
        <a href="{{route('Home')}}">
            {!! $logo !!}
        </a>
    </div>
    <ul class="nav pages">
        <li><a href="{{asset('photos/' . 'wedding')}}">Photos</a></li>
        <li><a href="{{route('Blog')}}">Blog</a></li>
        <li><a href="{{route('Info')}}">Info</a></li>
    </ul>
    <ul class="nav social-media">
        <li><a href="#">Facebook</a></li>
        <li><a href="https://www.instagram.com/olena9512/">Instagram</a></li>
        <li><a href="{{route('Contact')}}">Contact</a></li>
    </ul>
</div>