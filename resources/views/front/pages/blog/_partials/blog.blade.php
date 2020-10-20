<div class="col-sm-6 col-md-6 post-item mb-5">
  <div class="border-0">
      <figure class="position-relative m-0">
          <a href="{{ route('post.show', ['id' => $post->id, 'slug' => $post->slug]) }}" class="stretched-link">
              <img src="{{ thumb($post->image, ['w' => 540, 'h' => 186]) }}" class="img-fluid zoom-effect image" />
          </a>
          <figcaption>
             <div class="d-flex mt-2">
                  <div class="date pr-3 text-center text-danger font-black">
                      <div class="day">
                          {{ date('d', strtotime($post->created_at)) }}
                      </div>
                      <div class="month">
                          {{ date('M', strtotime($post->created_at)) }}
                      </div>
                  </div>
                  <h5 class="font-bold title mt-2">
                    {{ $post->title }}
                  </h5>
             </div>
          </figcaption>
      </figure>
  </div>
</div>
