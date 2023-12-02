@foreach($blogs as $blog)
<li class="nav-item">
    <a href="{{route('all-blogs.view',$blog->id)}}" class="nav-link {{ Request::is('all-blogs.view',$blog->id) ? 'active' : '' }}">
        <i class="nav-icon fas fa-globe"></i>
        <p>{{$blog->title}}</p>
    </a>
</li>
@endforeach



