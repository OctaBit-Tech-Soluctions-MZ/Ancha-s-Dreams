<!-- review -->
<div class="modal fade" id="reviewModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Avaliação</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal">
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" wire:submit.prevent='sendTestimonial'>
                    @csrf
                    <input type="hidden" wire:model='rate' id="rateInput">
                    <div class="mb-3">
                        <div class="rating-widget mb-4 text-center">
                            <!-- Rating Stars Box -->
                            <div class="rating-stars">
                                <ul id="stars">
                                    @php
                                    $stars = [
                                    1 => 'Poor',
                                    2 => 'Fair',
                                    3 => 'Good',
                                    4 => 'Excellent',
                                    5 => 'WOW!!!'
                                    ];
                                    @endphp

                                    @foreach ($stars as $value => $title)
                                    <li class="star" title="{{ $title }}" wire:click="setRating({{ $value }})">
                                        <i class="fa fa-star fa-fw"></i>
                                    </li>
                                    @endforeach

                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <textarea class="form-control" placeholder="Escreva o seu testemunho" rows="5"
                            wire:model='comment'></textarea>
                    </div>
                    <button class="btn btn-success btn-block" type="submit">
                        <div wire:loading>
                            <span class="btn-text">Processando...</span>
                            <span class="btn-icon me-1 spinner-border spinner-border-sm me-1" role="status"
                                aria-hidden="true"></span>

                        </div>
                        <span wire:loading.remove>Avaliar</span>
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>