     @foreach ($landing_blogs as $blog)
         <div class="article-card card">

             <div class="article-card-inner">
                 <a href="{{ route('page.article', ['storeSlug' => $slug, 'id' => $blog->id]) }}" class="img-wraper">
                     <img src="{{ get_file($blog->cover_image_path, $currentTheme) }}" alt="card-img">
                 </a>
                 <div class="card-content blog-caption">
                     <span>{{ $blog->name }}</span>
                     <h3><a href="{{ route('page.article', ['storeSlug' => $slug, 'id' => $blog->id]) }}">
                             {{ $blog->title }}</b> </a></h3>
                     <p>{{ $blog->short_description }}</p>
                     <span class="date"> <a href="#">{{ $blog->store->user->name ?? '@John' }}</a> • {{ $blog->created_at->format('d M, Y ') }}</span>
                     <a href="{{ route('page.article', ['storeSlug' => $slug, 'id' => $blog->id]) }}"
                         class="common-btn">{{ $page_json->blog_page->section->section_sub_button->text ??__('Read More') }}</a>
                 </div>
             </div>
         </div>
     @endforeach
