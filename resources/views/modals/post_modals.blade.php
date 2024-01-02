<!-- Modal -->
<div class="modal fade" id="editPostModal" tabindex="-1" role="dialog" aria-labelledby="modelTitleId" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form action="" method="POST" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">

                        <div class="card mb-4 box-shadow">
                            <img class="card-img-top" src="{{ $post->image }}" alt="Post Image"
                                style="height: 225px; width: 100%; display: block;">
                            <div class="card-body">
                                <p class="card-text">{{ $post->short_description }}</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    @php
                                        $diffInDays = \Carbon\Carbon::parse($post->created_at)->diffInDays();
                                        $showDiff = \Carbon\Carbon::parse($post->created_at)->diffForHumans();

                                        if ($diffInDays > 0) {
                                            $showDiff .=
                                                ', ' .
                                                \Carbon\Carbon::parse($post->created_at)
                                                    ->addDays($diffInDays)
                                                    ->diffInHours() .
                                                ' Hours';
                                        }
                                    @endphp

                                    <small class="text-muted">{{ $showDiff }}</small>
                                </div>
                            </div>
                        </div>


                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
