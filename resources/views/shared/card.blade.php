<div class="col-lg-4 mx-auto">
    <div class="card mb-4 box-shadow">
        <img class="card-img-top" src="{{ $post->image }}" alt="Post Image" style="height: 225px; width: 100%; display: block;">
        <div class="card-body">
            <p class="card-text">{{ $post->short_description }}</p>
            <div class="d-flex justify-content-between align-items-center">
                <div class="btn-group">
                    <a href="{{ route('post.show', ['post_id' => $post->id]) }}" class="btn btn-sm btn-outline-secondary">View</a>
                    <a href="{{ route('post.edit', ['post_id' => $post->id]) }}"
                        data-bs-toggle="modal"
                        data-bs-target="#editPostModal"
                        class="btn btn-sm btn-outline-secondary"
                    >Edit</a>
                </div>
                @php
                    $diffInDays = \Carbon\Carbon::parse($post->created_at)->diffInDays();
                    $showDiff = \Carbon\Carbon::parse($post->created_at)->diffForHumans();

                    if ($diffInDays > 0) {
                        $showDiff .= ', ' . \Carbon\Carbon::parse($post->created_at)->addDays($diffInDays)->diffInHours() . ' Hours';
                    }
                @endphp

                <small class="text-muted">{{ $showDiff }}</small>
                <small class="text-muted">{{ $post->post_type }}</small>
            </div>
        </div>
    </div>
</div>
