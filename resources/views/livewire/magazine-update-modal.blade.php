<div>
    @if ($displayModal)
        <div class="modal fade show " tabindex="-1" role="dialog" style="display: block;">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Author</h5>
                        <button type="button" class="close" wire:click.prevent="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    @if($step == 1)
                        <div class="modal-body">
                            @foreach($authors as $key => $item)
                                <div>
                                    <label class="inline-flex items-center">
                                        <input wire:model="values.{{ $item->id }}" type="checkbox"
                                               class="form-checkbox">
                                        <span class="ml-2">Index {{ $item->id}} - {{ $item->full_name }}</span>
                                    </label>
                                </div>
                            @endforeach
                            <div class="d-flex">

                                <button type="button"
                                        class="btn btn-secondary mr-2"
                                        wire:click.prevent="pageChange('back')">
                                    Back
                                </button>

                                <button type="button" class="btn btn-secondary"
                                        wire:click.prevent="pageChange('next')">
                                    Next
                                </button>

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
                                    wire:click.prevent="stepChange('next')">
                                Next
                            </button>
                        </div>
                    @else
                        @if ($img)
                            <img class="modal-img-top" src="{{ $img->temporaryUrl() }}">
                        @else
                            <img class="modal-img-top" src="{{$item->img_url}}">
                        @endif
                        <div class="modal-body mb-2">

                            <div class="custom-file mb-2">
                                <input type="file"
                                       wire:model="img"
                                       accept="image/*"
                                       class="custom-file-input @error('img') is-invalid @enderror">

                                <label class="custom-file-label">Choose img...</label>

                                @error('img')
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
                            <textarea wire:model="description"
                                      class="form-control @error('description') is-invalid @enderror"
                                      placeholder="Description"
                                      rows="3"></textarea>
                                @error('description')
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
                                Update
                            </button>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>
