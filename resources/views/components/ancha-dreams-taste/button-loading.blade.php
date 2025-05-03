<button type="submit" class="rbt-btn btn-gradient hover-icon-reverse w-100 text-center" wire:loading.attr='disabled'>
    <span class="icon-reverse-wrapper">
        <div wire:loading>
            <span class="btn-text">Processando...</span>
            <span class="btn-icon me-1 spinner-border spinner-border-sm me-1" role="status" aria-hidden="true"></span>
            
        </div>
        <div  wire:loading.remove>
            <span class="btn-text">{{$title}}</span>
            <span class="btn-icon ms-1"><i class="feather-arrow-right"></i></span>
            <span class="btn-icon me-1"><i class="feather-arrow-right"></i></span>
        </div>
    </span>
</button>