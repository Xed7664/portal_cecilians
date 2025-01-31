<div wire:ignore.self class="modal fade" id="replyModal" tabindex="-1">
    <div class="modal-dialog modal-fullscreen-sm-down modal-dialog-centered" data-bs-backdrop="false">
        <div class="modal-content">
            <div class="modal-body">
                <div class="float-end d-block d-sm-none">
                    <button type="button" class="btn btn-primary  btn-sm" data-bs-dismiss="modal" wire:click="reply">Post</button>
                </div>
                <button wire:click="closeModal()" type="button" class="btn-close d-none d-sm-block" data-bs-dismiss="modal" aria-label="Close"></button>
                <button wire:click="closeModal()" type="button" class="btn btn-sm d-block d-sm-none" data-bs-dismiss="modal" aria-label="Close">
                    <i class="bx bx-arrow-back bx-sm"></i>
                </button>

                <div class="mt-0">
                    @if($showModal)
                        <div class="d-flex p-3 pb-0">
                            <div>
                                <img src="{{ asset('img/profile/' . $post->user->avatar) }}" style="max-height: 40px;" class="rounded-circle profile-sm" alt="Avatar" loading="lazy">
                                <div class="vr ms-3 mt-2" style="width: 2px !important"></div>
                            </div>
                            <div class="d-flex w-100 ps-3">
                                <div class="w-100">
                                    <h6 class="text-body">
                                        <a href="{{ url('./profile/' . $post->user->username) }}" class="text-portal" tabindex="-1">
                                            <span class="fw-bold">{{ $post->user->getFullname() }}
                                                @if ($post->user->isOfficial())
                                                    <i class="bx bxs-badge-check text-primary" style="vertical-align: middle; margin-top: -1px;" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-original-title="Account is official."></i>
                                                @endif
                                            </span>
                                        </a>
                                        <a href="{{ url('./profile/' . $post->user->username) }}" tabindex="-1">
                                            <span class="small text-muted font-weight-normal">{{ '@'.$post->user->username }}</span>
                                        </a>
                                        <span class="small text-muted font-weight-normal"> · </span>

                                        <a href="{{ url('./profile/' . $post->user->username .'/posts/'. $post->id) }}" tabindex="-1">
                                            <span class="small text-muted font-weight-normal">{{ $post->formatTimestamp() }}</span>
                                        </a>

                                    </h6>
                                    @php
                                        $content = $post->getContentWithMentionsAndHashtags();
                                        $limit = 480;
                                        $shortenedContent = strlen($content) > $limit ? substr($content, 0, $limit) : $content;
                                    @endphp
                                    <p class="fw-light prewrap" style="line-height: 1.2;">{!! $content !!}</p>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex p-3 pt-0">
                            <img src="{{ asset('img/profile/' . $post->user->avatar) }}" style="max-height: 40px;" class="rounded-circle profile-sm me-2" alt="Avatar" loading="lazy">
                            <div class="d-flex w-100 ps-3">
                                <div class="w-100">
                                    <textarea wire:model="content" class="form-control post border-0" style="height: 40px; overflow-y: hidden;" spellcheck="false" placeholder="Type your reply"></textarea>
                                </div>
                            </div>
                        </div>


                    @endif
                </div>
            </div>
            <div class="modal-footer p-1 d-sm-block d-none d-md-block d-lg-block d-lg-block">
                <button type="button" class="btn btn-primary  btn-sm float-end" data-bs-dismiss="modal" wire:click="reply">Post</button>
                <button type="button" class="btn btn-secondary btn-sm float-end" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
        
    </div>
</div>