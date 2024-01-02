@extends('custom_layouts.app')

@section('title')
    .:: All Post Cards ::.
@endsection

@section('main_app')
    <div class="row">
        <div class="col-lg-6 ms-auto">
            <div class="mb-3">
                <label for="" class="form-label">Post Type</label>
                <select class="form-select" name="post_type" id="post_type">
                    <option value='all'>All</option>
                    <option value="online" {{ $post_type === 'online' ? 'selected' : '' }}>Online</option>
                    <option value="offline" {{ $post_type === 'offline' ? 'selected' : '' }}>Offline</option>
                </select>
            </div>
        </div>
    </div>
    <div class="row py-2" id="old-posts-container">
        @forelse ($posts as $post)
            @include('shared.card', ['post' => $post])
        @empty
            <div>
                <h1 class="text-danger text-center">No posts found!</h1>
            </div>
        @endforelse

        @include('modals.post_modals')
        <div class="pagination">
            {{ $posts->links() }}
        </div>
    </div>

    <div class="row py-2" id="new-posts-container">
        @forelse ($posts as $post)
            @include('shared.card', ['post' => $post])
        @empty
            <div>
                <h1 class="text-danger text-center">No posts found!</h1>
            </div>
        @endforelse

        @include('modals.post_modals')
        <div class="pagination">
            {{ $posts->links() }}
        </div>
    </div>

@endsection
@section('customJs')
    <script>

        // $(document).ready(function () {
        //     $('#post_type').on('change', function(e) {
        //         var post_type = $(this).val();
        //         var baseUrl = "http://127.0.0.1:8000/posts"; // Base URL

        //         if (post_type !== '') {
        //             var url = baseUrl + "?post_type=" + post_type; // Construct the URL with the selected post_type
        //             window.location.href = url; // Redirect to the constructed URL
        //         } else if(post_type == 'all') {
        //             window.location.href = baseUrl; // If no post_type selected, redirect to the base URL
        //         }
        //     });

        // });

        $(document).ready(function () {
    var baseUrl = "http://127.0.0.1:8000/posts"; // Base URL
    var storedPostType = localStorage.getItem('selectedPostType'); // Retrieve stored value

    // Check if there's a stored value and set the select element accordingly
    if (storedPostType) {
        $('#post_type').val(storedPostType);
    }

    $('#post_type').on('change', function(e) {
        var post_type = $(this).val();

        if (post_type !== '') {
            var url = baseUrl + "?post_type=" + post_type;
            localStorage.setItem('selectedPostType', post_type); // Store the selected value
            window.location.href = url;
        } else if (post_type === 'all') {
            localStorage.removeItem('selectedPostType'); // Remove stored value for 'All' option
            window.location.href = baseUrl;
        }
    });
});


    </script>
@endsection
