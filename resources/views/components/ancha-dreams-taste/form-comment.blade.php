<div class="d-flex mb-2">
    <img src="{{ asset('/assets/img/undraw_profile_1.svg') }}" height="32" class="align-self-start rounded me-2"
        alt="Arya Stark">
    <div class="w-100">
        @if (session('success'))
        <x-ancha-dreams-taste.alert :type="'success'" />
        @endif
        <form method="POST" wire:submit.prevent='{{$action}}'>
            @csrf
            <div class="mt-3 mb-3">
                <textarea type="text" class="form-control form-control-sm" wire:model='{{ $input }}'
                    placeholder="Escreva seu comentario aqui !!! seja duvida ou ..." rows="7"></textarea>
            </div>
            <div class="mb-3 d-flex justify-content-end">
                <input type="file" wire:model="attachment" id="attachment" class="d-none">
                <label for="attachment" class="btn btn-sm px-2 font-16 btn-danger" title="Adicionar Anexos"><i
                        class="uil uil-paperclip"></i></label>
            </div>
            @if($attachment)
            <!-- file preview template -->
            <div id="uploadPreviewTemplate">
                <div class="card mt-1 mb-2 shadow-none border">
                    <div class="p-2">
                        <div class="row align-items-center">
                            {{-- <div class="col-auto">
                                <img src="{{$attachment->temporaryUrl()}}" class="avatar-sm rounded bg-light" alt="">
                            </div> --}}
                            <div class="col ps-2">
                                <span class="text-muted fw-bold">{{ $attachment->getClientOriginalName() }}</span>
                                <p class="mb-0">{{ number_format($attachment->getSize() / 1024, 2) }} KB</p>
                            </div>
                            <div class="col-auto">
                                <!-- Button -->
                                <a href="" class="btn btn-link btn-lg text-muted">
                                    <i class="dripicons-cross"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div>
                <button type="submit" class="btn btn-sm btn-success"><i class='uil uil-message me-1'></i>Enviar</button>
            </div>
        </form>
    </div> <!-- end w-100 -->
</div> <!-- end d-flex -->