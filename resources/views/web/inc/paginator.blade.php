  @if ($paginator->hasPages())
      <div class="col-md-12">
          <div class="post-pagination">

              @if ($paginator->onFirstPage())
                  <a href="#" class="btn disabled pagination-back pull-left">{{ __('web.back') }}</a>
              @else
                  <a href="{{ $paginator->previousPageUrl() }}" class="pagination-back pull-left">{{ __('web.back') }}</a>
              @endif
              <ul class="pages">
                  <li class="active">1</li>
                  <li><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                  <li><a href="#">4</a></li>
              </ul>
              @if ($paginator->hasMorePages())
                  <a href="{{ $paginator->nextPageUrl() }}" class=" pagination-next pull-right">{{ __('web.next') }}</a>
              @else
                  <a href="#" class="btn disabled pagination-next pull-right">{{ __('web.next') }}</a>
              @endif
          </div>
      </div>
  @endif
