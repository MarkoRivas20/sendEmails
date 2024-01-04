<div class="card">
    <div class="card-body">

        <div class="form-group">
            <label>Asunto</label>
            <input wire:model.live="subject" type="text" class="form-control" placeholder="Ingrese el asunto del correo" id="subject" name="subject">
            
        </div>

        <div wire:ignore class="form-group">
            <label>Cuerpo</label>
            <input wire:model.live="body" class="form-control" placeholder="Ingrese el mensaje general" id="body" name="body">
            
        </div>

        <button class="btn btn-primary" wire:click="send" wire:loading.attr="disabled">
            <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true" wire:loading></span>
            Enviar correos
        </button>

    </div>
</div>
