<div>
    @if ($displayModal)
        <div class="modal fade show " tabindex="-1" role="dialog" style="display: block;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update Author</h5>
                        <button type="button" class="close" wire:click.prevent="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">

                        <div class="mb-2">
                            <input class="form-control @error('surname') is-invalid @enderror"
                                   type="text"
                                   placeholder="Input Surname"
                                   wire:model="surname">
                            @error('surname')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <input class="form-control @error('name') is-invalid @enderror"
                                   type="text"
                                   placeholder="Input Name"
                                   wire:model="name">
                            @error('name')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>
                        <div class="mb-2">
                            <input class="form-control @error('patronymic') is-invalid @enderror"
                                   type="text"
                                   placeholder="Input Patronymic"
                                   wire:model="patronymic">
                            @error('patronymic')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                            @enderror
                        </div>

                    </div>
                    <div class="modal-footer">

                        <button type="button"
                                class="btn btn-secondary"
                                wire:click.prevent="close">
                            Close
                        </button>

                        <button type="button"
                                class="btn btn-primary"
                                wire:click.prevent="update">
                            Add
                        </button>
                    </div>
                </div>
            </div>
        </div>
    @endif
</div>
